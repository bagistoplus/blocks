<?php

namespace BagistoPlus\BasicBlocks\Blocks\Product;

use BagistoPlus\BasicBlocks\Blocks\Basic\Heading;
use BagistoPlus\BasicBlocks\Blocks\Basic\Text;
use BagistoPlus\Visual\Settings\Product;
use BagistoPlus\Visual\Support\Preset;

use function BagistoPlus\BasicBlocks\_t;

class ProductTitle extends Heading
{
    protected static string $view = 'basic-blocks::blocks.product.title';

    protected static string $type = '@basic-blocks/product-title';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 12h12"/><path d="M6 20V4"/><path d="M18 20V4"/></svg>';

    protected static string $category = 'Product';

    public static function description(): string
    {
        return _t('blocks.product-title.description');
    }

    public static function settings(): array
    {
        // Get parent settings and filter out the 'text' setting
        $parentSettings = array_filter(
            parent::settings(),
            fn ($setting) => ! isset($setting->id) || $setting->id !== 'text'
        );

        return array_merge(
            [
                Product::make('product', _t('blocks.common.product_label'))
                    ->info(_t('blocks.common.product_preview_info')),
            ],
            $parentSettings
        );
    }

    protected function getTag(): string
    {
        return $this->block->settings->heading_level ?? 'h3';
    }

    public static function presets(): array
    {
        return [
            Preset::make(_t('blocks.product-title.name'))
                ->settings([
                    'heading_level' => 'h3',
                    'width' => 'fit',
                    'typography' => 'body',
                ]),
        ];
    }

    public function getViewData(): array
    {
        return array_merge(parent::getViewData(), [
            'product' => $this->block->settings->product ?? $this->context('product'),
        ]);
    }
}
