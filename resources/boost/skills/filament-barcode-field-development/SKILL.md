---
name: filament-barcode-field-development
description: Build and work with the Filament Barcode Field component, including barcode scanning, form integration, and configuration.
---

# Filament Barcode Field Development

## When to use this skill

Use this skill when:
- Adding barcode scanning functionality to Filament forms
- Configuring the barcode scanner modal, dimensions, FPS, or supported symbologies
- Customizing BarcodeInput field behavior (icon, placeholder, validation)
- Troubleshooting camera-based barcode reading issues
- Publishing or modifying translations for the barcode field

## Architecture

This package is a standalone Filament form component (not a panel plugin). It uses:
- `BarcodeFieldServiceProvider` - Registers config, translations, views, and CSS assets
- `BarcodeInput` - The form component class extending `TextInput`
- html5-qrcode JavaScript library (loaded via CDN) for camera-based barcode scanning, restricted to 1D barcode formats via `formatsToSupport`

### Namespace

```
JeffersonGoncalves\Filament\BarcodeField
```

### Key Classes

| Class | Path | Purpose |
|-------|------|---------|
| `BarcodeFieldServiceProvider` | `src/BarcodeFieldServiceProvider.php` | Service provider, registers assets |
| `BarcodeInput` | `src/Forms/Components/BarcodeInput.php` | Form component for barcode input |

## Installation

```bash
composer require jeffersongoncalves/filament-barcode-field:"^3.0"
```

### Publish Config

```bash
php artisan vendor:publish --tag="filament-barcode-field-config"
```

### Publish Translations

```bash
php artisan vendor:publish --tag=filament-barcode-field-translations
```

## Configuration

### Default Config (`config/filament-barcode-field.php`)

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

The `formats` array maps directly to the `Html5QrcodeSupportedFormats` enum exposed by the html5-qrcode library. Restrict it to the symbologies you actually need — scanning fewer formats is faster and more reliable.

## Usage

### Basic Barcode Input

```php
use JeffersonGoncalves\Filament\BarcodeField\Forms\Components\BarcodeInput;

BarcodeInput::make('barcode')
    ->required(),
```

### With Custom Icon

```php
BarcodeInput::make('barcode')
    ->icon('heroicon-o-qr-code')
    ->required(),
```

### In a Filament Resource Form

```php
use JeffersonGoncalves\Filament\BarcodeField\Forms\Components\BarcodeInput;

public static function form(Schema $schema): Schema
{
    return $schema
        ->components([
            BarcodeInput::make('barcode')
                ->label('Product Barcode')
                ->required(),
        ]);
}
```

### Restricting Supported Symbologies

Publish the config and edit `formats` to limit scanning to a subset, e.g. only EAN codes for retail products:

```php
'formats' => ['EAN_13', 'EAN_8'],
```

## Component Details

### BarcodeInput Class

`BarcodeInput` extends `Filament\Forms\Components\TextInput` and adds:

```php
namespace JeffersonGoncalves\Filament\BarcodeField\Forms\Components;

use Filament\Forms\Components\TextInput;

class BarcodeInput extends TextInput
{
    protected string $view = 'filament-barcode-field::components.barcode-input';

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeholder(fn (BarcodeInput $component): string =>
            __('filament-barcode-field::barcode-field.fields.placeholder', [
                'label' => strtolower($component->getLabel())
            ])
        );
    }

    public function icon(string $icon): static
    {
        return $this->extraAttributes(['icon' => $icon]);
    }
}
```

Key points:
- Uses a custom Blade view for the barcode scanner modal
- Automatically sets a translated placeholder based on the field label
- The `icon()` method passes the icon name via extra attributes
- All standard TextInput methods are available (required, maxLength, etc.)

### Service Provider

The `BarcodeFieldServiceProvider` registers:
- Config file (`filament-barcode-field`)
- Translations
- Views
- CSS assets via `FilamentAsset::register()`

```php
class BarcodeFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-barcode-field')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }
}
```

## Version Compatibility

| Package Version | Filament Version |
|----------------|------------------|
| 1.x | 3.x |
| 2.x | 4.x |
| 3.x | 5.x |

## Troubleshooting

### Scanner Not Opening
**Cause**: The html5-qrcode JavaScript library may not be loaded.
**Solution**: Check that the `asset_js` config value points to a valid CDN URL. Ensure no Content Security Policy blocks external scripts.

### Camera Permission Denied
**Cause**: Browser or device not granting camera access.
**Solution**: Ensure the site is served over HTTPS (required for camera access). Check browser permissions for the site.

### Barcode Not Detected
**Cause**: The barcode's symbology is not included in `formats`, or the scanner box does not fit the barcode's aspect ratio.
**Solution**: Publish the config, add the missing symbology to `formats`, and widen `scanner.width` relative to `scanner.height` since 1D barcodes are wider than tall.

### Placeholder Not Showing Correctly
**Cause**: Translation files not published or label not set.
**Solution**: Ensure the field has a `->label()` set, or publish translations with `--tag=filament-barcode-field-translations`.
