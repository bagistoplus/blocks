<?php

use BagistoPlus\BasicBlocks\Blocks\Category\CategoryBanner;
use BagistoPlus\Visual\Data\BlockData;
use Webkul\Category\Models\Category;

class TestableCategoryBannerBlock extends CategoryBanner
{
    public function viewDataFor(array $properties, array $context = []): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'category-banner-block',
            'type' => '@basic-blocks/category-banner',
            'properties' => $properties,
        ]));

        $this->setContext($context);

        return $this->getViewData();
    }
}

function categoryBannerViewData(array $properties = [], array $context = []): array
{
    return (new TestableCategoryBannerBlock)->viewDataFor($properties, $context);
}

function fakeBannerCategory(?string $bannerUrl = null, ?string $description = null): Category
{
    $category = new Category;
    $category->setAttribute('id', 1);
    $category->setAttribute('name', 'Shoes');
    $category->setAttribute('banner_url', $bannerUrl);
    $category->setAttribute('logo_url', 'https://example.com/logo.png');
    $category->setAttribute('description', $description);

    return $category;
}

it('falls back to the category from the context', function () {
    $category = fakeBannerCategory('https://example.com/banner.jpg', '<p>Everything for your feet</p>');

    $data = categoryBannerViewData([], ['category' => $category]);

    expect($data['category'])->toBe($category)
        ->and($data['headingText'])->toBe('Shoes')
        ->and($data['image'])->toBe('https://example.com/banner.jpg')
        ->and($data['hasDescription'])->toBeTrue();
});

it('prefers the category picked in the settings over the context one', function () {
    $picked = fakeBannerCategory('https://example.com/picked.jpg');
    $contextual = fakeBannerCategory('https://example.com/contextual.jpg');

    app()->bind('Webkul\Category\Repositories\CategoryRepository', fn () => new class($picked)
    {
        public function __construct(private $category) {}

        public function find($id)
        {
            return $this->category;
        }
    });

    $data = categoryBannerViewData(['category' => 1], ['category' => $contextual]);

    expect($data['category'])->toBe($picked)
        ->and($data['image'])->toBe('https://example.com/picked.jpg');
});

it('prefers the custom image over the category banner', function () {
    $data = categoryBannerViewData(
        ['image' => 'https://example.com/custom.jpg'],
        ['category' => fakeBannerCategory('https://example.com/banner.jpg')]
    );

    expect((string) $data['image'])->toBe('https://example.com/custom.jpg')
        ->and($data['imageStyles'])->toBe('object-position: 50% 50%');
});

it('renders no image when the category has no banner and none was uploaded', function () {
    $data = categoryBannerViewData([], ['category' => fakeBannerCategory()]);

    expect($data['image'])->toBeNull()
        ->and($data['showImage'])->toBeTrue();
});

it('never falls back to the category logo', function () {
    $data = categoryBannerViewData([], ['category' => fakeBannerCategory()]);

    expect($data['image'])->not->toBe('https://example.com/logo.png');
});

it('drops the image when show image is off', function () {
    $data = categoryBannerViewData(
        ['show_image' => false, 'image' => 'https://example.com/custom.jpg'],
        ['category' => fakeBannerCategory('https://example.com/banner.jpg')]
    );

    expect($data['image'])->toBeNull()
        ->and($data['showImage'])->toBeFalse();
});

it('maps the height setting to a class', function (string $height, string $expected) {
    $classes = categoryBannerViewData(['height' => $height])['bannerClasses'];

    expect($classes)->toContain($expected);
})->with([
    'auto' => ['auto', 'h-auto'],
    'xs' => ['xs', 'h-[15rem]'],
    'sm' => ['sm', 'h-[20rem]'],
    'md' => ['md', 'h-[25rem]'],
]);

it('supports responsive heights', function () {
    $classes = categoryBannerViewData(['height' => ['_default' => 'xs', 'desktop' => 'md']])['bannerClasses'];

    expect($classes)->toContain('h-[15rem]')
        ->and($classes)->toContain('desktop:h-[25rem]');
});

it('maps the content position to the vertical flex alignment', function (string $position, string $expected) {
    $classes = categoryBannerViewData(['content_position' => $position])['contentWrapperClasses'];

    expect($classes)->toContain($expected);
})->with([
    'top' => ['top', 'items-start'],
    'middle' => ['middle', 'items-center'],
    'bottom' => ['bottom', 'items-end'],
]);

it('moves the content box and its text with a single alignment setting', function (string $alignment, string $box, string $text) {
    $data = categoryBannerViewData(['content_alignment' => $alignment]);

    expect($data['contentWrapperClasses'])->toContain($box)
        ->and($data['contentClasses'])->toContain($text);
})->with([
    'start' => ['start', 'justify-start', 'text-start'],
    'center' => ['center', 'justify-center', 'text-center'],
    'end' => ['end', 'justify-end', 'text-end'],
]);

it('maps the content max width to a class', function (string $maxWidth, string $expected) {
    $classes = categoryBannerViewData(['content_max_width' => $maxWidth])['contentClasses'];

    expect($classes)->toContain($expected);
})->with([
    'narrow' => ['narrow', 'max-w-prose'],
    'normal' => ['normal', 'max-w-2xl'],
    'wide' => ['wide', 'max-w-4xl'],
    'full' => ['full', 'max-w-none'],
]);

it('defaults the heading to an h1', function () {
    expect(categoryBannerViewData()['headingTag'])->toBe('h1');
});

it('uses the configured heading tag', function (string $tag) {
    expect(categoryBannerViewData(['heading_tag' => $tag])['headingTag'])->toBe($tag);
})->with(['h1', 'h2', 'h3', 'h4', 'div']);

it('emits the overlay only when an image renders', function () {
    $withImage = categoryBannerViewData(
        ['overlay_color' => 'rgba(0, 0, 0, 0.35)'],
        ['category' => fakeBannerCategory('https://example.com/banner.jpg')]
    );

    $withoutImage = categoryBannerViewData(
        ['overlay_color' => 'rgba(0, 0, 0, 0.35)'],
        ['category' => fakeBannerCategory()]
    );

    expect($withImage['overlayStyles'])->toStartWith('background-color: ')
        ->and($withImage['overlayStyles'])->toContain('35%')
        ->and($withoutImage['overlayStyles'])->toBe('');
});

it('drops the overlay when the toggle is off', function () {
    $data = categoryBannerViewData(
        ['toggle_overlay' => false, 'overlay_color' => 'rgba(0, 0, 0, 0.35)'],
        ['category' => fakeBannerCategory('https://example.com/banner.jpg')]
    );

    expect($data['overlayStyles'])->toBe('');
});

it('clamps the description when truncation is on', function () {
    $data = categoryBannerViewData(
        ['truncate' => true, 'max_lines' => 2],
        ['category' => fakeBannerCategory(description: '<p>Everything for your feet</p>')]
    );

    expect($data['descriptionClasses'])->toContain('prose')
        ->and($data['descriptionClasses'])->toContain('line-clamp-(--max-lines)')
        ->and($data['descriptionStyles'])->toContain('--max-lines: 2');
});

it('keeps the prose class without clamping when truncation is off', function () {
    $data = categoryBannerViewData(
        ['truncate' => false],
        ['category' => fakeBannerCategory(description: '<p>Everything for your feet</p>')]
    );

    expect($data['descriptionClasses'])->toBe('prose')
        ->and($data['descriptionStyles'])->toBe('');
});

it('treats visually empty descriptions as missing', function (?string $description) {
    $data = categoryBannerViewData([], ['category' => fakeBannerCategory(description: $description)]);

    expect($data['hasDescription'])->toBeFalse();
})->with([
    'null' => [null],
    'empty' => [''],
    'empty paragraph' => ['<p></p>'],
    'non breaking space' => ['<p>&nbsp;</p>'],
]);

it('keeps an image only description', function () {
    $data = categoryBannerViewData([], ['category' => fakeBannerCategory(description: '<p><img src="banner.jpg"></p>')]);

    expect($data['hasDescription'])->toBeTrue();
});

it('pads the content box and spaces the banner with the margin', function () {
    $data = categoryBannerViewData([
        'padding' => ['top' => 4, 'right' => 4, 'bottom' => 4, 'left' => 4],
        'margin' => ['top' => 2, 'right' => 0, 'bottom' => 2, 'left' => 0],
    ]);

    expect($data['contentWrapperClasses'])->toContain('p-4')
        ->and($data['bannerClasses'])->toContain('my-2')
        ->and($data['bannerClasses'])->not->toContain('p-4');
});

it('honours the show heading and show description toggles', function () {
    $data = categoryBannerViewData(['show_heading' => false, 'show_description' => false]);

    expect($data['showHeading'])->toBeFalse()
        ->and($data['showDescription'])->toBeFalse();
});
