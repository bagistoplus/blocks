<?php

namespace BagistoPlus\BasicBlocks\Blocks\Category;

use BagistoPlus\BasicBlocks\Tailwind;
use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\Category as CategorySetting;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Color;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Image as ImageSetting;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Spacing;
use BagistoPlus\Visual\Settings\Support\ImageValue;
use BagistoPlus\Visual\Settings\Typography;

use function BagistoPlus\BasicBlocks\_t;

class CategoryBanner extends SimpleBlock
{
    protected static string $type = '@basic-blocks/category-banner';

    protected static string $view = 'basic-blocks::blocks.category.banner';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="14" x="3" y="5" rx="2"/><path d="M7 11h6"/><path d="M7 15h4"/></svg>';

    protected static string $category = 'Category';

    public static function name(): string
    {
        return _t('blocks.category-banner.name');
    }

    public static function description(): string
    {
        return _t('blocks.category-banner.description');
    }

    public static function settings(): array
    {
        return [
            CategorySetting::make('category', _t('blocks.category-banner.settings.category_label'))
                ->info(_t('blocks.category-banner.settings.category_info')),

            Checkbox::make('show_heading', _t('blocks.category-banner.settings.show_heading_label'))
                ->default(true)
                ->asSwitch(),

            Checkbox::make('show_description', _t('blocks.category-banner.settings.show_description_label'))
                ->default(true)
                ->asSwitch(),

            Checkbox::make('show_image', _t('blocks.category-banner.settings.show_image_label'))
                ->default(true)
                ->asSwitch(),

            ImageSetting::make('image', _t('blocks.category-banner.settings.image_label'))
                ->default(null)
                ->info(_t('blocks.category-banner.settings.image_info'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('show_image')),

            Header::make(_t('blocks.category-banner.settings.layout_header')),

            Select::make('height', _t('blocks.category-banner.settings.height_label'))
                ->options([
                    'auto' => _t('blocks.category-banner.settings.height_options.auto'),
                    'xs' => _t('blocks.category-banner.settings.height_options.xs'),
                    'sm' => _t('blocks.category-banner.settings.height_options.sm'),
                    'md' => _t('blocks.category-banner.settings.height_options.md'),
                ])
                ->default('sm')
                ->responsive(),

            Select::make('content_max_width', _t('blocks.category-banner.settings.content_max_width_label'))
                ->options([
                    'narrow' => _t('blocks.category-banner.settings.content_max_width_options.narrow'),
                    'normal' => _t('blocks.category-banner.settings.content_max_width_options.normal'),
                    'wide' => _t('blocks.category-banner.settings.content_max_width_options.wide'),
                    'full' => _t('blocks.category-banner.settings.content_max_width_options.full'),
                ])
                ->default('normal'),

            Select::make('content_alignment', _t('blocks.category-banner.settings.content_alignment_label'))
                ->options([
                    'start' => _t('blocks.category-banner.settings.content_alignment_options.start'),
                    'center' => _t('blocks.category-banner.settings.content_alignment_options.center'),
                    'end' => _t('blocks.category-banner.settings.content_alignment_options.end'),
                ])
                ->default('center')
                ->asSegment()
                ->responsive(),

            Select::make('content_position', _t('blocks.category-banner.settings.content_position_label'))
                ->options([
                    'top' => _t('blocks.category-banner.settings.content_position_options.top'),
                    'middle' => _t('blocks.category-banner.settings.content_position_options.middle'),
                    'bottom' => _t('blocks.category-banner.settings.content_position_options.bottom'),
                ])
                ->default('middle')
                ->asSegment()
                ->responsive(),

            Header::make(_t('blocks.category-banner.settings.heading_header')),

            Select::make('heading_tag', _t('blocks.category-banner.settings.heading_tag_label'))
                ->options([
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'div' => _t('blocks.category-banner.settings.heading_tag_options.div'),
                ])
                ->default('h1')
                ->info(_t('blocks.category-banner.settings.heading_tag_info'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('show_heading')),

            Typography::make('heading_typography', _t('blocks.category-banner.settings.heading_typography_label'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('show_heading')),

            Header::make(_t('blocks.category-banner.settings.description_header')),

            Typography::make('description_typography', _t('blocks.category-banner.settings.description_typography_label'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('show_description')),

            Checkbox::make('truncate', _t('blocks.category-banner.settings.truncate_label'))
                ->default(true)
                ->asSwitch()
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('show_description')),

            Range::make('max_lines', _t('blocks.category-banner.settings.max_lines_label'))
                ->min(1)
                ->max(24)
                ->step(1)
                ->default(3)
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('show_description')->whenTruthy('truncate')),

            Header::make(_t('blocks.category-banner.settings.appearance_header')),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label'))
                ->info(_t('blocks.common.color_scheme_info')),

            Checkbox::make('toggle_overlay', _t('blocks.category-banner.settings.toggle_overlay_label'))
                ->default(true)
                ->info(_t('blocks.category-banner.settings.toggle_overlay_info')),

            Color::make('overlay_color', _t('blocks.category-banner.settings.overlay_color_label'))
                ->default('rgba(0, 0, 0, 0.35)')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('toggle_overlay')),

            Header::make(_t('blocks.common.spacing_header')),

            Spacing::make('padding', _t('blocks.category-banner.settings.padding_label'))
                ->responsive()
                ->min(0)
                ->max(24)
                ->default([
                    'top' => 8,
                    'right' => 8,
                    'bottom' => 8,
                    'left' => 8,
                ])
                ->info(_t('blocks.category-banner.settings.padding_info')),

            Spacing::make('margin', _t('blocks.common.margin_label'))
                ->responsive()
                ->min(0)
                ->max(24),
        ];
    }

    public function getViewData(): array
    {
        $settings = $this->block->settings;
        $category = $settings->category ?? $this->context('category');
        $image = $this->resolveImage($category);
        $description = $category->description ?? '';
        $truncation = $this->getTruncation();

        return [
            'category' => $category,
            'image' => $image,
            'alt' => $category->name ?? '',
            'imageStyles' => $image instanceof ImageValue ? "object-position: {$image->objectPosition()}" : '',
            'showImage' => $settings->show_image,
            'showHeading' => $settings->show_heading,
            'showDescription' => $settings->show_description,
            'headingTag' => $settings->heading_tag,
            'headingText' => $category->name ?? '',
            'description' => $description,
            'hasDescription' => $this->hasVisibleContent($description),
            'bannerClasses' => $this->getBannerClasses(),
            'overlayStyles' => $image ? $this->getOverlayStyles() : '',
            'contentWrapperClasses' => $this->getContentWrapperClasses(),
            'contentClasses' => $this->getContentClasses(),
            'descriptionClasses' => trim('prose '.$truncation['classes']),
            'descriptionStyles' => $truncation['styles'],
        ];
    }

    /**
     * Resolve the image rendered behind the content.
     *
     * A custom upload wins over the category banner.
     */
    protected function resolveImage(mixed $category): mixed
    {
        if (! $this->block->settings->show_image) {
            return null;
        }

        return $this->block->settings->image ?: ($category->banner_url ?? null);
    }

    protected function getBannerClasses(): string
    {
        $classes = [
            'relative',
            'overflow-hidden',
            'w-full',
            $this->getHeightClasses(),
            $this->getMarginClasses(),
        ];

        return implode(' ', array_filter($classes));
    }

    protected function getHeightClasses(): string
    {
        return Tailwind::responsive(
            $this->block->settings->height,
            fn ($value) => match ($value) {
                'xs' => 'h-[15rem]',
                'sm' => 'h-[20rem]',
                'md' => 'h-[25rem]',
                default => 'h-auto',
            }
        );
    }

    /**
     * Classes for the layer holding the content box.
     *
     * Content position becomes the vertical flex alignment, content alignment
     * the horizontal one, so the box moves as a whole.
     */
    protected function getContentWrapperClasses(): string
    {
        $classes = [
            'relative',
            'flex',
            'h-full',
            'w-full',
            Tailwind::responsive(
                $this->block->settings->content_position,
                fn ($value) => match ($value) {
                    'top' => 'items-start',
                    'bottom' => 'items-end',
                    default => 'items-center',
                }
            ),
            Tailwind::responsive(
                $this->block->settings->content_alignment,
                fn ($value) => match ($value) {
                    'start' => 'justify-start',
                    'end' => 'justify-end',
                    default => 'justify-center',
                }
            ),
            $this->getPaddingClasses(),
        ];

        return implode(' ', array_filter($classes));
    }

    protected function getContentClasses(): string
    {
        $classes = [
            match ($this->block->settings->content_max_width) {
                'narrow' => 'max-w-prose',
                'wide' => 'max-w-4xl',
                'full' => 'max-w-none w-full',
                default => 'max-w-2xl',
            },
            Tailwind::responsive(
                $this->block->settings->content_alignment,
                fn ($value) => match ($value) {
                    'start' => 'text-start',
                    'end' => 'text-end',
                    default => 'text-center',
                }
            ),
        ];

        return implode(' ', array_filter($classes));
    }

    protected function getOverlayStyles(): string
    {
        $settings = $this->block->settings;

        if (! $settings->toggle_overlay || ! $settings->overlay_color) {
            return '';
        }

        return "background-color: {$settings->overlay_color}";
    }

    /**
     * Get the line clamp classes and CSS variables for the description
     *
     * @return array{classes: string, styles: string}
     */
    protected function getTruncation(): array
    {
        if (! $this->block->settings->truncate) {
            return ['classes' => '', 'styles' => ''];
        }

        return Tailwind::buildResponsiveStyleFor(
            $this->block->settings->max_lines,
            'line-clamp',
            'max-lines',
            ''
        );
    }

    protected function getPaddingClasses(): string
    {
        return Tailwind::responsive(
            $this->block->settings->padding,
            fn ($v) => Tailwind::buildSpacingClasses($v, 'p')
        );
    }

    protected function getMarginClasses(): string
    {
        return Tailwind::responsive(
            $this->block->settings->margin,
            fn ($v) => Tailwind::buildSpacingClasses($v, 'm')
        );
    }

    /**
     * Whether the description holds anything a visitor would actually see.
     *
     * Media tags are kept so an image only description is not treated as blank.
     */
    protected function hasVisibleContent(?string $html): bool
    {
        if ($html === null) {
            return false;
        }

        $text = strip_tags($html, '<img><picture><video><iframe><svg>');
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5);

        return trim(str_replace("\u{00A0}", ' ', $text)) !== '';
    }
}
