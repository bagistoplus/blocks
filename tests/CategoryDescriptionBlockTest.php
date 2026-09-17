<?php

use BagistoPlus\BasicBlocks\Blocks\Category\CategoryDescription;
use BagistoPlus\Visual\Data\BlockData;
use Webkul\Category\Models\Category;

class TestableCategoryDescriptionBlock extends CategoryDescription
{
    public function viewDataFor(array $properties, array $context = []): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'category-description-block',
            'type' => '@basic-blocks/category-description',
            'properties' => $properties,
        ]));

        $this->setContext($context);

        return $this->getViewData();
    }
}

function categoryDescriptionViewData(array $properties = [], array $context = []): array
{
    return (new TestableCategoryDescriptionBlock)->viewDataFor($properties, $context);
}

function fakeCategory(?string $description = null): Category
{
    $category = new Category;
    $category->setAttribute('id', 1);
    $category->setAttribute('name', 'Shoes');
    $category->setAttribute('description', $description);

    return $category;
}

it('prepends the prose class while keeping the max width setting', function () {
    $classes = categoryDescriptionViewData(['max_width' => 'narrow'])['classes'];

    expect($classes)->toContain('prose')
        ->and($classes)->toContain('max-w-prose')
        ->and($classes)->not->toContain('max-w-none');
});

it('always renders as a div, whatever the typography', function (?string $typography) {
    expect(categoryDescriptionViewData(['typography' => $typography])['tag'])->toBe('div');
})->with([
    'none' => [null],
    'heading' => ['heading-2'],
    'body' => ['body'],
]);

it('falls back to the category from the context', function () {
    $category = fakeCategory('<p>Everything for your feet</p>');

    $data = categoryDescriptionViewData([], ['category' => $category]);

    expect($data['category'])->toBe($category)
        ->and($data['description'])->toBe('<p>Everything for your feet</p>')
        ->and($data['hasDescription'])->toBeTrue();
});

it('prefers the category picked in the settings over the context one', function () {
    $picked = fakeCategory('<p>Picked</p>');
    $contextual = fakeCategory('<p>Contextual</p>');

    app()->bind('Webkul\Category\Repositories\CategoryRepository', fn () => new class($picked)
    {
        public function __construct(private $category) {}

        public function find($id)
        {
            return $this->category;
        }
    });

    $data = categoryDescriptionViewData(['category' => 1], ['category' => $contextual]);

    expect($data['category'])->toBe($picked)
        ->and($data['description'])->toBe('<p>Picked</p>');
});

it('treats visually empty descriptions as missing', function (?string $description) {
    $data = categoryDescriptionViewData([], ['category' => fakeCategory($description)]);

    expect($data['hasDescription'])->toBeFalse();
})->with([
    'null' => [null],
    'empty' => [''],
    'empty paragraph' => ['<p></p>'],
    'non breaking space' => ['<p>&nbsp;</p>'],
]);

it('keeps an image only description', function () {
    $data = categoryDescriptionViewData([], ['category' => fakeCategory('<p><img src="banner.jpg"></p>')]);

    expect($data['hasDescription'])->toBeTrue();
});
