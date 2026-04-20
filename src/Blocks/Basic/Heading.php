<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\Visual\Settings;

use function BagistoPlus\BasicBlocks\_t;

class Heading extends Text
{
    protected static string $type = '@basic-blocks/heading';

    protected static string $view = 'basic-blocks::blocks.basic.text';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 12h12"/><path d="M6 20V4"/><path d="M18 20V4"/></svg>';

    protected static string $category = 'Basic';

    public static function description(): string
    {
        return _t('blocks.heading.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                Settings\Text::make('text', _t('blocks.heading.text_label'))
                    ->default(_t('blocks.heading.default_text')),

                Settings\Select::make('heading_level', _t('blocks.heading.heading_level_label'))
                    ->options([
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ])
                    ->asSegment()
                    ->default('h2'),
            ],

            Text::stylingSettings()
        );
    }

    protected function getTag(): string
    {
        return $this->block->settings->heading_level ?? 'h2';
    }
}
