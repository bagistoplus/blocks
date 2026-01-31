<?php

namespace BagistoPlus\BasicBlocks\Blocks\Media;

use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Image as ImageSetting;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Spacing;
use BagistoPlus\Visual\Settings\Text;

use function BagistoPlus\BasicBlocks\_t;

use BagistoPlus\BasicBlocks\Tailwind;

class Image extends SimpleBlock
{
    protected static string $type = '@basic-blocks/image';

    protected static string $view = 'basic-blocks::blocks.media.image';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>';

    protected static string $category = 'Media';

    public static function settings(): array
    {
        return array_merge(
            static::imageSettings(),
            static::sizingSettings()
        );
    }

    protected static function imageSettings(): array
    {
        return [
            ImageSetting::make('image', _t('blocks.image.settings.image_label'))
                ->default(null),

            Text::make('alt', _t('blocks.image.settings.alt_label'))
                ->default('')
                ->info(_t('blocks.image.settings.alt_info')),
        ];
    }

    protected static function sizingSettings(): array
    {
        return [
            // Sizing Header
            Header::make(_t('blocks.image.settings.sizing_header')),

            Select::make('aspect_ratio', _t('blocks.image.settings.aspect_ratio_label'))
                ->options([
                    'adapt' => _t('blocks.image.settings.aspect_ratio_options.adapt'),
                    'square' => _t('blocks.image.settings.aspect_ratio_options.square'),
                    'portrait' => _t('blocks.image.settings.aspect_ratio_options.portrait'),
                    'landscape' => _t('blocks.image.settings.aspect_ratio_options.landscape'),
                ])
                ->default('adapt'),

            Select::make('object_fit', _t('blocks.image.settings.object_fit_label'))
                ->options([
                    'cover' => _t('blocks.image.settings.object_fit_options.cover'),
                    'contain' => _t('blocks.image.settings.object_fit_options.contain'),
                    'fill' => _t('blocks.image.settings.object_fit_options.fill'),
                ])
                ->default('cover'),

            Select::make('width', _t('blocks.image.settings.width_label'))
                ->options([
                    'fill' => _t('blocks.image.settings.width_options.fill'),
                    'fit-content' => _t('blocks.image.settings.width_options.fit_content'),
                    'custom' => _t('blocks.image.settings.width_options.custom'),
                ])
                ->default('fill')
                ->responsive(),

            Range::make('custom_width', _t('blocks.image.settings.custom_width_label'))
                ->min(0)->max(100)->step(1)
                ->default(100)
                ->unit('%')
                ->visibleWhen(fn($rule) => $rule->when('width', 'custom'))
                ->responsive(),

            Select::make('height', _t('blocks.image.settings.height_label'))
                ->options([
                    'fit' => _t('blocks.image.settings.height_options.fit'),
                    'fill' => _t('blocks.image.settings.height_options.fill'),
                ])
                ->default('fit')
                ->visibleWhen(fn($rule) => $rule->when('aspect_ratio', 'adapt')),

            Checkbox::make('hover_zoom', _t('blocks.image.settings.hover_zoom_label'))
                ->default(false)
                ->info(_t('blocks.image.settings.hover_zoom_info')),

            Select::make('hover_zoom_scale', _t('blocks.image.settings.hover_zoom_scale_label'))
                ->options([
                    '100' => '100%',
                    '105' => '105%',
                    '110' => '110%',
                    '125' => '125%',
                    '150' => '150%',
                ])
                ->default(105)
                ->asSegment()
                ->visibleWhen(fn($rule) => $rule->whenTruthy('hover_zoom')),

            // Borders Header
            Header::make(_t('blocks.image.settings.borders_header')),

            Checkbox::make('border', _t('blocks.image.settings.border_label'))
                ->default(false),

            Range::make('border_width', _t('blocks.image.settings.border_width_label'))
                ->min(0)->max(8)->step(1)
                ->default(1)
                ->visibleWhen(fn($rule) => $rule->whenTruthy('border')),

            Range::make('border_opacity', _t('blocks.image.settings.border_opacity_label'))
                ->min(0)->max(100)->step(5)
                ->default(100)
                ->unit('%')
                ->visibleWhen(fn($rule) => $rule->whenTruthy('border')),

            Select::make('border_radius', _t('blocks.image.settings.border_radius_label'))
                ->options([
                    'none' => _t('blocks.image.settings.border_radius_options.none'),
                    'sm' => 'SM',
                    'md' => 'MD',
                    'lg' => 'LG',
                    'xl' => 'XL',
                    '2xl' => '2XL',
                    '3xl' => '3XL',
                    'full' => _t('blocks.image.settings.border_radius_options.full'),
                ])
                ->default('none'),

            // Padding Header (using Tailwind scale 0-24)
            Header::make(_t('blocks.common.padding_header')),

            Spacing::make('padding', _t('blocks.common.padding_label'))
                ->responsive()
                ->min(0)
                ->max(24),
        ];
    }

    public function getViewData(): array
    {
        return [
            'image' => $this->block->settings->image,
            'alt' => $this->block->settings->alt ?? '',
            'containerClasses' => $this->getContainerClasses(),
            'containerStyles' => $this->getContainerStyles(),
            'imageClasses' => $this->getImageClasses(),
        ];
    }

    protected function getContainerClasses(): string
    {
        $customWidthData = $this->getCustomWidthData();

        $classes = [
            $this->getWidthClass(),
            $customWidthData['classes'],
            $this->getHeightClass(),
            $this->getAspectRatioClass(),
            $this->getBorderRadiusClass(),
            $this->getPaddingClasses(),
            'relative',
            'overflow-hidden',
        ];

        $borderClasses = $this->getBorderClasses();
        if (! empty($borderClasses)) {
            $classes = array_merge($classes, $borderClasses);
        }

        return implode(' ', array_filter($classes));
    }

    protected function getContainerStyles(): string
    {
        $customWidthData = $this->getCustomWidthData();
        $borderStyles = $this->getBorderStyles();

        $allStyles = array_filter(array_merge($borderStyles, $customWidthData['styles']));

        return ! empty($allStyles) ? implode('; ', $allStyles) : '';
    }

    protected function getImageClasses(): string
    {
        $classes = [
            $this->getObjectFitClass(),
            $this->getHoverZoomClasses(),
            'h-full',
            'w-full',
            'object-center',
        ];

        return implode(' ', array_filter($classes));
    }

    protected function getWidthClass(): string
    {
        return Tailwind::responsive(
            $this->block->settings->width ?? 'fill',
            fn ($v) => match ($v) {
                'fit-content' => 'w-fit',
                'fill' => 'w-full',
                'custom' => '',
                default => 'w-full',
            }
        );
    }

    protected function getCustomWidthData(): array
    {
        $widthRv = Tailwind::toResponsiveValue($this->block->settings->width ?? 'fill');
        $hasCustomWidth = false;

        foreach ($widthRv->all() as $val) {
            if ($val === 'custom') {
                $hasCustomWidth = true;
                break;
            }
        }

        if ($hasCustomWidth && $this->block->settings->custom_width) {
            return Tailwind::buildResponsiveStyleFor(
                value: $this->block->settings->custom_width,
                prefix: 'w',
                property: 'width'
            );
        }

        return ['classes' => '', 'styles' => []];
    }

    protected function getHeightClass(): string
    {
        return match ($this->block->settings->height ?? 'fit') {
            'fill' => 'h-full',
            default => '',
        };
    }

    protected function getAspectRatioClass(): string
    {
        return match ($this->block->settings->aspect_ratio ?? 'adapt') {
            'square' => 'aspect-square',
            'portrait' => 'aspect-[3/4]',
            'landscape' => 'aspect-[4/3]',
            default => '',
        };
    }

    protected function getObjectFitClass(): string
    {
        return match ($this->block->settings->object_fit ?? 'cover') {
            'contain' => 'object-contain',
            'fill' => 'object-fill',
            default => 'object-cover',
        };
    }

    protected function getBorderClasses(): array
    {
        if (! ($this->block->settings->border ?? false)) {
            return [];
        }

        $classes = [];
        $borderWidth = $this->block->settings->border_width ?? 1;
        $classes[] = $borderWidth === 1 ? 'border' : "border-{$borderWidth}";
        $classes[] = 'border-current';

        return $classes;
    }

    protected function getBorderStyles(): array
    {
        if (! ($this->block->settings->border ?? false)) {
            return [];
        }

        $styles = [];
        $borderOpacity = $this->block->settings->border_opacity ?? 100;

        if ($borderOpacity < 100) {
            $opacity = $borderOpacity / 100;
            $styles[] = "border-color: rgba(currentColor, {$opacity})";
        }

        return $styles;
    }

    protected function getBorderRadiusClass(): string
    {
        $borderRadius = $this->block->settings->border_radius ?? 'none';

        if ($borderRadius === 'none') {
            return '';
        }

        return match ($borderRadius) {
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'xl' => 'rounded-xl',
            '2xl' => 'rounded-2xl',
            '3xl' => 'rounded-3xl',
            'full' => 'rounded-full',
            default => '',
        };
    }

    protected function getPaddingClasses(): string
    {
        if (! $this->block->settings->has('padding')) {
            return '';
        }

        return Tailwind::responsive(
            $this->block->settings->padding,
            fn ($v) => Tailwind::buildSpacingClasses($v, 'p')
        );
    }

    protected function getHoverZoomClasses(): string
    {
        $hoverZoom = ($this->block->settings->hover_zoom ?? false) === true;

        if (! $hoverZoom) {
            return '';
        }

        $hoverZoomScale = $this->block->settings->hover_zoom_scale ?? '105';

        return "transition-transform duration-300 hover:scale-{$hoverZoomScale} group-hover:scale-{$hoverZoomScale}";
    }
}
