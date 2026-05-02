<?php

namespace BagistoPlus\BasicBlocks\Settings;

use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Settings\Color;
use BagistoPlus\Visual\Settings\Header;
use BagistoPlus\Visual\Settings\Range;

class ButtonSettingsSchema
{
    /**
     * Predefined styles with their default values.
     */
    private const STYLES = [
        'flat' => [
            'btn_radius' => 6,
            'btn_border_width' => 0,

            'btn_shadow_x' => 0,
            'btn_shadow_y' => 0,
            'btn_shadow_blur' => 0,
            'btn_shadow_spread' => 0,
            'btn_shadow_color' => '#000000',
            'btn_shadow_opacity' => 0,
            'btn_inset_x' => 0,
            'btn_inset_y' => 0,
            'btn_inset_blur' => 0,
            'btn_inset_spread' => 0,
            'btn_inset_color' => '#000000',
            'btn_inset_opacity' => 0,

            'btn_letter_spacing' => 0,
            'btn_uppercase' => false,
        ],

        'neumorphism' => [
            'btn_radius' => 16,
            'btn_border_width' => 0,

            'btn_shadow_x' => 6,
            'btn_shadow_y' => 6,
            'btn_shadow_blur' => 12,
            'btn_shadow_spread' => 0,
            'btn_shadow_color' => '#000000',
            'btn_shadow_opacity' => 0.15,
            'btn_inset_x' => -2,
            'btn_inset_y' => -2,
            'btn_inset_blur' => 6,
            'btn_inset_spread' => 0,
            'btn_inset_color' => '#ffffff',
            'btn_inset_opacity' => 0.2,

            'btn_letter_spacing' => 0,
            'btn_uppercase' => false,
        ],

        'brutalism' => [
            'btn_radius' => 0,
            'btn_border_width' => 3,

            'btn_shadow_x' => 4,
            'btn_shadow_y' => 4,
            'btn_shadow_blur' => 0,
            'btn_shadow_spread' => 0,
            'btn_shadow_color' => '#000000',
            'btn_shadow_opacity' => 1,
            'btn_inset_x' => 0,
            'btn_inset_y' => 0,
            'btn_inset_blur' => 0,
            'btn_inset_spread' => 0,
            'btn_inset_color' => '#000000',
            'btn_inset_opacity' => 0,

            'btn_letter_spacing' => 1,
            'btn_uppercase' => true,
        ],

        'glassmorphism' => [
            'btn_radius' => 12,
            'btn_border_width' => 1,

            'btn_shadow_x' => 0,
            'btn_shadow_y' => 4,
            'btn_shadow_blur' => 16,
            'btn_shadow_spread' => 0,
            'btn_shadow_color' => '#000000',
            'btn_shadow_opacity' => 0.1,
            'btn_inset_x' => 0,
            'btn_inset_y' => 1,
            'btn_inset_blur' => 2,
            'btn_inset_spread' => 0,
            'btn_inset_color' => '#ffffff',
            'btn_inset_opacity' => 0.15,

            'btn_letter_spacing' => 0,
            'btn_uppercase' => false,
        ],
    ];

    /**
     * Create the button settings group with flat defaults.
     */
    public static function make(): array
    {
        return static::style('flat');
    }

    /**
     * Create the button settings group with a specific style's defaults.
     */
    public static function style(string $style): array
    {
        $defaults = self::STYLES[$style] ?? self::STYLES['flat'];

        return [
            'name' => 'basic-blocks::settings.button.name',
            'settings' => self::buildSettings($defaults),
        ];
    }

    /**
     * Shortcut: flat style defaults.
     */
    public static function flat(): array
    {
        return static::style('flat');
    }

    /**
     * Shortcut: neumorphism style defaults.
     */
    public static function neumorphism(): array
    {
        return static::style('neumorphism');
    }

    /**
     * Shortcut: brutalism style defaults.
     */
    public static function brutalism(): array
    {
        return static::style('brutalism');
    }

    /**
     * Shortcut: glassmorphism style defaults.
     */
    public static function glassmorphism(): array
    {
        return static::style('glassmorphism');
    }

    /**
     * Get all available styles with their values.
     */
    public static function styles(): array
    {
        return self::STYLES;
    }

    /**
     * Resolve theme settings into CSS variable name => value pairs.
     */
    public static function resolveCssVars(object $settings): array
    {
        return [
            '--btn-radius' => ($settings->btn_radius ?? 6).'px',
            '--btn-border-width' => ($settings->btn_border_width ?? 0).'px',
            '--btn-letter-spacing' => ($settings->btn_letter_spacing ?? 0).'px',
            '--btn-text-transform' => ($settings->btn_uppercase ?? false) ? 'uppercase' : 'none',
            '--btn-shadow-x' => ($settings->btn_shadow_x ?? 0).'px',
            '--btn-shadow-y' => ($settings->btn_shadow_y ?? 0).'px',
            '--btn-shadow-blur' => ($settings->btn_shadow_blur ?? 0).'px',
            '--btn-shadow-spread' => ($settings->btn_shadow_spread ?? 0).'px',
            '--btn-shadow-color' => $settings->btn_shadow_color ?? '#000000',
            '--btn-shadow-opacity' => $settings->btn_shadow_opacity ?? '0',
            '--btn-inset-x' => ($settings->btn_inset_x ?? 0).'px',
            '--btn-inset-y' => ($settings->btn_inset_y ?? 0).'px',
            '--btn-inset-blur' => ($settings->btn_inset_blur ?? 0).'px',
            '--btn-inset-spread' => ($settings->btn_inset_spread ?? 0).'px',
            '--btn-inset-color' => $settings->btn_inset_color ?? '#000000',
            '--btn-inset-opacity' => $settings->btn_inset_opacity ?? '0',
        ];
    }

    /**
     * Build the settings array with the given default values.
     */
    private static function buildSettings(array $defaults): array
    {
        return [
            // Geometry & Borders
            Header::make('basic-blocks::settings.button.geometry_header'),

            Range::make('btn_radius', 'basic-blocks::settings.button.radius_label')
                ->min(0)->max(100)->step(1)->unit('px')
                ->default($defaults['btn_radius']),

            Range::make('btn_border_width', 'basic-blocks::settings.button.border_width_label')
                ->min(0)->max(10)->step(0.5)->unit('px')
                ->default($defaults['btn_border_width']),

            // Elevation (Outer Shadow)
            Header::make('basic-blocks::settings.button.outer_shadow_header'),

            Range::make('btn_shadow_x', 'basic-blocks::settings.button.shadow_x_label')
                ->min(-50)->max(50)->step(1)->unit('px')
                ->default($defaults['btn_shadow_x']),

            Range::make('btn_shadow_y', 'basic-blocks::settings.button.shadow_y_label')
                ->min(-50)->max(50)->step(1)->unit('px')
                ->default($defaults['btn_shadow_y']),

            Range::make('btn_shadow_blur', 'basic-blocks::settings.button.shadow_blur_label')
                ->min(0)->max(100)->step(1)->unit('px')
                ->default($defaults['btn_shadow_blur']),

            Range::make('btn_shadow_spread', 'basic-blocks::settings.button.shadow_spread_label')
                ->min(-20)->max(50)->step(1)->unit('px')
                ->default($defaults['btn_shadow_spread']),

            Color::make('btn_shadow_color', 'basic-blocks::settings.button.shadow_color_label')
                ->default($defaults['btn_shadow_color']),

            Range::make('btn_shadow_opacity', 'basic-blocks::settings.button.shadow_opacity_label')
                ->min(0)->max(1)->step(0.01)
                ->default($defaults['btn_shadow_opacity']),

            // Cavity (Inner Shadow)
            Header::make('basic-blocks::settings.button.inner_shadow_header'),

            Range::make('btn_inset_x', 'basic-blocks::settings.button.inset_x_label')
                ->min(-50)->max(50)->step(1)->unit('px')
                ->default($defaults['btn_inset_x']),

            Range::make('btn_inset_y', 'basic-blocks::settings.button.inset_y_label')
                ->min(-50)->max(50)->step(1)->unit('px')
                ->default($defaults['btn_inset_y']),

            Range::make('btn_inset_blur', 'basic-blocks::settings.button.inset_blur_label')
                ->min(0)->max(100)->step(1)->unit('px')
                ->default($defaults['btn_inset_blur']),

            Range::make('btn_inset_spread', 'basic-blocks::settings.button.inset_spread_label')
                ->min(-20)->max(50)->step(1)->unit('px')
                ->default($defaults['btn_inset_spread']),

            Color::make('btn_inset_color', 'basic-blocks::settings.button.inset_color_label')
                ->default($defaults['btn_inset_color']),

            Range::make('btn_inset_opacity', 'basic-blocks::settings.button.inset_opacity_label')
                ->min(0)->max(1)->step(0.01)
                ->default($defaults['btn_inset_opacity']),

            // Typography
            Header::make('basic-blocks::settings.button.typography_header'),

            Range::make('btn_letter_spacing', 'basic-blocks::settings.button.letter_spacing_label')
                ->min(-5)->max(20)->step(0.1)->unit('px')
                ->default($defaults['btn_letter_spacing']),

            Checkbox::make('btn_uppercase', 'basic-blocks::settings.button.uppercase_label')
                ->asSwitch()
                ->default($defaults['btn_uppercase']),
        ];
    }
}
