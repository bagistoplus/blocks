<?php

use BagistoPlus\BasicBlocks\Blocks\Basic\Text;
use BagistoPlus\Visual\Data\BlockData;

class TestableTextBlock extends Text
{
    public function viewDataFor(array $properties): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'text-block',
            'type' => '@basic-blocks/text',
            'properties' => $properties,
        ]));

        return $this->getViewData();
    }
}

function textViewData(array $properties): array
{
    return (new TestableTextBlock)->viewDataFor($properties);
}

it('uses logical alignment classes', function (string $alignment, string $expected) {
    $classes = textViewData(['width' => 'fill', 'alignment' => $alignment])['classes'];

    expect($classes)->toContain($expected)
        ->and($classes)->not->toContain('text-left')
        ->and($classes)->not->toContain('text-right');
})->with([
    'start' => ['start', 'text-start'],
    'center' => ['center', 'text-center'],
    'end' => ['end', 'text-end'],
]);

it('maps legacy physical alignment values to logical classes', function (string $legacy, string $expected) {
    expect(textViewData(['width' => 'fill', 'alignment' => $legacy])['classes'])->toContain($expected);
})->with([
    'left' => ['left', 'text-start'],
    'right' => ['right', 'text-end'],
]);

it('defaults to start alignment', function () {
    expect(textViewData([])['classes'])->toContain('text-start');
});

it('renders a color token as a text class', function (string $token) {
    $data = textViewData(['color' => $token]);

    expect($data['classes'])->toContain("text-{$token}")
        ->and($data['styles'])->toBe('');
})->with(['primary', 'secondary', 'accent', 'neutral', 'info', 'success', 'warning', 'danger']);

it('inherits color by default', function () {
    $data = textViewData([]);

    expect($data['classes'])->not->toMatch('/\btext-(primary|secondary|accent|neutral|info|success|warning|danger|on-background)\b/')
        ->and($data['styles'])->toBe('');
});

it('applies the custom color when the token is none', function () {
    $data = textViewData(['color' => '__none__', 'text_color' => '#FF0000FF']);

    expect($data['styles'])->toBe('color: #F00;')
        ->and($data['classes'])->not->toContain('text-primary');
});

it('inherits color when the token is none and no custom color is set', function () {
    expect(textViewData(['color' => '__none__'])['styles'])->toBe('');
});

it('keeps the custom color for legacy custom values', function () {
    expect(textViewData(['color' => 'custom', 'text_color' => '#00FF00FF'])['styles'])->toBe('color: #0F0;');
});

it('ignores the custom color when the token is default', function () {
    $data = textViewData(['color' => 'default', 'text_color' => '#00FF00FF']);

    expect($data['styles'])->toBe('')
        ->and($data['classes'])->not->toMatch('/\btext-(default|on-background)\b/');
});

it('ignores the custom color when a token is selected', function () {
    $data = textViewData(['color' => 'danger', 'text_color' => '#00FF00FF']);

    expect($data['classes'])->toContain('text-danger')
        ->and($data['styles'])->toBe('');
});
