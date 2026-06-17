<?php

namespace BagistoPlus\BasicBlocks\Blocks\Category;

use BagistoPlus\BasicBlocks\Blocks\Basic\Text;
use BagistoPlus\Visual\Settings\Category as CategorySetting;
use BagistoPlus\Visual\Support\Preset;

use function BagistoPlus\BasicBlocks\_t;

class CategoryName extends Text
{
    protected static string $type = '@basic-blocks/category-name';

    protected static string $view = 'basic-blocks::blocks.category.name';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>';

    protected static string $category = 'Category';

    public static function name(): string
    {
        return _t('blocks.category-name.name');
    }

    public static function description(): string
    {
        return _t('blocks.category-name.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                CategorySetting::make('category', _t('blocks.category-name.settings.category_label')),
            ],
            Text::stylingSettings()
        );
    }

    public static function presets(): array
    {
        return [
            Preset::make(_t('blocks.text.presets.category-name.name'))
                ->settings([
                    'text' => '@category.name',
                ]),
        ];
    }
}
