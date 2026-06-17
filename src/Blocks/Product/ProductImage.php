<?php

namespace BagistoPlus\BasicBlocks\Blocks\Product;

use BagistoPlus\BasicBlocks\Blocks\Media\Image;
use BagistoPlus\Visual\Settings\Product as ProductSetting;
use BagistoPlus\Visual\Settings\Select;
use Webkul\Shop\Http\Resources\ProductResource;

use function BagistoPlus\BasicBlocks\_t;

class ProductImage extends Image
{
    protected static string $type = '@basic-blocks/product-image';

    protected static string $view = 'basic-blocks::blocks.product.image';

    protected static string $category = 'Product';

    public static function name(): string
    {
        return _t('blocks.product-image.name');
    }

    public static function description(): string
    {
        return _t('blocks.product-image.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                ProductSetting::make('product', _t('blocks.common.product_label')),

                Select::make('image_source', _t('blocks.product-image.settings.image_source_label'))
                    ->options([
                        'main' => _t('blocks.product-image.settings.image_source_options.main'),
                        'second' => _t('blocks.product-image.settings.image_source_options.second'),
                    ])
                    ->default('main'),

                Select::make('size', _t('blocks.product-image.settings.size_label'))
                    ->options([
                        'small' => _t('blocks.product-image.settings.size_options.small'),
                        'medium' => _t('blocks.product-image.settings.size_options.medium'),
                        'large' => _t('blocks.product-image.settings.size_options.large'),
                        'original' => _t('blocks.product-image.settings.size_options.original'),
                    ])
                    ->default('medium')
                    ->info(_t('blocks.product-image.settings.size_info')),
            ],
            parent::sizingSettings()
        );
    }

    public function getViewData(): array
    {
        $product = $this->block->settings->product ?? $this->context('product');

        if (! $product) {
            return array_merge(parent::getViewData(), ['image' => null, 'alt' => '']);
        }

        $productResource = (new ProductResource($product))->resolve();

        $imageData = $productResource['base_image'];

        if ($this->block->settings->image_source === 'second' && isset($productResource['images'][1])) {
            $imageData = $productResource['images'][1];
        }

        $imageUrl = match ($this->block->settings->size) {
            'small' => $imageData['small_image_url'],
            'medium' => $imageData['medium_image_url'],
            'large' => $imageData['large_image_url'],
            'original' => $imageData['original_image_url'],
            default => $imageData['medium_image_url'],
        };

        return array_merge(parent::getViewData(), [
            'image' => $imageUrl,
            'alt' => $productResource['name'],
        ]);
    }
}
