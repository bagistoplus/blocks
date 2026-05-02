<?php

use BagistoPlus\BasicBlocks\Blocks\Group;
use BagistoPlus\Visual\Data\BlockData;

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

it('does not expose border opacity in group settings', function () {
    expect(groupSettingIds(Group::settings()))
        ->not->toContain('border_opacity');
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
