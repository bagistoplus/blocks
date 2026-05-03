<?php

use BagistoPlus\BasicBlocks\Blocks\Basic\Divider;
use BagistoPlus\Visual\Data\BlockData;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Fluent;
use Illuminate\Support\HtmlString;

class TestableDividerBlock extends Divider
{
    public function viewDataFor(array $properties): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'divider-block',
            'type' => '@basic-blocks/divider',
            'properties' => $properties,
        ]));

        return $this->getViewData();
    }
}

function dividerSettingIds(array $settings): array
{
    return collect($settings)
        ->filter(fn ($setting) => isset($setting->id))
        ->map(fn ($setting) => $setting->id)
        ->values()
        ->all();
}

function dividerClassTokens(string $classes): array
{
    return preg_split('/\s+/', trim($classes), flags: PREG_SPLIT_NO_EMPTY);
}

function renderDividerBlock(array $settings = []): string
{
    $block = (object) [
        'id' => 'divider-block',
        'editor_attributes' => new HtmlString('data-editor="divider-block"'),
        'settings' => new Fluent($settings),
    ];

    $viewData = (new TestableDividerBlock)->viewDataFor($settings);

    return Blade::render(
        <<<'BLADE'
@include('basic-blocks::blocks.basic.divider', ['block' => $block, 'thickness' => $thickness, 'length' => $length, 'isRounded' => $isRounded, 'wrapperClasses' => $wrapperClasses])
BLADE,
        array_merge(['block' => $block], $viewData)
    );
}

it('exposes padding in divider settings', function () {
    expect(dividerSettingIds(Divider::settings()))->toContain('padding');
});

it('adds uniform padding classes to divider wrapper classes', function () {
    $viewData = (new TestableDividerBlock)->viewDataFor([
        'padding' => [
            '_default' => [
                'top' => 4,
                'right' => 4,
                'bottom' => 4,
                'left' => 4,
            ],
        ],
    ]);

    expect(dividerClassTokens($viewData['wrapperClasses']))
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-center')
        ->toContain('self-stretch')
        ->toContain('p-4');
});

it('adds responsive padding classes to divider wrapper classes', function () {
    $viewData = (new TestableDividerBlock)->viewDataFor([
        'padding' => [
            '_default' => [
                'top' => 0,
                'right' => 0,
                'bottom' => 0,
                'left' => 0,
            ],
            'mobile' => [
                'top' => 2,
                'right' => 2,
                'bottom' => 2,
                'left' => 2,
            ],
            'tablet' => [
                'top' => 4,
                'right' => 6,
                'bottom' => 4,
                'left' => 6,
            ],
        ],
    ]);

    expect(dividerClassTokens($viewData['wrapperClasses']))
        ->toContain('mobile:p-2')
        ->toContain('tablet:py-4')
        ->toContain('tablet:px-6');
});

it('renders padding classes on the wrapper only', function () {
    $html = renderDividerBlock([
        'padding' => [
            '_default' => [
                'top' => 4,
                'right' => 4,
                'bottom' => 4,
                'left' => 4,
            ],
        ],
    ]);

    expect($html)
        ->toContain('class="flex items-center justify-center self-stretch p-4"')
        ->toContain('<span class="border-border ')
        ->not->toContain('<span class="border-border p-4');
});
