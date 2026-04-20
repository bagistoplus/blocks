<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Icon;
use BagistoPlus\Visual\Settings\Link;
use BagistoPlus\Visual\Settings\Select;
use BagistoPlus\Visual\Settings\Text;
use BagistoPlus\Visual\Support\Preset;

use function BagistoPlus\BasicBlocks\_t;

class Button extends SimpleBlock
{
    protected static string $type = '@basic-blocks/button';

    protected static string $view = 'basic-blocks::blocks.basic.button';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="6"/><line x1="12" y1="12" x2="12" y2="12"/></svg>';

    protected static string $category = 'Basic';

    public static function description(): string
    {
        return _t('blocks.button.description');
    }

    public static function settings(): array
    {
        return [
            Text::make('text', _t('blocks.button.settings.text_label'))
                ->default('Button'),

            Link::make('url', _t('blocks.button.settings.url_label')),

            Checkbox::make('open_in_new_tab', _t('blocks.button.settings.open_in_new_tab_label'))
                ->asSwitch()
                ->default(false),

            Header::make(_t('blocks.button.settings.appearance_header')),

            Select::make('color', _t('blocks.button.settings.color_label'))
                ->options([
                    'primary' => _t('blocks.button.settings.color_options.primary'),
                    'secondary' => _t('blocks.button.settings.color_options.secondary'),
                    'accent' => _t('blocks.button.settings.color_options.accent'),
                    'neutral' => _t('blocks.button.settings.color_options.neutral'),
                ])
                ->default('primary'),

            Select::make('style', _t('blocks.button.settings.style_label'))
                ->options([
                    'filled' => _t('blocks.button.settings.style_options.filled'),
                    'soft' => _t('blocks.button.settings.style_options.soft'),
                    'outline' => _t('blocks.button.settings.style_options.outline'),
                    'ghost' => _t('blocks.button.settings.style_options.ghost'),
                    'link' => _t('blocks.button.settings.style_options.link'),
                ])
                ->default('filled'),

            Select::make('size', _t('blocks.button.settings.size_label'))
                ->options([
                    'xs' => _t('blocks.button.settings.size_options.xs'),
                    'sm' => _t('blocks.button.settings.size_options.sm'),
                    'md' => _t('blocks.button.settings.size_options.md'),
                    'lg' => _t('blocks.button.settings.size_options.lg'),
                    'xl' => _t('blocks.button.settings.size_options.xl'),
                ])
                ->default('md'),

            Checkbox::make('full_width', _t('blocks.button.settings.full_width_label'))
                ->asSwitch()
                ->default(false),

            Header::make(_t('blocks.button.settings.icon_header')),

            Icon::make('icon', _t('blocks.button.settings.icon_label')),

            Select::make('icon_position', _t('blocks.button.settings.icon_position_label'))
                ->options([
                    'left' => _t('blocks.button.settings.icon_position_options.left'),
                    'right' => _t('blocks.button.settings.icon_position_options.right'),
                ])
                ->default('left')
                ->visibleIf(fn ($rule) => $rule->whenTruthy('icon')),
        ];
    }

    public static function presets(): array
    {
        return [
            Preset::make(_t('blocks.button.presets.primary.name'))
                ->category('Basic')
                ->settings([
                    'color' => 'primary',
                    'style' => 'filled',
                    'size' => 'md',
                ]),

            Preset::make(_t('blocks.button.presets.outline.name'))
                ->category('Basic')
                ->settings([
                    'color' => 'primary',
                    'style' => 'outline',
                    'size' => 'md',
                ]),

            Preset::make(_t('blocks.button.presets.ghost.name'))
                ->category('Basic')
                ->settings([
                    'color' => 'neutral',
                    'style' => 'ghost',
                    'size' => 'md',
                ]),

            Preset::make(_t('blocks.button.presets.large_cta.name'))
                ->category('Basic')
                ->settings([
                    'text' => 'Get Started',
                    'color' => 'accent',
                    'style' => 'filled',
                    'size' => 'lg',
                    'full_width' => true,
                ]),

            Preset::make(_t('blocks.button.presets.small_soft.name'))
                ->category('Basic')
                ->settings([
                    'color' => 'secondary',
                    'style' => 'soft',
                    'size' => 'sm',
                ]),
        ];
    }

    public function getViewData(): array
    {
        $s = $this->block->settings;
        $openInNewTab = $s->open_in_new_tab ?? false;

        return [
            'color' => $s->color ?? 'primary',
            'variant' => $s->style ?? 'filled',
            'size' => $s->size ?? 'md',
            'fullWidth' => $s->full_width ?? false,
            'url' => $s->url ?? '#',
            'target' => $openInNewTab ? '_blank' : null,
            'rel' => $openInNewTab ? 'noopener noreferrer' : null,
            'icon' => $s->icon ?? null,
            'iconPosition' => $s->icon_position ?? 'left',
        ];
    }
}
