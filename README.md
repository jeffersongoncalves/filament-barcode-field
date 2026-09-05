<div class="filament-hidden">

![Filament Barcode Field](https://raw.githubusercontent.com/jeffersongoncalves/filament-barcode-field/3.x/art/jeffersongoncalves-filament-barcode-field.png)

</div>

# Filament Barcode Field

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-barcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-barcode-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-barcode-field/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-barcode-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-barcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-barcode-field)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-barcode-field.svg?style=flat-square)](LICENSE.md)

A Laravel Filament package that provides Barcode field functionality for your web applications. This package extends Filament v5 with a simple barcode input component supporting EAN-13, EAN-8, UPC-A, UPC-E, Code 128, Code 39, ITF and Codabar.

## Compatibility

| Package Version                                                              | Filament Version |
|-------------------------------------------------------------------------------|------------------|
| [1.x](https://github.com/jeffersongoncalves/filament-barcode-field/tree/1.x) | 3.x              |
| [2.x](https://github.com/jeffersongoncalves/filament-barcode-field/tree/2.x) | 4.x              |
| [3.x](https://github.com/jeffersongoncalves/filament-barcode-field/tree/3.x) | 5.x              |

## Requirements

- PHP 8.2 or higher
- Filament 5.0

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-barcode-field:^3.0
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-barcode-field-config"
```

This is the contents of the published config file:

```php
use Filament\Support\Enums\Width;

return [
    'asset_js' => 'https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js',
    'formats' => [
        'EAN_13',
        'EAN_8',
        'UPC_A',
        'UPC_E',
        'CODE_128',
        'CODE_39',
        'ITF',
        'CODABAR',
    ],
    'modal' => [
        'width' => Width::Large,
    ],
    'reader' => [
        'width' => '600px',
        'height' => '600px',
    ],
    'scanner' => [
        'fps' => 10,
        'width' => 300,
        'height' => 150,
    ],
];
```

`formats` controls which barcode symbologies the scanner looks for (mapped to the `Html5QrcodeSupportedFormats` enum from the html5-qrcode library). Restrict it to the symbologies you actually need for faster, more reliable scans.

## Translations

This package supports multiple languages. The following languages are currently available:

- English (`en`)
- Portuguese (Brazil) (`pt_BR`)

If you want to customize the translations, you can publish the language files:

```bash
php artisan vendor:publish --tag=filament-barcode-field-translations
```

## Usage

Once installed, you can use the BarcodeInput component in your Filament forms:

```php
use JeffersonGoncalves\Filament\BarcodeField\Forms\Components\BarcodeInput;

// In your form definition
BarcodeInput::make('barcode')
    ->required(),
```

## Development

You can run code analysis and formatting using the following commands:

```bash
# Run static analysis
composer analyse

# Format code
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
