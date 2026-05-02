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
  container-styles="width: 100%"
  image-classes="h-full w-full"
  :placeholder-classes="$placeholderClasses"
/>
BLADE,
        compact('block', 'image', 'link', 'placeholderClasses')
    );
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
