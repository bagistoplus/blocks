<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\BasicBlocks\Tailwind;
use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Color;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\ColorToken;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Spacing;
use BagistoPlus\Visual\Settings\Support\ColorTokenValue;
use BagistoPlus\Visual\Settings\Text as SettingsText;
use BagistoPlus\Visual\Settings\Typography;

use function BagistoPlus\BasicBlocks\_t;

class Text extends SimpleBlock
{
    protected static string $type = '@basic-blocks/text';

    protected static string $view = 'basic-blocks::blocks.basic.text';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 6.1H3"/><path d="M21 12.1H3"/><path d="M15.1 18H3"/></svg>';

    protected static string $category = 'Basic';

    /**
     * Memoized truncation classes and styles.
     *
     * @var array{classes: string, styles: string}|null
     */
    protected ?array $truncation = null;

    public static function name(): string
    {
        return _t('blocks.text.name');
    }

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
                    'start' => _t('blocks.text.settings.alignment_options.start'),
                    'center' => _t('blocks.text.settings.alignment_options.center'),
                    'end' => _t('blocks.text.settings.alignment_options.end'),
                ])
                ->default('start')
                ->visibleWhen(fn ($rule) => $rule->when('width', 'fill'))
                ->responsive(),

            Checkbox::make('truncate', _t('blocks.text.settings.truncate_label'))
                ->default(false)
                ->asSwitch(),

            Range::make('max_lines', _t('blocks.text.settings.max_lines_label'))
                ->min(1)
                ->max(24)
                ->step(1)
                ->default(3)
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('truncate')),

            Header::make(_t('blocks.text.settings.typography_header')),

            Typography::make('typography', _t('blocks.text.settings.typography_label'))
                ->info(_t('blocks.text.settings.typography_info')),

            Header::make(_t('blocks.text.settings.appearance_header')),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label'))
                ->info(_t('blocks.common.color_scheme_info')),

            ColorToken::make('color', _t('blocks.text.settings.color_label'))
                ->allowNone(_t('blocks.text.settings.color_options.custom'))
                ->default('default'),

            Color::make('text_color', _t('blocks.text.settings.text_color_label'))
                ->visibleWhen(fn ($rule) => $rule->when('color', ColorTokenValue::EMPTY_VALUE)),

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
            $this->getTruncation()['classes'],
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
        $styles = array_filter([
            $this->getColorStyle(),
            $this->getTruncation()['styles'],
        ]);

        if ($styles === []) {
            return '';
        }

        return implode('; ', $styles).';';
    }

    /**
     * Get the custom color inline style, if any
     */
    protected function getColorStyle(): string
    {
        if (! $this->usesCustomColor()) {
            return '';
        }

        if (empty($this->block->settings->raw()['text_color'])) {
            return '';
        }

        return 'color: '.$this->block->settings->text_color;
    }

    /**
     * Get the line clamp classes and CSS variables
     *
     * @return array{classes: string, styles: string}
     */
    protected function getTruncation(): array
    {
        if ($this->truncation !== null) {
            return $this->truncation;
        }

        if (! $this->block->settings->truncate) {
            return $this->truncation = ['classes' => '', 'styles' => ''];
        }

        return $this->truncation = Tailwind::buildResponsiveStyleFor(
            $this->block->settings->max_lines ?? 3,
            'line-clamp',
            'max-lines',
            ''
        );
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
            $this->block->settings->alignment ?? 'start',
            fn ($v) => match ($v) {
                'start', 'left' => 'text-start',
                'center' => 'text-center',
                'end', 'right' => 'text-end',
                default => 'text-start',
            }
        );
    }

    /**
     * Get the color CSS class
     */
    protected function getColorClass(): string
    {
        $token = $this->getColorToken();

        if ($token === null) {
            return '';
        }

        $colorClasses = [
            'default' => '',
            'primary' => 'text-primary',
            'secondary' => 'text-secondary',
            'accent' => 'text-accent',
            'neutral' => 'text-neutral',
            'info' => 'text-info',
            'success' => 'text-success',
            'warning' => 'text-warning',
            'danger' => 'text-danger',
        ];

        return $colorClasses[$token] ?? '';
    }

    /**
     * Get the selected color token, or null when the text uses a custom color
     */
    protected function getColorToken(): ?string
    {
        if ($this->usesCustomColor()) {
            return null;
        }

        return $this->block->settings->color->token();
    }

    /**
     * Whether the text color comes from the custom color picker instead of a token
     */
    protected function usesCustomColor(): bool
    {
        $color = $this->block->settings->color;

        return ! $color instanceof ColorTokenValue || $color->isEmpty();
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
