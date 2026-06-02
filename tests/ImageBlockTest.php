<?php

use BagistoPlus\BasicBlocks\Blocks\Category\CategoryImage;
use BagistoPlus\BasicBlocks\Blocks\Media\Image;
use BagistoPlus\BasicBlocks\Blocks\Product\ProductImage;
use BagistoPlus\Visual\Data\BlockData;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class TestableImageBlock extends Image
{
    public function viewDataFor(array $properties): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'image-block',
            'type' => '@basic-blocks/image',
            'properties' => $properties,
        ]));

        return $this->getViewData();
    }
}

function settingIds(array $settings): array
{
    return collect($settings)
        ->filter(fn ($setting) => isset($setting->id))
        ->map(fn ($setting) => $setting->id)
        ->values()
        ->all();
}

function renderImageBlock(
    ?string $image = 'https://example.com/image.jpg',
    ?string $link = null,
    string $placeholderClasses = 'h-full w-full',
    string $containerStyles = 'width: 100%',
    string $imageStyles = '',
): string {
    $block = (object) [
        'editor_attributes' => new HtmlString('data-editor="image-block"'),
    ];

    return Blade::render(
        <<<'BLADE'
<x-basic-blocks::image-block
  :block="$block"
  :image="$image"
  :link="$link"
  alt="Image alt"
  container-classes="relative overflow-hidden"
  link-classes="block relative overflow-hidden"
  :container-styles="$containerStyles"
  image-classes="h-full w-full"
  :image-styles="$imageStyles"
  :placeholder-classes="$placeholderClasses"
/>
BLADE,
        compact('block', 'image', 'link', 'placeholderClasses', 'containerStyles', 'imageStyles')
    );
}

function classTokens(string $classes): array
{
    return preg_split('/\s+/', trim($classes), flags: PREG_SPLIT_NO_EMPTY);
}

it('adds a link setting to the base image block', function () {
    expect(settingIds(Image::settings()))->toContain('link');
});

it('does not add the link setting to category or product image blocks', function () {
    expect(settingIds(CategoryImage::settings()))->not->toContain('link')
        ->and(settingIds(ProductImage::settings()))->not->toContain('link');
});

it('renders a clickable image when link is configured', function () {
    $html = renderImageBlock(link: 'https://example.com/page');

    expect($html)
        ->toContain('<a')
        ->toContain('href="https://example.com/page"')
        ->toContain('<img')
        ->toContain('src="https://example.com/image.jpg"')
        ->not->toContain('<div');
});

it('renders a non-clickable image when link is empty', function () {
    $html = renderImageBlock(link: null);

    expect($html)
        ->toContain('<div')
        ->toContain('<img')
        ->not->toContain('<a')
        ->not->toContain('href=');
});

it('renders a clickable placeholder when link is configured without an image', function () {
    $html = renderImageBlock(image: null, link: 'https://example.com/page');

    expect($html)
        ->toContain('<a')
        ->toContain('href="https://example.com/page"')
        ->toContain('<svg')
        ->not->toContain('<img');
});

it('uses literal hover zoom classes for real images', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'hover_zoom' => true,
        'hover_zoom_scale' => '105',
    ]);

    expect($viewData['imageClasses'])
        ->toContain('transition-transform duration-300')
        ->toContain('hover:scale-105')
        ->toContain('group-hover:scale-105');
});

it('uses image focal point for object position', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => [
            'path' => 'https://example.com/image.jpg',
            'focalPoint' => ['x' => 25, 'y' => 70],
        ],
    ]);

    expect($viewData['imageStyles'])
        ->toBe('object-position: 25% 70%')
        ->and(classTokens($viewData['imageClasses']))
        ->not->toContain('object-center');
});

it('uses default focal point for image values without explicit focal point', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => [
            'path' => 'https://example.com/image.jpg',
        ],
    ]);

    expect($viewData['imageStyles'])
        ->toBe('object-position: 50% 50%');
});

it('uses default focal point for string image values', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
    ]);

    expect($viewData['imageStyles'])
        ->toBe('object-position: 50% 50%');
});

it('maps non-default hover zoom scales to literal classes', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'hover_zoom' => true,
        'hover_zoom_scale' => '125',
    ]);

    expect($viewData['imageClasses'])
        ->toContain('hover:scale-125')
        ->toContain('group-hover:scale-125');
});

it('falls back to default hover zoom classes for unknown scales', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'hover_zoom' => true,
        'hover_zoom_scale' => '999',
    ]);

    expect($viewData['imageClasses'])
        ->toContain('hover:scale-105')
        ->toContain('group-hover:scale-105');
});

it('does not include hover zoom classes when disabled', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'hover_zoom' => false,
        'hover_zoom_scale' => '125',
    ]);

    expect($viewData['imageClasses'])
        ->not->toContain('hover:scale-')
        ->not->toContain('group-hover:scale-');
});

it('renders placeholder classes around the inline placeholder svg', function () {
    $html = renderImageBlock(
        image: null,
        placeholderClasses: 'transition-transform duration-300 hover:scale-125 group-hover:scale-125 h-full w-full',
    );

    expect($html)
        ->toContain('class="transition-transform duration-300 hover:scale-125 group-hover:scale-125 h-full w-full"')
        ->toContain('<svg');
});

it('uses a tailwind css variable class for image border opacity', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'border' => true,
        'border_width' => 1,
        'border_opacity' => 50,
    ]);

    expect($viewData['containerClasses'])
        ->toContain('border')
        ->toContain('border-current/(--img-border-opacity)')
        ->and($viewData['containerStyles'])
        ->toContain('--img-border-opacity: 50%')
        ->not->toContain('border-color');
});

it('emits full image border opacity as a percentage variable', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'border' => true,
        'border_width' => 1,
        'border_opacity' => 100,
    ]);

    expect($viewData['containerClasses'])
        ->toContain('border-current/(--img-border-opacity)')
        ->and($viewData['containerStyles'])
        ->toContain('--img-border-opacity: 100%')
        ->not->toContain('border-color');
});

it('falls back to full image border opacity for invalid values', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'border' => true,
        'border_width' => 1,
        'border_opacity' => 999,
    ]);

    expect($viewData['containerClasses'])
        ->toContain('border-current/(--img-border-opacity)')
        ->and($viewData['containerStyles'])
        ->toContain('--img-border-opacity: 100%');
});

it('does not emit image border opacity data when border is disabled', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'border' => false,
        'border_width' => 1,
        'border_opacity' => 50,
    ]);

    expect($viewData['containerClasses'])
        ->not->toContain('border-current/(--img-border-opacity)')
        ->and($viewData['containerStyles'])
        ->not->toContain('--img-border-opacity')
        ->not->toContain('border-color');
});

it('renders zero custom width as responsive width data', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'width' => 'custom',
        'custom_width' => 0,
    ]);

    expect(classTokens($viewData['containerClasses']))
        ->toContain('w-(--width)')
        ->and($viewData['containerStyles'])
        ->toContain('--width: 0%');
});

it('renders responsive custom width only for custom image width breakpoints', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'width' => [
            '_default' => 'custom',
            'desktop' => 'fill',
        ],
        'custom_width' => [
            '_default' => 80,
            'tablet' => 60,
            'desktop' => 40,
        ],
    ]);

    expect(classTokens($viewData['containerClasses']))
        ->toContain('w-(--width)')
        ->toContain('tablet:w-(--width-tablet)')
        ->toContain('desktop:w-full')
        ->not->toContain('desktop:w-(--width-desktop)')
        ->and($viewData['containerStyles'])
        ->toContain('--width: 80%')
        ->toContain('--width-tablet: 60%')
        ->not->toContain('--width-desktop: 40%');
});

it('normalizes string border width one to the base border class', function () {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'border' => true,
        'border_width' => '1',
    ]);

    expect(classTokens($viewData['containerClasses']))
        ->toContain('border')
        ->not->toContain('border-1');
});

it('renders non-one numeric border widths as exact tailwind border classes', function (int|string $borderWidth, string $expectedClass) {
    $viewData = (new TestableImageBlock)->viewDataFor([
        'image' => 'https://example.com/image.jpg',
        'border' => true,
        'border_width' => $borderWidth,
    ]);

    expect(classTokens($viewData['containerClasses']))->toContain($expectedClass);
})->with([
    'numeric zero' => [0, 'border-0'],
    'string two' => ['2', 'border-2'],
    'numeric eight' => [8, 'border-8'],
]);

it('does not render an empty style attribute for placeholders without styles', function () {
    $html = renderImageBlock(image: null, containerStyles: '');

    expect($html)
        ->toContain('<div')
        ->toContain('<svg')
        ->not->toContain('style=""');
});

it('does not render an empty image style attribute', function () {
    $html = renderImageBlock(imageStyles: '');

    expect($html)
        ->toContain('<img')
        ->not->toContain('style=""');
});

it('renders image styles when provided', function () {
    $html = renderImageBlock(imageStyles: 'object-position: 25% 70%');

    expect($html)
        ->toContain('style="object-position: 25% 70%"');
});

it('renders placeholder styles when container styles are present', function () {
    $html = renderImageBlock(image: null, containerStyles: 'width: 50%');

    expect($html)
        ->toContain('style="width: 50%"')
        ->toContain('<svg');
});
