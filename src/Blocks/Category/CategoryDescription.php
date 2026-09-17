<?php

namespace BagistoPlus\BasicBlocks\Blocks\Category;

use BagistoPlus\BasicBlocks\Blocks\Basic\Text;
use BagistoPlus\Visual\Settings\Category as CategorySetting;

use function BagistoPlus\BasicBlocks\_t;

class CategoryDescription extends Text
{
    protected static string $type = '@basic-blocks/category-description';

    protected static string $view = 'basic-blocks::blocks.category.description';

    protected static string $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16"/><path d="M4 12h10"/><path d="M4 18h14"/></svg>';

    protected static string $category = 'Category';

    public static function name(): string
    {
        return _t('blocks.category-description.name');
    }

    public static function description(): string
    {
        return _t('blocks.category-description.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                CategorySetting::make('category', _t('blocks.category-description.settings.category_label'))
                    ->info(_t('blocks.category-description.settings.category_info')),
            ],
            Text::stylingSettings()
        );
    }

    public function getViewData(): array
    {
        $category = $this->block->settings->category ?? $this->context('category');
        $description = $category->description ?? '';

        return array_merge(parent::getViewData(), [
            'category' => $category,
            'description' => $description,
            'hasDescription' => $this->hasVisibleContent($description),
        ]);
    }

    /**
     * Get the HTML tag to use
     */
    protected function getTag(): string
    {
        return 'div';
    }

    /**
     * Get all CSS classes
     */
    protected function getClasses(): string
    {
        return 'prose '.parent::getClasses();
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
