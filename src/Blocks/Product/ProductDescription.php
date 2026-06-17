<?php

namespace BagistoPlus\BasicBlocks\Blocks\Product;

use BagistoPlus\BasicBlocks\Blocks\Basic\Text;
use BagistoPlus\Visual\Settings\Product;

use function BagistoPlus\BasicBlocks\_t;

class ProductDescription extends Text
{
    protected static string $view = 'basic-blocks::blocks.product.description';

    protected static string $type = '@basic-blocks/product-description';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>';

    protected static string $category = 'Product';

    public static function name(): string
    {
        return _t('blocks.product-description.name');
    }

    public static function description(): string
    {
        return _t('blocks.product-description.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                Product::make('product', _t('blocks.common.product_label'))
                    ->info(_t('blocks.common.product_preview_info')),
            ],
            Text::stylingSettings()
        );
    }

    protected function getTag(): string
    {
        return 'div';
    }

    public function getViewData(): array
    {
        return array_merge(parent::getViewData(), [
            'product' => $this->block->settings->product ?? $this->context('product'),
        ]);
    }
}
