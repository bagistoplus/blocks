<?php

namespace BagistoPlus\BasicBlocks\Sections;

use BagistoPlus\BasicBlocks\Tailwind;
use BagistoPlus\Visual\Blocks\SimpleSection;
use BagistoPlus\Visual\Data\BlockData;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Color;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Gradient;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Image;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Spacing;
use BagistoPlus\Visual\Settings\Support\ImageValue;
use BagistoPlus\Visual\Settings\Typography;
use matthieumastadenis\couleur\ColorInterface;

use function BagistoPlus\BasicBlocks\_t;

/**
 * @property-read BlockData $section
 *
 * @phpstan-property-read BlockData $section
 */
class FlexSection extends SimpleSection
{
    protected static string $type = '@basic-blocks/flex-section';

    protected static string $view = 'basic-blocks::sections.flex-section';

    protected static array $accepts = ['*'];

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 12h18"/></svg>';

    protected static string $category = 'Layout';

    public static function description(): string
    {
        return _t('sections.flex-section.description');
    }

    public static function settings(): array
    {
        return [
            Typography::make('typography', 'Typography'),
            Header::make(_t('sections.flex-section.settings.layout_header')),

            Select::make('flex_direction', _t('sections.flex-section.settings.direction_label'))
                ->options([
                    'column' => _t('sections.flex-section.settings.direction_options.vertical'),
                    'row' => _t('sections.flex-section.settings.direction_options.horizontal'),
                ])
                ->default('column')
                ->responsive()
                ->asSegment(),

            Select::make('flex_justify', _t('sections.flex-section.settings.flex_justify_label'))
                ->options([
                    'start' => _t('sections.flex-section.settings.flex_justify_options.start'),
                    'center' => _t('sections.flex-section.settings.flex_justify_options.center'),
                    'between' => _t('sections.flex-section.settings.flex_justify_options.space_between'),
                    'end' => _t('sections.flex-section.settings.flex_justify_options.end'),
                ])
                ->responsive(),

            Select::make('flex_align', _t('sections.flex-section.settings.flex_align_label'))
                ->options([
                    'start' => _t('sections.flex-section.settings.flex_align_options.start'),
                    'center' => _t('sections.flex-section.settings.flex_align_options.center'),
                    'end' => _t('sections.flex-section.settings.flex_align_options.end'),
                ])
                ->responsive(),

            Range::make('flex_gap', _t('sections.flex-section.settings.gap_label'))
                ->min(0)
                ->max(24)
                ->step(1)
                ->default(4)
                ->responsive()
                ->info(_t('sections.flex-section.settings.gap_info')),

            Header::make(_t('sections.flex-section.settings.size_header')),

            Select::make('section_width', _t('sections.flex-section.settings.section_width_label'))
                ->options([
                    'full' => _t('sections.flex-section.settings.section_width_options.full'),
                    'container' => _t('sections.flex-section.settings.section_width_options.container'),
                ])
                ->asSegment()
                ->default('container')
                ->info(_t('sections.flex-section.settings.section_width_info')),

            Select::make('section_height', _t('sections.flex-section.settings.section_height_label'))
                ->options([
                    'auto' => _t('sections.flex-section.settings.section_height_options.auto'),
                    'xs' => _t('sections.flex-section.settings.section_height_options.xs'),
                    'sm' => _t('sections.flex-section.settings.section_height_options.sm'),
                    'md' => _t('sections.flex-section.settings.section_height_options.md'),
                    'lg' => _t('sections.flex-section.settings.section_height_options.lg'),
                    'screen' => _t('sections.flex-section.settings.section_height_options.screen'),
                    'custom' => _t('sections.flex-section.settings.section_height_options.custom'),
                ])
                ->default('auto')
                ->responsive(),

            Range::make('section_height_custom', _t('sections.flex-section.settings.section_height_custom_label'))
                ->min(200)
                ->max(1000)
                ->step(50)
                ->default(600)
                ->unit('px')
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('section_height', 'custom')),

            Header::make(_t('sections.flex-section.settings.appearance_header')),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label')),

            Select::make('background_type', _t('sections.flex-section.settings.background_type_label'))
                ->options([
                    'none' => _t('sections.flex-section.settings.background_type_options.none'),
                    'color' => _t('sections.flex-section.settings.background_type_options.color'),
                    'gradient' => _t('sections.flex-section.settings.background_type_options.gradient'),
                    'image' => _t('sections.flex-section.settings.background_type_options.image'),
                ])
                ->asSegment()
                ->default('none'),

            Color::make('background_color', _t('sections.flex-section.settings.background_color_label'))
                ->default('#000000ff')
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'color')),

            Gradient::make('background_gradient', _t('sections.flex-section.settings.background_gradient_label'))
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'gradient')),

            Image::make('background_image', _t('sections.flex-section.settings.background_image_label'))
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'image')),

            Select::make('background_size', _t('sections.flex-section.settings.background_size_label'))
                ->options([
                    'cover' => _t('sections.flex-section.settings.background_size_options.cover'),
                    'contain' => _t('sections.flex-section.settings.background_size_options.contain'),
                    'auto' => _t('sections.flex-section.settings.background_size_options.auto'),
                ])
                ->default('cover')
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'image')),

            Select::make('background_repeat', _t('sections.flex-section.settings.background_repeat_label'))
                ->options([
                    'no-repeat' => _t('sections.flex-section.settings.background_repeat_options.no_repeat'),
                    'repeat' => _t('sections.flex-section.settings.background_repeat_options.repeat'),
                    'repeat-x' => _t('sections.flex-section.settings.background_repeat_options.repeat_x'),
                    'repeat-y' => _t('sections.flex-section.settings.background_repeat_options.repeat_y'),
                ])
                ->default('no-repeat')
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'image')),

            Checkbox::make('border', _t('sections.flex-section.settings.border_label'))
                ->default(false),

            Range::make('border_width', _t('sections.flex-section.settings.border_width_label'))
                ->min(1)
                ->max(8)
                ->step(1)
                ->default(1)
                ->unit('px')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('border')),

            Select::make('border_style', _t('sections.flex-section.settings.border_style_label'))
                ->options([
                    'solid' => _t('sections.flex-section.settings.border_style_options.solid'),
                    'dashed' => _t('sections.flex-section.settings.border_style_options.dashed'),
                    'dotted' => _t('sections.flex-section.settings.border_style_options.dotted'),
                ])
                ->default('solid')
                ->asSegment()
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('border')),

            Color::make('border_color', _t('sections.flex-section.settings.border_color_label'))
                ->default('currentColor')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('border')),

            Select::make('border_radius', _t('sections.flex-section.settings.border_radius_label'))
                ->options([
                    'none' => _t('sections.flex-section.settings.border_radius_options.none'),
                    'sm' => _t('sections.flex-section.settings.border_radius_options.sm'),
                    'md' => _t('sections.flex-section.settings.border_radius_options.md'),
                    'lg' => _t('sections.flex-section.settings.border_radius_options.lg'),
                    'xl' => _t('sections.flex-section.settings.border_radius_options.xl'),
                    '2xl' => _t('sections.flex-section.settings.border_radius_options.2xl'),
                    '3xl' => _t('sections.flex-section.settings.border_radius_options.3xl'),
                    'full' => _t('sections.flex-section.settings.border_radius_options.full'),
                ])
                ->default('none'),

            Checkbox::make('toggle_overlay', _t('sections.flex-section.settings.toggle_overlay_label'))
                ->default(false)
                ->info(_t('sections.flex-section.settings.toggle_overlay_info')),

            Select::make('overlay_style', _t('sections.flex-section.settings.overlay_style_label'))
                ->options([
                    'solid' => _t('sections.flex-section.settings.overlay_style_options.solid'),
                    'gradient' => _t('sections.flex-section.settings.overlay_style_options.gradient'),
                ])
                ->default('solid')
                ->asSegment()
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('toggle_overlay')),

            Color::make('overlay_color', _t('sections.flex-section.settings.overlay_color_label'))
                ->default('rgba(0, 0, 0, 0.5)')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('toggle_overlay')->when('overlay_style', 'solid')),

            Gradient::make('overlay_gradient', _t('sections.flex-section.settings.overlay_gradient_label'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('toggle_overlay')->when('overlay_style', 'gradient')),

            Header::make(_t('blocks.common.spacing_header')),

            Spacing::make('padding', _t('blocks.common.padding_label'))
                ->responsive()
                ->min(0)
                ->max(24)
                ->default([
                    'top' => 12,
                    'right' => 0,
                    'bottom' => 12,
                    'left' => 0,
                ]),
        ];
    }

    public function getViewData(): array
    {
        $s = $this->section->settings;
        $outerAttributes = $this->computeOuterAttributes();
        $sectionHeightAttributes = $this->computeSectionHeightAttributes();

        return [
            'outerClasses' => $outerAttributes['classes'],
            'outerStyles' => $outerAttributes['styles'],
            'overlayStyles' => $this->computeOverlayStyles(),
            'contentWidthClasses' => ($s->section_width ?? 'container') === 'container' ? 'container mx-auto' : '',
            'sectionHeightClasses' => $sectionHeightAttributes['classes'],
            'sectionHeightStyles' => $sectionHeightAttributes['styles'],
            'flexClasses' => $this->computeFlexClasses(),
        ];
    }

    /**
     * @return array{classes: string, styles: string}
     */
    protected function computeSectionHeightAttributes(): array
    {
        $s = $this->section->settings;
        $height = Tailwind::toResponsiveValue($s->section_height ?? 'auto');
        $customHeight = Tailwind::toResponsiveValue($s->section_height_custom ?? 600);
        $heightClasses = [];
        $customHeightValues = [];

        foreach ($height->all() as $breakpoint => $value) {
            if ($value === null) {
                continue;
            }

            $prefix = $breakpoint === '_default' ? '' : "{$breakpoint}:";

            if ($value === 'custom') {
                $customHeightValues[$breakpoint] = $customHeight->get($breakpoint, $customHeight->value() ?? 600);

                continue;
            }

            $heightClasses[] = $prefix.match ($value) {
                'xs' => 'h-[20rem]',
                'sm' => 'h-[25rem]',
                'md' => 'h-[37.5rem]',
                'lg' => 'h-[50rem]',
                'screen' => 'h-screen',
                default => 'h-auto',
            };
        }

        $customHeightAttributes = $customHeightValues === []
            ? ['classes' => '', 'styles' => '']
            : Tailwind::buildResponsiveStyleFor(
                value: $customHeightValues,
                prefix: 'h',
                property: 'height',
                unit: 'px'
            );

        return [
            'classes' => implode(' ', array_filter([
                implode(' ', $heightClasses),
                $customHeightAttributes['classes'],
            ])),
            'styles' => $customHeightAttributes['styles'],
        ];
    }

    /**
     * @return array{classes: string, styles: string}
     */
    protected function computeOuterAttributes(): array
    {
        $classes = [];
        $styles = [];

        $this->mapBorder($classes, $styles);
        $this->mapBorderRadius($classes);
        $this->mapBackground($classes, $styles);

        return [
            'classes' => implode(' ', array_filter($classes)),
            'styles' => implode('; ', $styles),
        ];
    }

    protected function mapBorderRadius(array &$classes): void
    {
        $s = $this->section->settings;
        $borderRadius = $s->border_radius ?? 'none';

        if ($borderRadius !== 'none') {
            $classes[] = match ($borderRadius) {
                'sm' => 'rounded-sm',
                'md' => 'rounded-md',
                'lg' => 'rounded-lg',
                'xl' => 'rounded-xl',
                '2xl' => 'rounded-2xl',
                '3xl' => 'rounded-3xl',
                'full' => 'rounded-full',
                default => '',
            };
            $classes[] = 'overflow-hidden';
        }
    }

    protected function mapBackground(array &$classes, array &$styles): void
    {
        $s = $this->section->settings;
        $bgType = $s->background_type ?? 'none';

        if ($bgType === 'color' && $s->has('background_color') && $s->background_color) {
            $styles[] = "background-color: {$s->background_color}";
        } elseif ($bgType === 'gradient' && $s->has('background_gradient') && $s->background_gradient) {
            $styles[] = "background-image: {$s->background_gradient}";
        } elseif ($bgType === 'image' && $s->has('background_image') && $s->background_image) {
            /** @var ImageValue $backgroundImage */
            $backgroundImage = $s->background_image;

            $styles[] = "background-image: url('{$backgroundImage}')";
            $styles[] = "background-position: {$backgroundImage->objectPosition()}";

            $classes[] = match ($s->background_size ?? 'cover') {
                'contain' => 'bg-contain',
                'auto' => 'bg-auto',
                default => 'bg-cover',
            };

            $classes[] = match ($s->background_repeat ?? 'no-repeat') {
                'repeat' => 'bg-repeat',
                'repeat-x' => 'bg-repeat-x',
                'repeat-y' => 'bg-repeat-y',
                default => 'bg-no-repeat',
            };
        }
    }

    protected function mapBorder(array &$classes, array &$styles): void
    {
        $s = $this->section->settings;

        if (! ($s->border ?? false)) {
            return;
        }

        $borderWidth = $s->border_width ?? 1;
        if ($borderWidth >= 0 && $borderWidth <= 8) {
            $classes[] = $borderWidth === 1 ? 'border' : "border-{$borderWidth}";
        } else {
            $styles[] = "border-width: {$borderWidth}px";
        }

        $classes[] = match ($s->border_style ?? 'solid') {
            'dashed' => 'border-dashed',
            'dotted' => 'border-dotted',
            default => 'border-solid',
        };

        $rawValues = $s->raw();
        $rawBorderColor = $rawValues['border_color'] ?? null;
        $resolvedBorderColor = match (true) {
            $rawBorderColor instanceof ColorInterface => trim((string) $rawBorderColor),
            is_string($rawBorderColor) => trim($rawBorderColor),
            default => '',
        };

        if ($resolvedBorderColor === '') {
            $resolvedBorderColor = 'currentColor';
        }

        if (strtolower($resolvedBorderColor) === 'currentcolor') {
            $classes[] = 'border-current';
        } else {
            $styles[] = "border-color: {$resolvedBorderColor}";
        }
    }

    protected function computeOverlayStyles(): string
    {
        $s = $this->section->settings;

        if (! ($s->toggle_overlay ?? false)) {
            return '';
        }

        $styles = [];
        $overlayStyle = $s->overlay_style ?? 'solid';

        if ($overlayStyle === 'gradient' && $s->has('overlay_gradient') && $s->overlay_gradient) {
            $styles[] = "background-image: {$s->overlay_gradient}";
        } elseif ($overlayStyle === 'solid' && $s->has('overlay_color') && $s->overlay_color) {
            $styles[] = "background-color: {$s->overlay_color}";
        }

        return implode('; ', $styles);
    }

    protected function computeFlexClasses(): string
    {
        $classes = [];
        $s = $this->section->settings;

        // Flex direction
        $flexDir = $s->flex_direction ?? ['_default' => 'column'];
        $classes[] = Tailwind::responsive($flexDir, fn ($v) => match ($v) {
            'row' => 'flex-row',
            'column' => 'flex-col',
            default => 'flex-col',
        });

        // Justify content
        if ($s->get('flex_justify')) {
            $classes[] = Tailwind::responsive($s->flex_justify, fn ($v) => match ($v) {
                'start' => 'justify-start',
                'center' => 'justify-center',
                'between' => 'justify-between',
                'end' => 'justify-end',
                default => 'justify-center',
            });
        }

        // Align items
        if ($s->get('flex_align')) {
            $classes[] = Tailwind::responsive($s->flex_align, fn ($v) => match ($v) {
                'start' => 'items-start',
                'center' => 'items-center',
                'end' => 'items-end',
                default => 'items-center',
            });
        }

        // Gap
        $gap = $s->flex_gap ?? ['_default' => 4];
        $classes[] = Tailwind::responsive($gap, fn ($v) => "gap-{$v}");

        // Padding
        if ($s->has('padding')) {
            $classes[] = Tailwind::responsive($s->padding, fn ($v) => Tailwind::buildSpacingClasses($v, 'p'));
        }

        return implode(' ', array_filter($classes));
    }
}
