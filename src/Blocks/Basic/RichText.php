<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\Visual\Settings\RichText as RichTextSetting;

use function BagistoPlus\BasicBlocks\_t;

class RichText extends Text
{
    protected static string $type = '@basic-blocks/richtext';

    protected static string $view = 'basic-blocks::blocks.basic.richtext';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>';

    protected static string $category = 'Basic';

    public static function settings(): array
    {
        return array_merge(
            [
                RichTextSetting::make('content', _t('blocks.richtext.settings.content_label'))
                    ->default('<p>Add your content here</p>'),
            ],
            Text::stylingSettings()
        );
    }

    protected function getTag(): string
    {
        return 'div';
    }

    protected function getClasses(): string
    {
        return 'prose '.parent::getClasses();
    }
}
