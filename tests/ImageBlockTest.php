<?php

use BagistoPlus\BasicBlocks\Blocks\Category\CategoryImage;
use BagistoPlus\BasicBlocks\Blocks\Media\Image;
use BagistoPlus\BasicBlocks\Blocks\Product\ProductImage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

function settingIds(array $settings): array
{
    return collect($settings)
        ->filter(fn ($setting) => isset($setting->id))
        ->map(fn ($setting) => $setting->id)
        ->values()
        ->all();
}

function renderImageBlock(?string $image = 'https://example.com/image.jpg', ?string $link = null): string
{
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
/>
BLADE,
        compact('block', 'image', 'link')
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
