<?php

namespace BagistoPlus\BasicBlocks;

use BagistoPlus\Visual\Settings\Support\SpacingValue;
use Craftile\Core\Data\ResponsiveValue;

class Tailwind
{
    /** @var array<string, string> */
    protected static array $breakpointMap = [
        'mobile' => 'mobile',
        'tablet' => 'tablet',
        'desktop' => 'desktop',
        '_default' => '', // base
    ];

    public static function toResponsiveValue(mixed $value): ResponsiveValue
    {
        if ($value instanceof ResponsiveValue) {
            return $value;
        }

        // If it's already an array with responsive keys, use it directly
        if (is_array($value) && array_intersect(array_keys($value), array_keys(static::$breakpointMap))) {
            return new ResponsiveValue($value);
        }

        return new ResponsiveValue(['_default' => $value]);
    }

    /**
     * Build responsive Tailwind classes from a value and callback
     *
     * @param  callable(mixed): mixed|array<int|string, mixed>|null  $callback
     */
    public static function responsive(mixed $value, callable|array|null $callback): string
    {
        $rv = static::toResponsiveValue($value);
        $classes = [];

        foreach ($rv->all() as $key => $v) {
            if ($v === null) {
                continue;
            }

            // Handle callable map or lookup map
            if (is_callable($callback)) {
                $cls = $callback($v);
            } elseif (is_array($callback) && (is_string($v) || is_int($v))) {
                $cls = $callback[$v] ?? (string) $v;
            } else {
                $cls = (string) $v;
            }

            $prefix = static::$breakpointMap[$key] ?? '';
            $classes[] = $prefix
                ? implode(' ', array_map(fn (string $class) => "{$prefix}:{$class}", preg_split('/\s+/', trim($cls), flags: PREG_SPLIT_NO_EMPTY)))
                : $cls;
        }

        return implode(' ', $classes);
    }

    /**
     * Build spacing classes from a spacing value object
     *
     * @param  non-empty-string  $prefix  Class prefix (p for padding, m for margin)
     */
    public static function buildSpacingClasses(SpacingValue $value, string $prefix): string
    {
        $top = $value->top ?? 0;
        $right = $value->right ?? 0;
        $bottom = $value->bottom ?? 0;
        $left = $value->left ?? 0;

        if ($top == $right && $right == $bottom && $bottom == $left) {
            return "{$prefix}-{$top}";
        }

        if ($top == $bottom && $left == $right) {
            return "{$prefix}y-{$top} {$prefix}x-{$left}";
        }

        return "{$prefix}t-{$top} {$prefix}e-{$right} {$prefix}b-{$bottom} {$prefix}s-{$left}";
    }

    /**
     * Build responsive CSS classes and inline styles for a CSS property
     *
     * @param  non-empty-string  $prefix  Tailwind class prefix (e.g., 'w', 'h')
     * @param  non-empty-string  $property  CSS property name (e.g., 'width', 'height')
     * @param  string  $unit  Unit to append to values (default: '%')
     * @return array{classes: string, styles: string}
     */
    public static function buildResponsiveStyleFor(mixed $value, string $prefix, string $property, string $unit = '%'): array
    {
        $rv = static::toResponsiveValue($value);
        $classes = [];
        $styles = [];

        foreach ($rv->all() as $breakpoint => $val) {
            if ($val === null) {
                continue;
            }

            $varName = $breakpoint === '_default'
                ? "--{$property}"
                : "--{$property}-{$breakpoint}";

            $className = $breakpoint === '_default'
                ? "{$prefix}-(--{$property})"
                : "{$breakpoint}:{$prefix}-(--{$property}-{$breakpoint})";

            $classes[] = $className;
            $styles[] = "{$varName}: {$val}{$unit}";
        }

        return [
            'classes' => implode(' ', $classes),
            'styles' => implode('; ', $styles),
        ];
    }
}
