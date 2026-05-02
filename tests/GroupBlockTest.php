<?php

use BagistoPlus\BasicBlocks\Blocks\Group;
use BagistoPlus\Visual\Data\BlockData;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Fluent;
use Illuminate\Support\HtmlString;

class TestableGroupBlock extends Group
{
    public function viewDataFor(array $properties, string $type = '@test/group'): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'group-block',
            'type' => $type,
            'properties' => $properties,
        ]));

        return $this->getViewData();
    }
}

function groupSettingIds(array $settings): array
{
    return collect($settings)
        ->filter(fn ($setting) => isset($setting->id))
        ->map(fn ($setting) => $setting->id)
        ->values()
        ->all();
}

function groupClassTokens(string $classes): array
{
    return preg_split('/\s+/', trim($classes), flags: PREG_SPLIT_NO_EMPTY);
}

function renderGroupBlock(array $settings = []): string
{
    $block = (object) [
        'id' => 'group-block',
        'editor_attributes' => new HtmlString('data-editor="group-block"'),
        'settings' => new Fluent($settings),
    ];

    $viewData = (new TestableGroupBlock)->viewDataFor($settings);

    return Blade::render(
        <<<'BLADE'
@include('basic-blocks::blocks.group', ['block' => $block, 'class' => $class, 'style' => $style, 'link' => $link, 'isLinkable' => $isLinkable, 'linkTarget' => $linkTarget, 'linkRel' => $linkRel])
BLADE,
        array_merge(['block' => $block], $viewData)
    );
}

it('does not expose border opacity in group settings', function () {
    expect(groupSettingIds(Group::settings()))
        ->not->toContain('border_opacity');
});

it('exposes link settings in group schema', function () {
    expect(groupSettingIds(Group::settings()))
        ->toContain('link')
        ->toContain('open_in_new_tab');
});

it('emits border-current when group border color is currentColor', function () {
    $viewData = (new TestableGroupBlock)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_color' => 'currentColor',
    ]);

    expect(groupClassTokens($viewData['class']))
        ->toContain('border-current')
        ->and($viewData['style'])
        ->not->toContain('border-color:');
});

it('normalizes currentColor matching and emits border-current', function () {
    $viewData = (new TestableGroupBlock)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_color' => '  CURRENTCOLOR  ',
    ]);

    expect(groupClassTokens($viewData['class']))
        ->toContain('border-current')
        ->and($viewData['style'])
        ->not->toContain('border-color:');
});

it('falls back to border-current when group border color is missing', function () {
    $viewData = (new TestableGroupBlock)->viewDataFor([
        'border' => true,
        'border_width' => 1,
    ]);

    expect(groupClassTokens($viewData['class']))
        ->toContain('border-current')
        ->and($viewData['style'])
        ->not->toContain('border-color:');
});

it('emits inline border-color style for non-currentColor values', function () {
    $viewData = (new TestableGroupBlock)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_color' => '#112233',
    ]);

    expect(groupClassTokens($viewData['class']))
        ->not->toContain('border-current')
        ->and($viewData['style'])
        ->toContain('border-color: #112233');
});

it('emits literal tailwind border style classes', function (string $borderStyle, string $expectedClass) {
    $viewData = (new TestableGroupBlock)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_style' => $borderStyle,
    ]);

    expect(groupClassTokens($viewData['class']))->toContain($expectedClass);
})->with([
    'solid' => ['solid', 'border-solid'],
    'dashed' => ['dashed', 'border-dashed'],
    'dotted' => ['dotted', 'border-dotted'],
]);

it('falls back to border-solid for unknown border style values', function () {
    $viewData = (new TestableGroupBlock)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_style' => 'double',
    ]);

    expect(groupClassTokens($viewData['class']))
        ->toContain('border-solid')
        ->not->toContain('border-double');
});

it('renders group as anchor when link is a non-empty string', function () {
    $html = renderGroupBlock([
        'link' => 'https://example.com',
    ]);

    expect($html)
        ->toContain('<a')
        ->toContain('href="https://example.com"')
        ->not->toContain('<div');
});

it('renders group as anchor when link is a stringable object', function () {
    $html = renderGroupBlock([
        'link' => new class implements Stringable
        {
            public function __toString(): string
            {
                return 'https://example.com/from-object';
            }
        },
    ]);

    expect($html)
        ->toContain('<a')
        ->toContain('href="https://example.com/from-object"');
});

it('renders group as div when link is empty or whitespace', function (string $link) {
    $html = renderGroupBlock([
        'link' => $link,
    ]);

    expect($html)
        ->toContain('<div')
        ->not->toContain('<a')
        ->not->toContain('href=');
})->with([
    'empty string' => [''],
    'whitespace' => ['   '],
]);

it('adds target and rel for group links opened in new tab', function () {
    $html = renderGroupBlock([
        'link' => 'https://example.com',
        'open_in_new_tab' => true,
    ]);

    expect($html)
        ->toContain('target="_blank"')
        ->toContain('rel="noopener noreferrer"');
});

it('does not add target and rel when open_in_new_tab is false', function () {
    $html = renderGroupBlock([
        'link' => 'https://example.com',
        'open_in_new_tab' => false,
    ]);

    expect($html)
        ->not->toContain('target=')
        ->not->toContain('rel=');
});

it('ignores open_in_new_tab when group link is empty', function () {
    $html = renderGroupBlock([
        'link' => '',
        'open_in_new_tab' => true,
    ]);

    expect($html)
        ->toContain('<div')
        ->not->toContain('<a')
        ->not->toContain('target=')
        ->not->toContain('rel=');
});
