<?php

use BagistoPlus\BasicBlocks\Blocks\Category\CategoryImage;
use BagistoPlus\Visual\Data\BlockData;
use Webkul\Category\Models\Category;

class TestableCategoryImageBlock extends CategoryImage
{
    public function viewDataFor(array $properties, array $context = []): array
    {
        $this->setBlockData(BlockData::make([
            'id' => 'category-image-block',
            'type' => '@basic-blocks/category-image',
            'properties' => $properties,
        ]));

        $this->setContext($context);

        return $this->getViewData();
    }
}

function categoryImageViewData(array $context = []): array
{
    $category = new Category;
    $category->setAttribute('id', 1);
    $category->setAttribute('name', 'Shoes');
    $category->setAttribute('logo_path', 'category/1/shoes.webp');

    return (new TestableCategoryImageBlock)->viewDataFor(['image_source' => 'logo'], ['category' => $category, ...$context]);
}

it('loads the image with the page when the list marks the card as a priority', function () {
    expect(categoryImageViewData(['priority' => true])['priority'])->toBeTrue();
});

it('loads the image lazily by default', function () {
    expect(categoryImageViewData()['priority'])->toBeFalse();
});
