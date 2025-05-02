<div class="filament-hidden">

![Filament BarCode Field](https://raw.githubusercontent.com/jeffersongoncalves/filament-barcode-field/master/art/jeffersongoncalves-filament-barcode-field.png)

</div>

# Filament BarCode Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-barcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-barcode-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-barcode-field/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-barcode-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-barcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-barcode-field)

A Laravel Filament package that provides Barcode field functionality for your web applications. This package extends Filament v3 with a simple Barcode input component.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-barcode-field
```

## Usage

Once installed, you can use the BarCodeInput component in your Filament forms:

```php
 use JeffersonGoncalves\Filament\BarCodeField\Forms\Components\BarCodeInput;

// In your form definition
BarCodeInput::make('barcode')
    ->required(),
```

## Testing

```bash
composer test
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
