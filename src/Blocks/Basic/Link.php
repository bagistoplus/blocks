<?php

namespace BagistoPlus\BasicBlocks\Blocks\Basic;

use BagistoPlus\Visual\Settings;

use function BagistoPlus\BasicBlocks\_t;

class Link extends Text
{
    protected static string $type = '@basic-blocks/link';

    protected static string $view = 'basic-blocks::blocks.basic.link';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>';

    protected static string $category = 'Basic';

    public static function name(): string
    {
        return _t('blocks.link.name');
    }

    public static function description(): string
    {
        return _t('blocks.link.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                Settings\Text::make('text', _t('blocks.link.settings.text_label'))
                    ->default('Click here'),

                Settings\Link::make('url', _t('blocks.link.settings.url_label')),

                Settings\Checkbox::make('open_in_new_tab', _t('blocks.link.settings.open_in_new_tab_label'))
                    ->default(false),

                Settings\Header::make(_t('blocks.link.settings.appearance_header')),

                Settings\Select::make('underline', _t('blocks.link.settings.underline_label'))
                    ->options([
                        'none' => _t('blocks.link.settings.underline_options.none'),
                        'hover' => _t('blocks.link.settings.underline_options.hover'),
                        'always' => _t('blocks.link.settings.underline_options.always'),
                    ])
                    ->default('hover'),
            ],
            Text::stylingSettings()
        );
    }

    /**
     * Get view data for rendering
     */
    public function getViewData(): array
    {
        $openInNewTab = $this->block->settings->open_in_new_tab;

        return array_merge(parent::getViewData(), [
            'url' => $this->block->settings->url ?? '#',
            'target' => $openInNewTab ? '_blank' : null,
            'rel' => $openInNewTab ? 'noopener noreferrer' : null,
        ]);
    }

    /**
     * Get the HTML tag to use
     */
    protected function getTag(): string
    {
        return 'a';
    }

    /**
     * Get all CSS classes
     */
    protected function getClasses(): string
    {
        return trim($this->getUnderlineClass().' '.parent::getClasses());
    }

    /**
     * Get the underline CSS class
     */
    protected function getUnderlineClass(): string
    {
        return match ($this->block->settings->underline ?? 'hover') {
            'none' => 'no-underline hover:no-underline',
            'hover' => 'no-underline hover:underline',
            'always' => 'underline',
            default => 'no-underline hover:underline',
        };
    }
}
