<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\BasicBlocks\Tailwind;
use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\Color;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Spacing;
use BagistoPlus\Visual\Settings\Text as SettingsText;
use BagistoPlus\Visual\Settings\Typography;

use function BagistoPlus\BasicBlocks\_t;

class Text extends SimpleBlock
{
    protected static string $type = '@basic-blocks/text';

    protected static string $view = 'basic-blocks::blocks.basic.text';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 6.1H3"/><path d="M21 12.1H3"/><path d="M15.1 18H3"/></svg>';

    protected static string $category = 'Basic';

    public static function description(): string
    {
        return _t('blocks.text.description');
    }

    public static function contentSettings(): array
    {
        return [
            SettingsText::make('text', _t('blocks.text.settings.text_label'))
                ->default('Add your text here'),
        ];
    }

    public static function stylingSettings(): array
    {
        return [
            Header::make(_t('blocks.text.settings.layout_header')),

            Select::make('width', _t('blocks.text.settings.width_label'))
                ->options([
                    'fit' => _t('blocks.text.settings.width_options.fit'),
                    'fill' => _t('blocks.text.settings.width_options.fill'),
                ])
                ->asSegment()
                ->default('fit')
                ->responsive(),

            Select::make('max_width', _t('blocks.text.settings.max_width_label'))
                ->options([
                    'narrow' => _t('blocks.text.settings.max_width_options.narrow'),
                    'normal' => _t('blocks.text.settings.max_width_options.normal'),
                    'none' => _t('blocks.text.settings.max_width_options.none'),
                ])
                ->default('none'),

            Select::make('alignment', _t('blocks.text.settings.alignment_label'))
                ->options([
                    'left' => _t('blocks.text.settings.alignment_options.left'),
                    'center' => _t('blocks.text.settings.alignment_options.center'),
                    'right' => _t('blocks.text.settings.alignment_options.right'),
                ])
                ->default('left')
                ->visibleWhen(fn ($rule) => $rule->when('width', 'fill'))
                ->responsive(),

            Header::make(_t('blocks.text.settings.typography_header')),

            Typography::make('typography', _t('blocks.text.settings.typography_label'))
                ->info(_t('blocks.text.settings.typography_info')),

            Header::make(_t('blocks.text.settings.appearance_header')),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label'))
                ->info(_t('blocks.common.color_scheme_info')),

            Select::make('color', _t('blocks.text.settings.color_label'))
                ->options([
                    'default' => _t('blocks.text.settings.color_options.default'),
                    'primary' => _t('blocks.text.settings.color_options.primary'),
                    'secondary' => _t('blocks.text.settings.color_options.secondary'),
                    'accent' => _t('blocks.text.settings.color_options.accent'),
                    'info' => _t('blocks.text.settings.color_options.info'),
                    'success' => _t('blocks.text.settings.color_options.success'),
                    'warning' => _t('blocks.text.settings.color_options.warning'),
                    'danger' => _t('blocks.text.settings.color_options.danger'),
                    'custom' => _t('blocks.text.settings.color_options.custom'),
                ])
                ->default('default'),

            Color::make('text_color', _t('blocks.text.settings.text_color_label'))
                ->default('#000000FF')
                ->visibleWhen(fn ($rule) => $rule->when('color', 'custom')),

            Header::make(_t('blocks.common.spacing_header')),

            Spacing::make('padding', _t('blocks.common.padding_label'))
                ->responsive()
                ->min(0)
                ->max(24),

            Spacing::make('margin', _t('blocks.common.margin_label'))
                ->responsive()
                ->min(0)
                ->max(24),
        ];
    }

    public static function settings(): array
    {
        return array_merge(
            static::contentSettings(),
            static::stylingSettings()
        );
    }

    /**
     * Get view data for rendering
     */
    public function getViewData(): array
    {
        return [
            'classes' => $this->getClasses(),
            'styles' => $this->getStyles(),
            'tag' => $this->getTag(),
        ];
    }

    /**
     * Get all CSS classes
     */
    protected function getClasses(): string
    {
        $classes = [
            $this->getWidthClass(),
            $this->getMaxWidthClass(),
            $this->getAlignmentClass(),
            $this->getColorClass(),
            $this->getPaddingClasses(),
            $this->getMarginClasses(),
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get all inline styles
     */
    protected function getStyles(): string
    {
        $color = $this->block->settings->color ?? 'default';

        if ($color === 'custom') {
            return 'color: '.($this->block->settings->text_color ?? '#000000FF').';';
        }

        return '';
    }

    /**
     * Get the width CSS class
     */
    protected function getWidthClass(): string
    {
        return Tailwind::responsive(
            $this->block->settings->width ?? 'fit',
            fn ($v) => match ($v) {
                'fill' => 'w-full',
                'fit' => 'w-fit',
                default => 'w-fit',
            }
        );
    }

    /**
     * Get the max width CSS class
     */
    protected function getMaxWidthClass(): string
    {
        $maxWidthClasses = [
            'narrow' => 'max-w-prose',
            'normal' => 'max-w-2xl',
            'none' => 'max-w-none',
        ];

        return $maxWidthClasses[$this->block->settings->max_width] ?? 'max-w-2xl';
    }

    /**
     * Get the alignment CSS class
     */
    protected function getAlignmentClass(): string
    {
        return Tailwind::responsive(
            $this->block->settings->alignment ?? 'left',
            fn ($v) => match ($v) {
                'left' => 'text-left',
                'center' => 'text-center',
                'right' => 'text-right',
                default => 'text-left',
            }
        );
    }

    /**
     * Get the color CSS class
     */
    protected function getColorClass(): string
    {
        $color = $this->block->settings->color ?? 'default';

        if ($color === 'custom') {
            return '';
        }

        $colorClasses = [
            'default' => 'text-on-background',
            'primary' => 'text-primary',
            'secondary' => 'text-secondary',
            'accent' => 'text-accent',
            'info' => 'text-info',
            'success' => 'text-success',
            'warning' => 'text-warning',
            'danger' => 'text-danger',
        ];

        return $colorClasses[$color] ?? 'text-on-background';
    }

    /**
     * Get the padding CSS classes
     */
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

    /**
     * Get the margin CSS classes
     */
    protected function getMarginClasses(): string
    {
        if (! $this->block->settings->has('margin')) {
            return '';
        }

        return Tailwind::responsive(
            $this->block->settings->margin,
            fn ($v) => Tailwind::buildSpacingClasses($v, 'm')
        );
    }

    /**
     * Get the HTML tag to use
     */
    protected function getTag(): string
    {
        return match ($this->block->settings->typography?->id) {
            'heading-1' => 'h1',
            'heading-2' => 'h2',
            'heading-3' => 'h3',
            'heading-4' => 'h4',
            'heading-5' => 'h5',
            'heading-6' => 'h6',
            'body' => 'p',
            default => 'div',
        };
    }
}
