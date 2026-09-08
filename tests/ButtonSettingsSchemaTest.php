<?php

use BagistoPlus\BasicBlocks\Settings\ButtonSettingsSchema;
use BagistoPlus\Visual\Settings\Support\RadiusValue;

describe('btn_radius setting', function () {
    it('uses the radius setting type', function () {
        $settings = collect(ButtonSettingsSchema::flat()['settings'])
            ->map(fn ($setting) => $setting->toArray())
            ->keyBy('id');

        expect($settings['btn_radius']['type'])->toBe('radius');
        expect($settings['btn_radius']['default'])->toBe('md');
    });

    it('has a valid scale key as default for every style', function () {
        foreach (ButtonSettingsSchema::styles() as $style => $values) {
            expect(RadiusValue::has($values['btn_radius']))
                ->toBeTrue("Style '{$style}' has an invalid btn_radius default");
        }
    });
});

describe('resolveCssVars', function () {
    it('emits the CSS length of the radius value', function () {
        $vars = ButtonSettingsSchema::resolveCssVars((object) [
            'btn_radius' => new RadiusValue('full'),
        ]);

        expect($vars['--btn-radius'])->toBe('calc(infinity * 1px)');
    });

    it('falls back to md when the radius is missing', function () {
        $vars = ButtonSettingsSchema::resolveCssVars((object) []);

        expect($vars['--btn-radius'])->toBe('0.375rem');
    });
});
