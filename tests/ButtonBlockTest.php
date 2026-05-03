<?php

use BagistoPlus\BasicBlocks\Blocks\Basic\Button;
use BagistoPlus\Visual\Data\BlockData;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class TestableButtonBlock extends Button
{
    public function viewDataFor(array $properties): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'button-block',
            'type' => '@basic-blocks/button',
            'properties' => $properties,
        ]));

        return $this->getViewData();
    }
}

function buttonSettingIds(array $settings): array
{
    return collect($settings)
        ->filter(fn ($setting) => isset($setting->id))
        ->map(fn ($setting) => $setting->id)
        ->values()
        ->all();
}

function renderButtonBlock(array $settings = []): string
{
    $settings = array_merge([
        'text' => 'Button text',
    ], $settings);

    $block = BlockData::make([
        'id' => 'button-block',
        'type' => '@basic-blocks/button',
        'properties' => $settings,
    ]);

    $block->editor_attributes = new HtmlString('data-editor="button-block"');

    $viewData = (new TestableButtonBlock)->viewDataFor($settings);

    return Blade::render(
        <<<'BLADE'
@include('basic-blocks::blocks.basic.button', [
    'block' => $block,
    'color' => $color,
    'variant' => $variant,
    'size' => $size,
    'fullWidth' => $fullWidth,
    'circle' => $circle,
    'square' => $square,
    'url' => $url,
    'target' => $target,
    'rel' => $rel,
    'icon' => $icon,
    'iconPosition' => $iconPosition,
])
BLADE,
        array_merge(['block' => $block], $viewData)
    );
}

it('exposes circle and square settings in button schema', function () {
    expect(buttonSettingIds(Button::settings()))
        ->toContain('circle')
        ->toContain('square');
});

it('defaults circle and square view data to false', function () {
    $viewData = (new TestableButtonBlock)->viewDataFor([]);

    expect($viewData['circle'])->toBeFalse()
        ->and($viewData['square'])->toBeFalse();
});

it('passes configured circle and square values through view data', function () {
    $viewData = (new TestableButtonBlock)->viewDataFor([
        'circle' => true,
        'square' => true,
    ]);

    expect($viewData['circle'])->toBeTrue()
        ->and($viewData['square'])->toBeTrue();
});

it('renders circle button class', function () {
    $html = renderButtonBlock([
        'circle' => true,
    ]);

    expect($html)
        ->toContain('btn-circle')
        ->not->toContain('Button text');
});

it('renders square button class', function () {
    $html = renderButtonBlock([
        'square' => true,
    ]);

    expect($html)
        ->toContain('btn-square')
        ->not->toContain('Button text');
});
