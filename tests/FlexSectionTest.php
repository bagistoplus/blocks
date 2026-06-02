<?php

use BagistoPlus\BasicBlocks\Sections\FlexSection;
use BagistoPlus\Visual\Data\BlockData;
use Illuminate\Support\Facades\Blade;

class TestableFlexSection extends FlexSection
{
    public function viewDataFor(array $properties): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'flex-section',
            'type' => '@basic-blocks/flex-section',
            'properties' => $properties,
        ]));

        return $this->getViewData();
    }
}

function flexSectionSettingIds(array $settings): array
{
    return collect($settings)
        ->filter(fn ($setting) => isset($setting->id))
        ->map(fn ($setting) => $setting->id)
        ->values()
        ->all();
}

function flexSectionSetting(string $id): array
{
    return collect(FlexSection::settings())
        ->first(fn ($setting) => isset($setting->id) && $setting->id === $id)
        ->toArray();
}

function flexSectionClassTokens(string $classes): array
{
    return preg_split('/\s+/', trim($classes), flags: PREG_SPLIT_NO_EMPTY);
}

function flexSectionPresetPropertyKeys(): array
{
    return collect(FlexSection::presets())
        ->map(fn ($preset) => is_string($preset) ? new $preset : $preset)
        ->flatMap(fn ($preset) => array_keys($preset->toArray()['properties'] ?? []))
        ->unique()
        ->values()
        ->all();
}

function renderFlexSection(array $settings = []): string
{
    $section = BlockData::make([
        'id' => 'flex-section',
        'type' => '@basic-blocks/flex-section',
        'properties' => $settings,
    ]);

    $viewData = (new TestableFlexSection)->viewDataFor($settings);

    return Blade::render(
        <<<'BLADE'
@include('basic-blocks::sections.flex-section', [
    'section' => $section,
    'block' => $section,
    'outerClasses' => $outerClasses,
    'outerStyles' => $outerStyles,
    'overlayStyles' => $overlayStyles,
    'contentWidthClasses' => $contentWidthClasses,
    'sectionHeightClasses' => $sectionHeightClasses,
    'sectionHeightStyles' => $sectionHeightStyles,
    'flexClasses' => $flexClasses,
])
BLADE,
        array_merge(['section' => $section], $viewData)
    );
}

it('uses group style border settings in flex section schema', function () {
    expect(flexSectionSettingIds(FlexSection::settings()))
        ->not->toContain('border_opacity')
        ->not->toContain('background_position')
        ->toContain('border_style')
        ->toContain('border_color');
});

it('does not use removed background position setting in flex section presets', function () {
    expect(flexSectionPresetPropertyKeys())
        ->not->toContain('background_position');
});

it('makes custom section height responsive', function () {
    expect(flexSectionSetting('section_height_custom'))
        ->toHaveKey('responsive', true);
});

it('includes expanded border radius options', function () {
    $options = collect(flexSectionSetting('border_radius')['options'])
        ->pluck('value')
        ->all();

    expect($options)
        ->toContain('2xl')
        ->toContain('3xl');
});

it('emits border-current for currentColor border color', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_color' => 'currentColor',
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))
        ->toContain('border')
        ->toContain('border-solid')
        ->toContain('border-current')
        ->and($viewData['outerStyles'])
        ->not->toContain('border-color:');
});

it('falls back to border-current when border color is missing', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'border' => true,
        'border_width' => 1,
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))
        ->toContain('border-current')
        ->and($viewData['outerStyles'])
        ->not->toContain('border-color:');
});

it('emits inline border color for non-current border colors', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_color' => '#112233',
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))
        ->not->toContain('border-current')
        ->and($viewData['outerStyles'])
        ->toContain('border-color: #112233');
});

it('maps border style classes', function (string $style, string $expectedClass) {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'border' => true,
        'border_width' => 1,
        'border_style' => $style,
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))->toContain($expectedClass);
})->with([
    'solid' => ['solid', 'border-solid'],
    'dashed' => ['dashed', 'border-dashed'],
    'dotted' => ['dotted', 'border-dotted'],
]);

it('adds overflow hidden when border radius is enabled', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'border_radius' => '2xl',
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))
        ->toContain('rounded-2xl')
        ->toContain('overflow-hidden');
});

it('does not add overflow hidden when border radius is none', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'border_radius' => 'none',
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))
        ->not->toContain('overflow-hidden');
});

it('uses image focal point for background position', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'background_type' => 'image',
        'background_image' => [
            'path' => 'https://example.com/hero.jpg',
            'focalPoint' => ['x' => 25, 'y' => 70],
        ],
    ]);

    expect($viewData['outerStyles'])
        ->toContain("background-image: url('https://example.com/hero.jpg')")
        ->toContain('background-position: 25% 70%')
        ->and(flexSectionClassTokens($viewData['outerClasses']))
        ->not->toContain('bg-center')
        ->not->toContain('bg-top');
});

it('uses center focal point for background images without explicit focal point', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'background_type' => 'image',
        'background_image' => [
            'path' => 'https://example.com/hero.jpg',
        ],
    ]);

    expect($viewData['outerStyles'])
        ->toContain('background-position: 50% 50%');
});

it('uses default focal point for string background images', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'background_type' => 'image',
        'background_image' => 'https://example.com/legacy.jpg',
        'background_position' => 'top',
    ]);

    expect(flexSectionClassTokens($viewData['outerClasses']))
        ->not->toContain('bg-top')
        ->and($viewData['outerStyles'])
        ->toContain("background-image: url('https://example.com/legacy.jpg')")
        ->toContain('background-position: 50% 50%');
});

it('renders responsive custom height with css variables', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'section_height' => [
            '_default' => 'custom',
            'tablet' => 'custom',
        ],
        'section_height_custom' => [
            '_default' => 600,
            'tablet' => 800,
        ],
    ]);

    expect(flexSectionClassTokens($viewData['sectionHeightClasses']))
        ->toContain('h-(--height)')
        ->toContain('tablet:h-(--height-tablet)')
        ->and($viewData['sectionHeightStyles'])
        ->toContain('--height: 600px')
        ->toContain('--height-tablet: 800px')
        ->and($viewData['sectionHeightClasses'])
        ->not->toContain('h-[600px]');
});

it('renders custom section height at custom value breakpoints when height falls back to custom', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'section_height' => [
            '_default' => 'custom',
        ],
        'section_height_custom' => [
            '_default' => 600,
            'tablet' => 800,
        ],
    ]);

    expect(flexSectionClassTokens($viewData['sectionHeightClasses']))
        ->toContain('h-(--height)')
        ->toContain('tablet:h-(--height-tablet)')
        ->and($viewData['sectionHeightStyles'])
        ->toContain('--height: 600px')
        ->toContain('--height-tablet: 800px');
});

it('renders mixed responsive custom height only for custom breakpoints', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([
        'section_height' => [
            '_default' => 'auto',
            'tablet' => 'custom',
        ],
        'section_height_custom' => [
            '_default' => 600,
            'tablet' => 800,
        ],
    ]);

    expect(flexSectionClassTokens($viewData['sectionHeightClasses']))
        ->toContain('h-auto')
        ->toContain('tablet:h-(--height-tablet)')
        ->not->toContain('h-(--height)')
        ->and($viewData['sectionHeightStyles'])
        ->toContain('--height-tablet: 800px')
        ->not->toContain('--height: 600px');
});

it('defaults missing width and height settings to schema defaults', function () {
    $viewData = (new TestableFlexSection)->viewDataFor([]);

    expect(flexSectionClassTokens($viewData['contentWidthClasses']))
        ->toContain('container')
        ->toContain('mx-auto')
        ->and(flexSectionClassTokens($viewData['sectionHeightClasses']))
        ->toContain('h-auto');
});

it('omits empty style attributes in rendered markup', function () {
    $html = renderFlexSection([
        'toggle_overlay' => false,
    ]);

    expect($html)->not->toContain('style=""');
});

it('renders overlay and content with explicit stacking classes', function () {
    $html = renderFlexSection([
        'toggle_overlay' => true,
        'overlay_style' => 'solid',
        'overlay_color' => 'rgba(0, 0, 0, 0.5)',
    ]);

    expect($html)
        ->toContain('absolute inset-0 z-0 pointer-events-none')
        ->toContain('relative z-10 flex');
});
