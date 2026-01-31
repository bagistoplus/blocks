# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel package that provides basic blocks for the Bagisto Visual Editor (https://visual.bagistoplus.com). The blocks are built with Laravel Blade templates, styled with Tailwind CSS, and enhanced with Alpine.js for interactivity. Some blocks also leverage Livewire for dynamic functionality.

**Important**: This package comes pre-installed with fresh Bagisto visual themes and does NOT include migrations or artisan commands.

## Development Commands

### Testing
```bash
# Run all tests
composer test

# Run tests with coverage
composer test-coverage

# Run specific test file
vendor/bin/pest tests/ExampleTest.php

# Run tests with filter
vendor/bin/pest --filter="test_name"
```

### Code Quality
```bash
# Run PHPStan static analysis
composer analyse

# Fix PHP code style issues
composer format
# or
vendor/bin/pint
```

### Package Setup
```bash
# Discover package (runs automatically after composer install/update)
composer prepare
```

## Package Architecture

### Service Provider
- **BlocksServiceProvider** ([src/BlocksServiceProvider.php](src/BlocksServiceProvider.php)) - Main service provider, currently minimal with empty `register()` and `boot()` methods
- Auto-discovered by Laravel via package auto-discovery (configured in composer.json)

### Configuration
- Config file at [config/basic-blocks.php](config/basic-blocks.php) - Currently empty array, can be extended as needed
- Publishable via: `php artisan vendor:publish --tag="basic-blocks-config"`

### Views & Resources
- Blade templates stored in `resources/views/` directory
- Currently contains only a `.gitkeep` file

### Testing Setup
- Uses **Pest PHP** as the testing framework (not PHPUnit)
- Test base class: `BagistoPlus\BasicBlocks\Tests\TestCase` extends Orchestra Testbench
- All tests in `tests/` directory automatically use TestCase via Pest's `uses()` helper
- Architecture tests in [tests/ArchTest.php](tests/ArchTest.php) ensure no debugging functions (`dd`, `dump`, `ray`) are used in code
- TestCase configures factory namespace: `BagistoPlus\BasicBlocks\Database\Factories\`
- No database migrations are run in tests (migration loading is commented out in TestCase)

### Directory Structure
```
src/              - Package source code (service provider, blocks logic)
resources/views/  - Blade template files for blocks
config/           - Package configuration
tests/            - Pest PHP tests
```

## Key Package Details

- **Namespace**: `BagistoPlus\BasicBlocks`
- **Package name**: `bagistoplus/basic-blocks`
- **Minimum PHP**: 8.2
- **Laravel compatibility**: 11.x and 12.x
- **Testing framework**: Pest PHP (not PHPUnit - use `vendor/bin/pest` not `phpunit`)
- **Code style**: Laravel Pint
- **Static analysis**: PHPStan with deprecation rules

## Technology Stack for Blocks

When creating or modifying blocks:
- **Blade templates** for rendering
- **Tailwind CSS** for styling (utility-first approach)
- **Alpine.js** for lightweight JavaScript interactivity
- **Livewire** for dynamic, reactive components (when needed)

## CI/CD

GitHub Actions workflows handle:
- Running tests on PRs and pushes
- PHPStan analysis
- Automatic PHP code style fixes
- Changelog updates
- Dependabot auto-merge
