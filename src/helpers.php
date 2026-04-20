<?php

namespace BagistoPlus\BasicBlocks;

if (! function_exists('_t')) {
    /**
     * A shortcut for visual-debut string localization
     * Works with both sections and blocks translations
     */
    function _t(string $key, array $replace = [], ?string $locale = null): string|array
    {
        return __("basic-blocks::$key", $replace, $locale);
    }
}
