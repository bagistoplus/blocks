<?php

namespace BagistoPlus\BasicBlocks\Blocks\Category;

use BagistoPlus\BasicBlocks\Blocks\Media\Image;
use BagistoPlus\Visual\Settings\Category as CategorySetting;
use BagistoPlus\Visual\Settings\Select;

use function BagistoPlus\BasicBlocks\_t;

class CategoryImage extends Image
{
    protected static string $type = '@basic-blocks/category-image';

    protected static string $view = 'basic-blocks::blocks.category.image';

    protected static string $category = 'Category';

    public static function name(): string
    {
        return _t('blocks.category-image.name');
    }

    public static function description(): string
    {
        return _t('blocks.category-image.description');
    }

    public static function settings(): array
    {
        return array_merge(
            [
                CategorySetting::make('category', _t('blocks.category-image.settings.category_label')),

                Select::make('image_source', _t('blocks.category-image.settings.image_source_label'))
                    ->options([
                        'banner' => _t('blocks.category-image.settings.image_source_options.banner'),
                        'logo' => _t('blocks.category-image.settings.image_source_options.logo'),
                    ])
                    ->default('banner')
                    ->info(_t('blocks.category-image.settings.image_source_info')),
            ],
            parent::sizingSettings()
        );
    }

    public function getViewData(): array
    {
        $category = $this->block->settings->category ?? $this->context('category');

        if (! $category) {
            return array_merge(parent::getViewData(), ['image' => null, 'alt' => '']);
        }

        $imageUrl = match ($this->block->settings->image_source) {
            'logo' => $category->logo_url,
            default => $category->banner_url ?? $category->logo_url,
        };

        return array_merge(parent::getViewData(), [
            'image' => $imageUrl,
            'alt' => $category->name,
        ]);
    }

    public function share(): array
    {
        return ['category' => $this->block->settings->category ?? $this->context('category')];
    }
}
