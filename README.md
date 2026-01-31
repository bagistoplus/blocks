# Basic Blocks for Bagisto Visual Editor

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bagistoplus/basic-blocks.svg?style=flat-square)](https://packagist.org/packages/bagistoplus/basic-blocks)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bagistoplus/basic-blocks/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/bagistoplus/basic-blocks/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bagistoplus/basic-blocks/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/bagistoplus/basic-blocks/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bagistoplus/basic-blocks.svg?style=flat-square)](https://packagist.org/packages/bagistoplus/basic-blocks)

A collection of essential, ready-to-use blocks for the [Bagisto Visual Editor](https://visual.bagistoplus.com). This package provides foundational building blocks for professional Bagisto storefronts. It comes pre-installed with fresh Bagisto visual themes, enabling drag-and-drop page building without writing code.

Blocks are built with Laravel Blade templates, styled with Tailwind CSS, and enhanced with Alpine.js for interactivity. Some blocks also leverage Livewire for dynamic functionality.

## Installation

This package comes pre-installed with fresh Bagisto visual themes. If you need to install it manually, you can do so via composer:

```bash
composer require bagistoplus/basic-blocks
```

That's it! The package will automatically register itself via Laravel's package auto-discovery.

Optionally, you can publish the config file with:

```bash
php artisan vendor:publish --tag="basic-blocks-config"
```

## Usage

This package provides basic blocks for the Bagisto Visual Editor. Once installed, the blocks are automatically available in the visual editor interface at [visual.bagistoplus.com](https://visual.bagistoplus.com).

Simply use the drag-and-drop interface to add blocks to your pages and customize them through the visual editor.

## Technology Stack

The blocks in this package are built using:

- **Laravel Blade** - For templating and server-side rendering
- **Tailwind CSS** - For modern, utility-first styling
- **Alpine.js** - For lightweight JavaScript interactivity
- **Livewire** - For dynamic, reactive components (used in select blocks)

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Eldo Magan](https://github.com/bagistoplus)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
