<?php

namespace BagistoPlus\BasicBlocks\Blocks;

use BagistoPlus\BasicBlocks\Tailwind;
use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Color;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Gradient;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Image;
use BagistoPlus\Visual\Settings\Link;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Spacing;
use BagistoPlus\Visual\Settings\Support\ImageValue;
use BagistoPlus\Visual\Support\Preset;
use BagistoPlus\Visual\Support\PresetBlock;
use matthieumastadenis\couleur\ColorInterface;

use function BagistoPlus\BasicBlocks\_t;

class Group extends SimpleBlock
{
    protected static string $type = '@basic-blocks/group';

    protected static string $view = 'basic-blocks::blocks.group';

    protected static array $accepts = ['*'];

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>';

    protected static string $category = 'Layout';

    public static function description(): string
    {
        return _t('blocks.group.description');
    }

    public static function settings(): array
    {
        return [
            // Layout Configuration
            Header::make(_t('blocks.group.settings.layout_header')),

            Select::make('layout_type', _t('blocks.group.settings.layout_type_label'))
                ->options([
                    'block' => _t('blocks.group.settings.layout_type_options.block'),
                    'flex' => _t('blocks.group.settings.layout_type_options.flex'),
                    'grid' => _t('blocks.group.settings.layout_type_options.grid'),
                ])
                ->default('flex')
                ->asSegment()
                ->info(_t('blocks.group.settings.layout_type_info')),

            // Flex Settings
            Select::make('flex_direction', _t('blocks.group.settings.flex_direction_label'))
                ->options([
                    'column' => _t('blocks.group.settings.flex_direction_options.vertical'),
                    'row' => _t('blocks.group.settings.flex_direction_options.horizontal'),
                ])
                ->default('row')
                ->responsive()
                ->asSegment()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'flex')),

            Select::make('flex_justify', _t('blocks.group.settings.flex_justify_label'))
                ->options([
                    'start' => _t('blocks.group.settings.flex_justify_options.start'),
                    'center' => _t('blocks.group.settings.flex_justify_options.center'),
                    'between' => _t('blocks.group.settings.flex_justify_options.space_between'),
                    'end' => _t('blocks.group.settings.flex_justify_options.end'),
                ])
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'flex')),

            Select::make('flex_align', _t('blocks.group.settings.flex_align_label'))
                ->options([
                    'start' => _t('blocks.group.settings.flex_align_options.start'),
                    'center' => _t('blocks.group.settings.flex_align_options.center'),
                    'end' => _t('blocks.group.settings.flex_align_options.end'),
                ])
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'flex')),

            Range::make('flex_gap', _t('blocks.group.settings.gap_label'))
                ->min(0)
                ->max(24)
                ->step(1)
                ->default(4)
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'flex')),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label'))
                ->info(_t('blocks.common.color_scheme_info')),

            // Grid Settings
            Range::make('grid_columns', _t('blocks.group.settings.grid_columns_label'))
                ->min(1)
                ->max(12)
                ->step(1)
                ->default(3)
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'grid')),

            Range::make('grid_rows', _t('blocks.group.settings.grid_rows_label'))
                ->min(1)
                ->max(12)
                ->step(1)
                ->default(1)
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'grid')),

            Range::make('grid_gap', _t('blocks.group.settings.gap_label'))
                ->min(0)
                ->max(24)
                ->step(1)
                ->default(4)
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('layout_type', 'grid')),

            // Spacing
            Header::make(_t('blocks.common.spacing_header')),

            Spacing::make('padding', _t('blocks.common.padding_label'))->responsive()->min(0)->max(24),
            Spacing::make('margin', _t('blocks.common.margin_label'))->responsive()->min(0)->max(24),

            // Sizing
            Header::make(_t('blocks.group.settings.sizing_header')),

            Select::make('width', _t('blocks.group.settings.width_label'))
                ->options([
                    'auto' => _t('blocks.group.settings.width_options.auto'),
                    'full' => _t('blocks.group.settings.width_options.full'),
                    'fit' => _t('blocks.group.settings.width_options.fit'),
                    'screen' => _t('blocks.group.settings.width_options.screen'),
                    'custom' => _t('blocks.group.settings.width_options.custom'),
                ])
                ->default('auto')
                ->responsive(),

            Range::make('custom_width', _t('blocks.group.settings.custom_width_label'))
                ->min(0)
                ->max(100)
                ->step(1)
                ->default(100)
                ->unit('%')
                ->responsive()
                ->visibleWhen(fn ($rule) => $rule->when('width', 'custom')),

            Range::make('min_width', _t('blocks.group.settings.min_width_label'))
                ->min(0)
                ->max(1000)
                ->step(10)
                ->default(0)
                ->unit('px'),

            Select::make('max_width', _t('blocks.group.settings.max_width_label'))
                ->options([
                    'none' => _t('blocks.group.settings.max_width_options.none'),
                    'xs' => 'XS (20rem)',
                    'sm' => 'SM (24rem)',
                    'md' => 'MD (28rem)',
                    'lg' => 'LG (32rem)',
                    'xl' => 'XL (36rem)',
                    '2xl' => '2XL (42rem)',
                    '3xl' => '3XL (48rem)',
                    '4xl' => '4XL (56rem)',
                    '5xl' => '5XL (64rem)',
                    '6xl' => '6XL (72rem)',
                    '7xl' => '7XL (80rem)',
                    'full' => _t('blocks.group.settings.max_width_options.full'),
                    'screen' => _t('blocks.group.settings.max_width_options.screen'),
                ])
                ->default('none'),

            Select::make('height', _t('blocks.group.settings.height_label'))
                ->options([
                    'auto' => _t('blocks.group.settings.height_options.auto'),
                    'full' => _t('blocks.group.settings.height_options.full'),
                    'fit' => _t('blocks.group.settings.height_options.fit'),
                    'screen' => _t('blocks.group.settings.height_options.screen'),
                    'custom' => _t('blocks.group.settings.height_options.custom'),
                ])
                ->default('auto'),

            Range::make('custom_height', _t('blocks.group.settings.custom_height_label'))
                ->min(0)
                ->max(1000)
                ->step(10)
                ->default(400)
                ->unit('px')
                ->visibleWhen(fn ($rule) => $rule->when('height', 'custom')),

            Range::make('min_height', _t('blocks.group.settings.min_height_label'))
                ->min(0)
                ->max(1000)
                ->step(10)
                ->default(0)
                ->unit('px'),

            // Borders
            Header::make(_t('blocks.group.settings.borders_header')),

            Checkbox::make('border', _t('blocks.group.settings.border_label'))
                ->default(false),

            Range::make('border_width', _t('blocks.group.settings.border_width_label'))
                ->min(0)
                ->max(8)
                ->step(1)
                ->default(1)
                ->unit('px')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('border')),

            Select::make('border_style', _t('blocks.group.settings.border_style_label'))
                ->options([
                    'solid' => _t('blocks.group.settings.border_style_options.solid'),
                    'dashed' => _t('blocks.group.settings.border_style_options.dashed'),
                    'dotted' => _t('blocks.group.settings.border_style_options.dotted'),
                ])
                ->default('solid')
                ->asSegment()
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('border')),

            Color::make('border_color', _t('blocks.group.settings.border_color_label'))
                ->default('currentColor')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('border')),

            Select::make('border_radius', _t('blocks.group.settings.border_radius_label'))
                ->options([
                    'none' => _t('blocks.group.settings.border_radius_options.none'),
                    'sm' => 'SM',
                    'md' => 'MD',
                    'lg' => 'LG',
                    'xl' => 'XL',
                    '2xl' => '2XL',
                    '3xl' => '3XL',
                    'full' => _t('blocks.group.settings.border_radius_options.full'),
                ])
                ->default('none'),

            // Background
            Header::make(_t('blocks.group.settings.background_header')),

            Select::make('background_type', _t('blocks.group.settings.background_type_label'))
                ->options([
                    'none' => _t('blocks.group.settings.background_type_options.none'),
                    'color' => _t('blocks.group.settings.background_type_options.color'),
                    'gradient' => _t('blocks.group.settings.background_type_options.gradient'),
                    'image' => _t('blocks.group.settings.background_type_options.image'),
                ])
                ->asSegment()
                ->default('none'),

            Color::make('background_color', _t('blocks.group.settings.background_color_label'))
                ->default('rgba(0, 0, 0, 0)')
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'color')),

            Gradient::make('background_gradient', _t('blocks.group.settings.background_gradient_label'))
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'gradient')),

            Image::make('background_image', _t('blocks.group.settings.background_image_label'))
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'image')),

            Select::make('background_size', _t('blocks.group.settings.background_size_label'))
                ->options([
                    'cover' => _t('blocks.group.settings.background_size_options.cover'),
                    'contain' => _t('blocks.group.settings.background_size_options.contain'),
                    'auto' => _t('blocks.group.settings.background_size_options.auto'),
                ])
                ->default('cover')
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'image')),

            Select::make('background_repeat', _t('blocks.group.settings.background_repeat_label'))
                ->options([
                    'no-repeat' => _t('blocks.group.settings.background_repeat_options.no_repeat'),
                    'repeat' => _t('blocks.group.settings.background_repeat_options.repeat'),
                    'repeat-x' => _t('blocks.group.settings.background_repeat_options.repeat_x'),
                    'repeat-y' => _t('blocks.group.settings.background_repeat_options.repeat_y'),
                ])
                ->default('no-repeat')
                ->visibleWhen(fn ($rule) => $rule->when('background_type', 'image')),

            // Overlay
            Header::make(_t('blocks.group.settings.overlay_header')),

            Checkbox::make('is_overlay', _t('blocks.group.settings.is_overlay_label'))
                ->default(false)
                ->info(_t('blocks.group.settings.is_overlay_info')),

            Select::make('overlay_position', _t('blocks.group.settings.overlay_position_label'))
                ->options([
                    'full' => _t('blocks.group.settings.overlay_position_options.full'),
                    'top-left' => _t('blocks.group.settings.overlay_position_options.top_left'),
                    'top-center' => _t('blocks.group.settings.overlay_position_options.top_center'),
                    'top-right' => _t('blocks.group.settings.overlay_position_options.top_right'),
                    'middle-left' => _t('blocks.group.settings.overlay_position_options.middle_left'),
                    'middle-center' => _t('blocks.group.settings.overlay_position_options.middle_center'),
                    'middle-right' => _t('blocks.group.settings.overlay_position_options.middle_right'),
                    'bottom-left' => _t('blocks.group.settings.overlay_position_options.bottom_left'),
                    'bottom-center' => _t('blocks.group.settings.overlay_position_options.bottom_center'),
                    'bottom-right' => _t('blocks.group.settings.overlay_position_options.bottom_right'),
                    'top' => _t('blocks.group.settings.overlay_position_options.top'),
                    'bottom' => _t('blocks.group.settings.overlay_position_options.bottom'),
                ])
                ->default('full')
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('is_overlay')),

            Select::make('overlay_visibility', _t('blocks.group.settings.overlay_visibility_label'))
                ->options([
                    'always' => _t('blocks.group.settings.overlay_visibility_options.always'),
                    'hover' => _t('blocks.group.settings.overlay_visibility_options.hover'),
                ])
                ->default('always')
                ->info(_t('blocks.group.settings.overlay_visibility_info'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('is_overlay')),

            Select::make('overlay_hover_target', _t('blocks.group.settings.overlay_hover_target_label'))
                ->options([
                    'parent' => _t('blocks.group.settings.overlay_hover_target_options.parent'),
                    'group' => _t('blocks.group.settings.overlay_hover_target_options.group'),
                    'group/product-card' => _t('blocks.group.settings.overlay_hover_target_options.product_card'),
                ])
                ->default('parent')
                ->info(_t('blocks.group.settings.overlay_hover_target_info'))
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('is_overlay')->when('overlay_visibility', 'hover')),

            Range::make('z_index', _t('blocks.group.settings.z_index_label'))
                ->min(0)
                ->max(50)
                ->step(1)
                ->default(10)
                ->visibleWhen(fn ($rule) => $rule->whenTruthy('is_overlay')),

            Select::make('position', _t('blocks.group.settings.position_label'))
                ->options([
                    'static' => _t('blocks.group.settings.position_options.static'),
                    'relative' => _t('blocks.group.settings.position_options.relative'),
                    'absolute' => _t('blocks.group.settings.position_options.absolute'),
                    'fixed' => _t('blocks.group.settings.position_options.fixed'),
                ])
                ->default('static')
                ->visibleWhen(fn ($rule) => $rule->whenFalsy('is_overlay')),

            // Link
            Header::make(_t('blocks.group.settings.link_header')),

            Link::make('link', _t('blocks.group.settings.link_label'))
                ->default(null),

            Checkbox::make('open_in_new_tab', _t('blocks.group.settings.open_in_new_tab_label'))
                ->default(false),
        ];
    }

    public static function presets(): array
    {
        return [
            Preset::make(_t('blocks.group.presets.basic.name'))
                ->category(_t('blocks.group.presets.basic.category'))
                ->settings([
                    'layout_type' => 'block',
                ]),

            Preset::make(_t('blocks.group.presets.centered.name'))
                ->category(_t('blocks.group.presets.centered.category'))
                ->settings([
                    'max_width' => 'xl',
                    'margin' => [
                        'top' => 0,
                        'right' => 'auto',
                        'bottom' => 0,
                        'left' => 'auto',
                    ],
                ]),

            Preset::make(_t('blocks.group.presets.card.name'))
                ->category(_t('blocks.group.presets.card.category'))
                ->settings([
                    'padding' => [
                        'top' => 6,
                        'right' => 6,
                        'bottom' => 6,
                        'left' => 6,
                    ],
                    'border' => true,
                    'border_radius' => 'lg',
                ]),

            Preset::make(_t('blocks.group.presets.flex_row.name'))
                ->category(_t('blocks.group.presets.flex_row.category'))
                ->settings([
                    'layout_type' => 'flex',
                    'flex_direction' => 'row',
                    'flex_gap' => 4,
                ]),

            Preset::make(_t('blocks.group.presets.grid.name'))
                ->category(_t('blocks.group.presets.grid.category'))
                ->settings([
                    'layout_type' => 'grid',
                    'grid_columns' => 3,
                    'grid_gap' => 4,
                ]),

            Preset::make(_t('blocks.group.presets.overlay.name'))
                ->category(_t('blocks.group.presets.overlay.category'))
                ->settings([
                    'is_overlay' => true,
                    'background_color' => 'rgba(0, 0, 0, 0.5)',
                    'padding' => [
                        'top' => 8,
                        'right' => 0,
                        'bottom' => 8,
                        'left' => 0,
                    ],
                ])
                ->blocks([
                    PresetBlock::make('@basic-blocks/text')
                        ->settings([
                            'text' => 'Overlay Content',
                        ]),
                ]),
        ];
    }

    public function getViewData(): array
    {
        $link = $this->normalizedLink();
        $openInNewTab = (bool) ($this->block->settings->open_in_new_tab ?? false);

        return array_merge($this->generateClasses(), [
            'link' => $link,
            'isLinkable' => $link !== null,
            'linkTarget' => $link !== null && $openInNewTab ? '_blank' : null,
            'linkRel' => $link !== null && $openInNewTab ? 'noopener noreferrer' : null,
        ]);
    }

    protected function generateClasses(): array
    {
        $classes = ['group'];
        $styles = [];

        $this->mapPosition($classes, $styles);

        if ($this->block->settings->has('layout_type')) {
            $layoutType = $this->block->settings->layout_type ?? 'block';
            $this->mapLayoutType($classes, $layoutType);

            if ($layoutType === 'flex') {
                $this->mapFlexProperties($classes);
            }

            if ($layoutType === 'grid') {
                $this->mapGridProperties($classes);
            }
        } elseif ($this->block->settings->has('flex_direction')) {
            $classes[] = 'flex';
            $this->mapFlexProperties($classes);
        }

        $this->mapSpacing($classes, $styles);
        $this->mapSizing($classes, $styles);
        $this->mapBorder($classes, $styles);
        $this->mapBorderRadius($classes);
        $this->mapBackground($classes, $styles);
        $this->mapOverlay($classes, $styles);

        return [
            'class' => implode(' ', $classes),
            'style' => implode(';', $styles),
        ];
    }

    protected function mapPosition(array &$classes, array &$styles): void
    {
        if ($this->block->settings->is_overlay ?? false) {
            $overlayPosition = $this->block->settings->overlay_position ?? 'full';

            $positionClasses = match ($overlayPosition) {
                'top-left' => 'absolute top-0 left-0',
                'top-center' => 'absolute top-0 left-1/2 -translate-x-1/2',
                'top-right' => 'absolute top-0 right-0',
                'middle-left' => 'absolute top-1/2 left-0 -translate-y-1/2',
                'middle-center' => 'absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2',
                'middle-right' => 'absolute top-1/2 right-0 -translate-y-1/2',
                'bottom-left' => 'absolute bottom-0 left-0',
                'bottom-center' => 'absolute bottom-0 left-1/2 -translate-x-1/2',
                'bottom-right' => 'absolute bottom-0 right-0',
                'top' => 'absolute top-0 left-0 right-0',
                'bottom' => 'absolute bottom-0 left-0 right-0',
                default => 'absolute inset-0',
            };

            $classes[] = $positionClasses;

            if ($overlayPosition !== 'full') {
                $classes[] = 'pointer-events-none [&>*]:pointer-events-auto';
            }

            $overlayVisibility = $this->block->settings->overlay_visibility ?? 'always';
            if ($overlayVisibility === 'hover') {
                $hoverTarget = $this->block->settings->overlay_hover_target ?? 'parent';

                if (str_starts_with($hoverTarget, 'group/')) {
                    $hoverPrefix = 'group-hover/'.substr($hoverTarget, 6);
                } elseif ($hoverTarget === 'group') {
                    $hoverPrefix = 'group-hover';
                } else {
                    $hoverPrefix = 'parent-hover';
                }

                $classes[] = "opacity-0 pointer-events-none {$hoverPrefix}:opacity-100 {$hoverPrefix}:pointer-events-auto transition-opacity duration-300 [&>*]:pointer-events-auto";
            }

            if ($this->block->settings->has('z_index')) {
                $zIndex = $this->block->settings->z_index;
                $commonZIndexes = [0, 10, 20, 30, 40, 50];
                if (in_array($zIndex, $commonZIndexes)) {
                    $classes[] = "z-{$zIndex}";
                } else {
                    $styles[] = "z-index: {$zIndex}";
                }
            }
        } else {
            $classes[] = match ($this->block->settings->position ?? 'static') {
                'relative' => 'relative',
                'absolute' => 'absolute',
                'fixed' => 'fixed',
                default => 'static',
            };
        }
    }

    protected function mapLayoutType(array &$classes, string $layoutType): void
    {
        $classes[] = match ($layoutType) {
            'flex' => 'flex',
            'grid' => 'grid',
            default => 'block',
        };
    }

    protected function mapFlexProperties(array &$classes): void
    {
        $s = $this->block->settings;

        if ($s->has('flex_direction')) {
            $classes[] = Tailwind::responsive($s->flex_direction, fn ($v) => match ($v) {
                'row' => 'flex-row',
                'row-reverse' => 'flex-row-reverse',
                'column' => 'flex-col',
                'column-reverse' => 'flex-col-reverse',
                default => 'flex-row',
            });
        }

        if ($s->get('flex_justify')) {
            $classes[] = Tailwind::responsive($s->flex_justify, fn ($v) => match ($v) {
                'start' => 'justify-start',
                'center' => 'justify-center',
                'between' => 'justify-between',
                'end' => 'justify-end',
                default => 'justify-start',
            });
        }

        if ($s->get('flex_align')) {
            $classes[] = Tailwind::responsive($s->flex_align, fn ($v) => match ($v) {
                'start' => 'items-start',
                'center' => 'items-center',
                'end' => 'items-end',
                default => 'items-stretch',
            });
        }

        if ($s->has('flex_wrap')) {
            $classes[] = Tailwind::responsive($s->flex_wrap, fn ($v) => match ($v) {
                'nowrap' => 'flex-nowrap',
                'wrap' => 'flex-wrap',
                'wrap-reverse' => 'flex-wrap-reverse',
                default => 'flex-nowrap',
            });
        }

        if ($s->has('flex_gap')) {
            $classes[] = Tailwind::responsive($s->flex_gap, fn ($v) => "gap-{$v}");
        }
    }

    protected function mapGridProperties(array &$classes): void
    {
        if ($this->block->settings->has('grid_columns')) {
            $classes[] = Tailwind::responsive($this->block->settings->grid_columns, fn ($v) => is_numeric($v) ? "grid-cols-{$v}" : (string) $v);
        }

        if ($this->block->settings->has('grid_rows')) {
            $classes[] = Tailwind::responsive($this->block->settings->grid_rows, fn ($v) => is_numeric($v) ? "grid-rows-{$v}" : 'grid-rows-1');
        }

        if ($this->block->settings->has('grid_gap')) {
            $classes[] = Tailwind::responsive($this->block->settings->grid_gap, fn ($v) => "gap-{$v}");
        }
    }

    protected function mapSpacing(array &$classes, array &$styles): void
    {
        $s = $this->block->settings;

        if ($s->has('padding')) {
            $classes[] = Tailwind::responsive($s->padding, fn ($v) => Tailwind::buildSpacingClasses($v, 'p'));
        }

        if ($s->has('margin')) {
            $classes[] = Tailwind::responsive($s->margin, fn ($v) => Tailwind::buildSpacingClasses($v, 'm'));
        }
    }

    protected function mapSizing(array &$classes, array &$styles): void
    {
        // Width
        if ($this->block->settings->has('width')) {
            $width = $this->block->settings->width;

            $widthRv = Tailwind::toResponsiveValue($width);
            $hasCustomWidth = false;
            foreach ($widthRv->all() as $val) {
                if ($val === 'custom') {
                    $hasCustomWidth = true;
                    break;
                }
            }

            if ($hasCustomWidth && $this->block->settings->has('custom_width')) {
                $customWidthData = Tailwind::buildResponsiveStyleFor(
                    value: $this->block->settings->custom_width,
                    prefix: 'w',
                    property: 'width'
                );
                $classes[] = $customWidthData['classes'];
                if (! empty($customWidthData['styles'])) {
                    $styles[] = $customWidthData['styles'];
                }
            }

            $classes[] = Tailwind::responsive($width, fn ($v) => match ($v) {
                'full' => 'w-full',
                'fit' => 'w-fit',
                'screen' => 'w-screen',
                'custom' => '',
                default => '',
            });
        }

        // Min width
        if ($this->block->settings->has('min_width')) {
            $minWidth = $this->block->settings->min_width;
            if ($minWidth > 0) {
                $styles[] = "min-width: {$minWidth}px";
            }
        }

        // Max width
        if ($this->block->settings->has('max_width')) {
            $maxWidth = $this->block->settings->max_width;
            if ($maxWidth !== 'none') {
                $classes[] = Tailwind::responsive($maxWidth, fn ($v) => match ($v) {
                    'xs' => 'max-w-xs',
                    'sm' => 'max-w-sm',
                    'md' => 'max-w-md',
                    'lg' => 'max-w-lg',
                    'xl' => 'max-w-xl',
                    '2xl' => 'max-w-2xl',
                    '3xl' => 'max-w-3xl',
                    '4xl' => 'max-w-4xl',
                    '5xl' => 'max-w-5xl',
                    '6xl' => 'max-w-6xl',
                    '7xl' => 'max-w-7xl',
                    'full' => 'max-w-full',
                    'screen' => 'max-w-screen',
                    default => '',
                });
            }
        }

        // Height
        if ($this->block->settings->has('height')) {
            $height = $this->block->settings->height;
            if ($height === 'custom' && $this->block->settings->has('custom_height')) {
                $customHeight = $this->block->settings->custom_height;
                $styles[] = "height: {$customHeight}px";
            } elseif ($height !== 'auto') {
                $classes[] = Tailwind::responsive($height, fn ($v) => match ($v) {
                    'full' => 'h-full',
                    'fit' => 'h-fit',
                    'screen' => 'h-screen',
                    default => '',
                });
            }
        }

        // Min height
        if ($this->block->settings->has('min_height')) {
            $minHeight = $this->block->settings->min_height;
            if ($minHeight > 0) {
                $styles[] = "min-height: {$minHeight}px";
            }
        }
    }

    protected function mapBorder(array &$classes, array &$styles): void
    {
        if (! ($this->block->settings->border ?? false)) {
            return;
        }

        // Border width
        if ($this->block->settings->has('border_width')) {
            $borderWidth = $this->block->settings->border_width;
            if ($borderWidth >= 0 && $borderWidth <= 8) {
                $classes[] = $borderWidth === 1 ? 'border' : "border-{$borderWidth}";
            } else {
                $styles[] = "border-width: {$borderWidth}px";
            }
        }

        // Border style
        if ($this->block->settings->has('border_style')) {
            $classes[] = match ($this->block->settings->border_style) {
                'dashed' => 'border-dashed',
                'dotted' => 'border-dotted',
                default => 'border-solid',
            };
        }

        $rawBorderColor = $this->block->settings->border_color ?? null;
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

    protected function mapBorderRadius(array &$classes): void
    {
        if ($this->block->settings->has('border_radius')) {
            $borderRadius = $this->block->settings->border_radius;
            if ($borderRadius !== 'none') {
                $classes[] = Tailwind::responsive($borderRadius, fn ($v) => match ($v) {
                    'sm' => 'rounded-sm',
                    'md' => 'rounded-md',
                    'lg' => 'rounded-lg',
                    'xl' => 'rounded-xl',
                    '2xl' => 'rounded-2xl',
                    '3xl' => 'rounded-3xl',
                    'full' => 'rounded-full',
                    default => '',
                });
            }
        }
    }

    protected function mapBackground(array &$classes, array &$styles): void
    {
        $bgType = $this->block->settings->background_type ?? 'none';

        if ($bgType === 'color' && $this->block->settings->has('background_color') && $this->block->settings->background_color) {
            $styles[] = "background-color: {$this->block->settings->background_color}";
        } elseif ($bgType === 'gradient' && $this->block->settings->has('background_gradient') && $this->block->settings->background_gradient) {
            $styles[] = "background-image: {$this->block->settings->background_gradient}";
        } elseif ($bgType === 'image' && $this->block->settings->has('background_image') && $this->block->settings->background_image) {
            /** @var ImageValue $backgroundImage */
            $backgroundImage = $this->block->settings->background_image;

            $styles[] = "background-image: url('{$backgroundImage}')";
            $styles[] = "background-position: {$backgroundImage->objectPosition()}";

            $classes[] = match ($this->block->settings->background_size ?? 'cover') {
                'contain' => 'bg-contain',
                'auto' => 'bg-auto',
                default => 'bg-cover',
            };

            $classes[] = match ($this->block->settings->background_repeat ?? 'no-repeat') {
                'repeat' => 'bg-repeat',
                'repeat-x' => 'bg-repeat-x',
                'repeat-y' => 'bg-repeat-y',
                default => 'bg-no-repeat',
            };
        }
    }

    protected function mapOverlay(array &$classes, array &$styles): void
    {
        // Overlay positioning is handled in mapPosition()
    }

    protected function normalizedLink(): ?string
    {
        $rawLink = $this->block->settings->link ?? null;

        if (is_string($rawLink)) {
            $link = $rawLink;
        } elseif ($rawLink instanceof \Stringable) {
            $link = (string) $rawLink;
        } else {
            return null;
        }

        $link = trim($link);

        return $link === '' ? null : $link;
    }
}
