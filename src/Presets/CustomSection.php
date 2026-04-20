<?php

namespace BagistoPlus\BasicBlocks\Presets;

use BagistoPlus\Visual\Support\Preset;

use function BagistoPlus\BasicBlocks\_t;

class CustomSection extends Preset
{
    public static function getType(): string
    {
        return '@basic-blocks/flex-section';
    }

    protected function build(): void
    {
        $this
            ->name(_t('sections.flex-section.presets.custom_section.name'))
            ->category('Content')
            ->settings([
                'section_height' => 'sm',
            ]);
    }
}
