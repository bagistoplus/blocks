<?php

namespace BagistoPlus\BasicBlocks\Blocks\Product;

use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Product as ProductSetting;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;

use function BagistoPlus\BasicBlocks\_t;

class ProductLabels extends SimpleBlock
{
    protected static string $type = '@basic-blocks/product-labels';

    protected static string $view = 'basic-blocks::blocks.product.labels';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L17 19"/><path d="M9.586 5.586A2 2 0 0 0 8.172 5H3a1 1 0 0 0-1 1v5.172a2 2 0 0 0 .586 1.414L8.29 18.29a2.426 2.426 0 0 0 3.42 0l3.58-3.58a2.426 2.426 0 0 0 0-3.42z"/><circle cx="6.5" cy="9.5" r=".5" fill="currentColor"/></svg>';

    protected static string $category = 'Product';

    public static function settings(): array
    {
        return [
            ProductSetting::make('product', _t('blocks.common.product_label')),

            Select::make('layout', _t('blocks.product-labels.settings.layout_label'))
                ->options([
                    'inline' => _t('blocks.product-labels.settings.layout_options.inline'),
                    'stack' => _t('blocks.product-labels.settings.layout_options.stack'),
                ])
                ->default('inline'),

            Range::make('gap', _t('blocks.product-labels.settings.gap_label'))
                ->min(0)
                ->max(8)
                ->step(1)
                ->default(2),

            Select::make('alignment', _t('blocks.product-labels.settings.alignment_label'))
                ->options([
                    'start' => _t('blocks.product-labels.settings.alignment_options.start'),
                    'center' => _t('blocks.product-labels.settings.alignment_options.center'),
                    'end' => _t('blocks.product-labels.settings.alignment_options.end'),
                ])
                ->default('start'),

            Select::make('size', _t('blocks.product-labels.settings.size_label'))
                ->options([
                    'xs' => _t('blocks.product-labels.settings.size_options.xs'),
                    'sm' => _t('blocks.product-labels.settings.size_options.sm'),
                    'md' => _t('blocks.product-labels.settings.size_options.md'),
                    'lg' => _t('blocks.product-labels.settings.size_options.lg'),
                ])
                ->default('sm'),

            Select::make('variant', _t('blocks.product-labels.settings.variant_label'))
                ->options([
                    'solid' => _t('blocks.product-labels.settings.variant_options.solid'),
                    'outline' => _t('blocks.product-labels.settings.variant_options.outline'),
                    'soft' => _t('blocks.product-labels.settings.variant_options.soft'),
                ])
                ->default('solid'),

            Select::make('corner_radius', _t('blocks.product-labels.settings.corner_radius_label'))
                ->options([
                    'none' => _t('blocks.product-labels.settings.corner_radius_options.none'),
                    'sm' => _t('blocks.product-labels.settings.corner_radius_options.sm'),
                    'md' => _t('blocks.product-labels.settings.corner_radius_options.md'),
                    'lg' => _t('blocks.product-labels.settings.corner_radius_options.lg'),
                    'full' => _t('blocks.product-labels.settings.corner_radius_options.full'),
                ])
                ->default('md'),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label'))
                ->info(_t('blocks.common.color_scheme_info')),
        ];
    }

    public function getViewData(): array
    {
        $product = $this->block->settings->product ?? $this->context('product');

        $labels = [];

        if ($product) {
            $productResource = (new \Webkul\Shop\Http\Resources\ProductResource($product))->resolve();

            if ($productResource['on_sale']) {
                $labels[] = [
                    'type' => 'sale',
                    'text' => trans('shop::app.components.products.card.sale'),
                    'color' => 'danger',
                ];
            }

            if ($productResource['is_new']) {
                $labels[] = [
                    'type' => 'new',
                    'text' => trans('shop::app.components.products.card.new'),
                    'color' => 'primary',
                ];
            }
        }

        $layout = $this->block->settings->layout ?? 'inline';
        $gap = $this->block->settings->gap ?? 2;
        $alignment = $this->block->settings->alignment ?? 'start';
        $size = $this->block->settings->size ?? 'sm';
        $variant = $this->block->settings->variant ?? 'solid';
        $cornerRadius = $this->block->settings->corner_radius ?? 'md';

        $layoutClass = $layout === 'stack' ? 'flex-col items-start' : 'flex-row items-center';

        $alignmentClass = match ($alignment) {
            'center' => 'justify-center',
            'end' => 'justify-end',
            default => 'justify-start',
        };

        $sizeClass = match ($size) {
            'xs' => 'px-1.5 py-0.5 text-xs',
            'md' => 'px-3 py-1.5 text-sm',
            'lg' => 'px-4 py-2 text-base',
            default => 'px-2 py-1 text-xs',
        };

        $radiusClass = match ($cornerRadius) {
            'none' => 'rounded-none',
            'sm' => 'rounded-sm',
            'lg' => 'rounded-lg',
            'full' => 'rounded-full',
            default => 'rounded-md',
        };

        $getVariantClass = function (string $color) use ($variant): string {
            return match ($variant) {
                'outline' => "bg-transparent border border-{$color} text-{$color}",
                'soft' => "bg-{$color}/10 text-{$color}",
                default => "bg-{$color} text-{$color}-100",
            };
        };

        return [
            'labels' => $labels,
            'containerClasses' => "flex {$layoutClass} gap-{$gap} {$alignmentClass}",
            'labelClasses' => "{$sizeClass} {$radiusClass} inline-block whitespace-nowrap",
            'getVariantClass' => $getVariantClass,
        ];
    }
}
