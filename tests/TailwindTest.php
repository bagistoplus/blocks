<?php

use BagistoPlus\BasicBlocks\Tailwind;
use BagistoPlus\Visual\Settings\Support\SpacingValue;
use Craftile\Core\Data\ResponsiveValue;

describe('toResponsiveValue', function () {
    it('returns the same ResponsiveValue if already an instance', function () {
        $rv = new ResponsiveValue(['_default' => 'test']);

        $result = Tailwind::toResponsiveValue($rv);

        expect($result)->toBe($rv);
    });

    it('wraps array with _default key into ResponsiveValue', function () {
        $value = ['_default' => 'base', 'tablet' => 'md'];

        $result = Tailwind::toResponsiveValue($value);

        expect($result)->toBeInstanceOf(ResponsiveValue::class);
        expect($result->all())->toBe(['_default' => 'base', 'tablet' => 'md']);
    });

    it('wraps array with breakpoint keys into ResponsiveValue', function () {
        $value = ['mobile' => 'base', 'tablet' => 'md'];

        $result = Tailwind::toResponsiveValue($value);

        expect($result)->toBeInstanceOf(ResponsiveValue::class);
        expect($result->all())->toBe(['mobile' => 'base', 'tablet' => 'md']);
    });

    it('wraps scalar value into ResponsiveValue with _default key', function () {
        $result = Tailwind::toResponsiveValue('test');

        expect($result)->toBeInstanceOf(ResponsiveValue::class);
        expect($result->all())->toBe(['_default' => 'test']);
    });

    it('wraps null value into ResponsiveValue', function () {
        $result = Tailwind::toResponsiveValue(null);

        expect($result)->toBeInstanceOf(ResponsiveValue::class);
        expect($result->all())->toBe(['_default' => null]);
    });
});

describe('responsive', function () {
    it('builds classes with callable callback', function () {
        $result = Tailwind::responsive('left', fn ($v) => "text-{$v}");

        expect($result)->toBe('text-left');
    });

    it('builds responsive classes for multiple breakpoints', function () {
        $value = ['_default' => 'left', 'tablet' => 'center', 'desktop' => 'right'];

        $result = Tailwind::responsive($value, fn ($v) => "text-{$v}");

        expect($result)->toBe('text-left tablet:text-center desktop:text-right');
    });

    it('passes breakpoint to callable callback', function () {
        $value = ['_default' => 'left', 'tablet' => 'center'];

        $result = Tailwind::responsive($value, fn ($v, $breakpoint) => "text-{$breakpoint}-{$v}");

        expect($result)->toBe('text-_default-left tablet:text-tablet-center');
    });

    it('includes breakpoints from extra responsive values', function () {
        $value = ['_default' => 'left', 'tablet' => 'center'];
        $extra = ['_default' => false, 'desktop' => true];

        $result = Tailwind::responsive(
            $value,
            fn ($v, $breakpoint) => "text-{$breakpoint}-{$v}",
            includeBreakpointsFrom: [$extra],
        );

        expect($result)->toBe('text-_default-left tablet:text-tablet-center desktop:text-desktop-left');
    });

    it('prefixes each responsive class when callback returns multiple classes', function () {
        $value = ['tablet' => 'inset'];

        $result = Tailwind::responsive($value, fn () => 'py-4 px-6');

        expect($result)->toBe('tablet:py-4 tablet:px-6');
    });

    it('skips null values', function () {
        $value = ['_default' => 'left', 'tablet' => null, 'desktop' => 'right'];

        $result = Tailwind::responsive($value, fn ($v) => "text-{$v}");

        expect($result)->toBe('text-left desktop:text-right');
    });

    it('uses array lookup when callback is an array', function () {
        $map = ['sm' => 'w-4', 'md' => 'w-8', 'lg' => 'w-12'];

        $result = Tailwind::responsive('md', $map);

        expect($result)->toBe('w-8');
    });

    it('falls back to string value when array key not found', function () {
        $map = ['sm' => 'w-4'];

        $result = Tailwind::responsive('unknown', $map);

        expect($result)->toBe('unknown');
    });

    it('converts value to string when callback is not callable or array', function () {
        $result = Tailwind::responsive(42, null);

        expect($result)->toBe('42');
    });
});

describe('buildSpacingClasses', function () {
    function spacingValue(array $value): SpacingValue
    {
        return new SpacingValue($value);
    }

    it('returns single class when all sides are equal', function () {
        $value = spacingValue(['top' => 4, 'right' => 4, 'bottom' => 4, 'left' => 4]);

        $result = Tailwind::buildSpacingClasses($value, 'p');

        expect($result)->toBe('p-4');
    });

    it('returns explicit zero class when all sides are zero', function () {
        $value = spacingValue(['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0]);

        $result = Tailwind::buildSpacingClasses($value, 'p');

        expect($result)->toBe('p-0');
    });

    it('returns x/y classes when opposite sides match', function () {
        $value = spacingValue(['top' => 2, 'right' => 4, 'bottom' => 2, 'left' => 4]);

        $result = Tailwind::buildSpacingClasses($value, 'p');

        expect($result)->toBe('py-2 px-4');
    });

    it('returns y and explicit zero x classes when x sides are zero', function () {
        $value = spacingValue(['top' => 2, 'right' => 0, 'bottom' => 2, 'left' => 0]);

        $result = Tailwind::buildSpacingClasses($value, 'm');

        expect($result)->toBe('my-2 mx-0');
    });

    it('returns x and explicit zero y classes when y sides are zero', function () {
        $value = spacingValue(['top' => 0, 'right' => 4, 'bottom' => 0, 'left' => 4]);

        $result = Tailwind::buildSpacingClasses($value, 'm');

        expect($result)->toBe('my-0 mx-4');
    });

    it('returns individual side classes when all sides differ', function () {
        $value = spacingValue(['top' => 1, 'right' => 2, 'bottom' => 3, 'left' => 4]);

        $result = Tailwind::buildSpacingClasses($value, 'p');

        expect($result)->toBe('pt-1 pe-2 pb-3 ps-4');
    });

    it('includes explicit zero values for individual sides', function () {
        $value = spacingValue(['top' => 1, 'right' => 0, 'bottom' => 3, 'left' => 0]);

        $result = Tailwind::buildSpacingClasses($value, 'm');

        expect($result)->toBe('mt-1 me-0 mb-3 ms-0');
    });

    it('handles missing properties with explicit zero defaults', function () {
        $value = spacingValue(['top' => 4]);

        $result = Tailwind::buildSpacingClasses($value, 'p');

        expect($result)->toBe('pt-4 pe-0 pb-0 ps-0');
    });

    it('works with margin prefix', function () {
        $value = spacingValue(['top' => 8, 'right' => 8, 'bottom' => 8, 'left' => 8]);

        $result = Tailwind::buildSpacingClasses($value, 'm');

        expect($result)->toBe('m-8');
    });
});

describe('buildResponsiveStyleFor', function () {
    it('builds classes and styles for single value', function () {
        $result = Tailwind::buildResponsiveStyleFor(50, 'w', 'width');

        expect($result['classes'])->toBe('w-(--width)');
        expect($result['styles'])->toBe('--width: 50%');
    });

    it('builds responsive classes and styles', function () {
        $value = ['_default' => 100, 'tablet' => 50, 'desktop' => 33];

        $result = Tailwind::buildResponsiveStyleFor($value, 'w', 'width');

        expect($result['classes'])->toBe('w-(--width) tablet:w-(--width-tablet) desktop:w-(--width-desktop)');
        expect($result['styles'])->toBe('--width: 100%; --width-tablet: 50%; --width-desktop: 33%');
    });

    it('uses custom unit', function () {
        $result = Tailwind::buildResponsiveStyleFor(100, 'h', 'height', 'px');

        expect($result['classes'])->toBe('h-(--height)');
        expect($result['styles'])->toBe('--height: 100px');
    });

    it('skips null values', function () {
        $value = ['_default' => 100, 'tablet' => null, 'desktop' => 50];

        $result = Tailwind::buildResponsiveStyleFor($value, 'w', 'width');

        expect($result['classes'])->toBe('w-(--width) desktop:w-(--width-desktop)');
        expect($result['styles'])->toBe('--width: 100%; --width-desktop: 50%');
    });

    it('includes zero and negative values', function () {
        $value = ['_default' => 0, 'tablet' => -10, 'desktop' => 50];

        $result = Tailwind::buildResponsiveStyleFor($value, 'w', 'width');

        expect($result['classes'])->toBe('w-(--width) tablet:w-(--width-tablet) desktop:w-(--width-desktop)');
        expect($result['styles'])->toBe('--width: 0%; --width-tablet: -10%; --width-desktop: 50%');
    });

    it('returns zero-valued result when zero is the only valid input', function () {
        $value = ['_default' => 0, 'tablet' => null];

        $result = Tailwind::buildResponsiveStyleFor($value, 'w', 'width');

        expect($result['classes'])->toBe('w-(--width)');
        expect($result['styles'])->toBe('--width: 0%');
    });
});
