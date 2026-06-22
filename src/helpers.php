<?php

namespace BagistoPlus\BasicBlocks;

if (! function_exists(__NAMESPACE__.'\_t')) {
    /**
     * A shortcut for deferring package translations to Visual.
     */
    function _t(string $key): string
    {
        return \BagistoPlus\Visual\t("basic-blocks::$key");
    }
}

if (! function_exists(__NAMESPACE__.'\inline_svg')) {
    /**
     * Read an SVG file from disk and return its raw content for inline rendering.
     *
     * Absolute paths are used as-is. Relative paths are resolved against the
     * package root, so views can reference bundled SVGs without worrying about
     * Blade's compiled-view location.
     *
     * Results are memoized per-path for the lifetime of the request.
     */
    function inline_svg(string $path): string
    {
        /** @var array<string, string> $cache */
        static $cache = [];

        if (! str_starts_with($path, '/') && ! preg_match('#^[a-z]:[\\\\/]#i', $path)) {
            $path = __DIR__.'/../'.ltrim($path, '/');
        }

        return $cache[$path] ??= file_get_contents($path);
    }
}

if (! function_exists(__NAMESPACE__.'\image_to_base64')) {
    /**
     * Read an image from disk and return it as a base64 data URI.
     *
     * Absolute paths are used as-is. Relative paths are resolved against the
     * package root, so views and PHP can reference bundled assets without
     * worrying about Blade's compiled-view location.
     *
     * Results are memoized per-path for the lifetime of the request.
     */
    function image_to_base64(string $path): string
    {
        /** @var array<string, string> $cache */
        static $cache = [];

        if (! str_starts_with($path, '/') && ! preg_match('#^[a-z]:[\\\\/]#i', $path)) {
            $path = __DIR__.'/../'.ltrim($path, '/');
        }

        if (isset($cache[$path])) {
            return $cache[$path];
        }

        $mime = match (strtolower(pathinfo($path, PATHINFO_EXTENSION))) {
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'avif' => 'image/avif',
            'svg' => 'image/svg+xml',
            default => 'application/octet-stream',
        };

        return $cache[$path] = 'data:'.$mime.';base64,'.base64_encode(file_get_contents($path));
    }
}
