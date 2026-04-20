<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\Visual\Blocks\SimpleBlock;
use BagistoPlus\Visual\Settings\ColorScheme;
use BagistoPlus\Visual\Settings\Range;
use BagistoPlus\Visual\Settings\Select;

use function BagistoPlus\BasicBlocks\_t;

class Divider extends SimpleBlock
{
    protected static string $type = '@basic-blocks/divider';

    protected static string $view = 'basic-blocks::blocks.basic.divider';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/></svg>';

    protected static string $category = 'Basic';

    public static function description(): string
    {
        return _t('blocks.divider.description');
    }

    public static function settings(): array
    {
        return [
            Range::make('thickness', _t('blocks.divider.settings.thickness_label'))
                ->info(_t('blocks.divider.settings.thickness_info'))
                ->min(1)
                ->max(10)
                ->unit('px')
                ->default(1),

            Range::make('length', _t('blocks.divider.settings.width_percent_label'))
                ->info(_t('blocks.divider.settings.width_percent_info'))
                ->min(5)
                ->max(100)
                ->unit('%')
                ->default(100),

            Select::make('corner_radius', _t('blocks.divider.settings.corner_radius_label'))
                ->options([
                    'square' => _t('blocks.divider.settings.corner_radius_options.square'),
                    'rounded' => _t('blocks.divider.settings.corner_radius_options.rounded'),
                ])
                ->asSegment()
                ->default('square'),

            ColorScheme::make('color_scheme', _t('blocks.common.color_scheme_label'))
                ->info(_t('blocks.common.color_scheme_info')),
        ];
    }

    public function getViewData(): array
    {
        $settings = $this->block->settings;

        return [
            'thickness' => (int) ($settings->thickness ?? 1),
            'length' => (int) ($settings->length ?? 100),
            'isRounded' => ($settings->corner_radius ?? 'square') === 'rounded',
        ];
    }
}
