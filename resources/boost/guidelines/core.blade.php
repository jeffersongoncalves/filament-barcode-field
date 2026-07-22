## Filament Barcode Field

A Filament form component that provides barcode scanning and input functionality using the html5-qrcode library. Extends TextInput with a camera-based barcode reader modal supporting EAN-13, EAN-8, UPC-A, UPC-E, Code 128, Code 39, ITF and Codabar.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-barcode-field:"^2.0"
</code-snippet>
@endverbatim

### Publish Config (Optional)

@verbatim
<code-snippet name="Publish configuration" lang="bash">
php artisan vendor:publish --tag="filament-barcode-field-config"
</code-snippet>
@endverbatim

### Usage

@verbatim
<code-snippet name="Use BarcodeInput in a form" lang="php">
use JeffersonGoncalves\Filament\BarcodeField\Forms\Components\BarcodeInput;

BarcodeInput::make('barcode')
    ->required(),
</code-snippet>
@endverbatim

### Features
- Barcode scanning via device camera using html5-qrcode library
- Supports EAN-13, EAN-8, UPC-A, UPC-E, Code 128, Code 39, ITF and Codabar symbologies
- Extends Filament's TextInput component
- Configurable scanner dimensions (fps, width, height)
- Configurable modal width
- Custom icon support via `->icon()` method
- Multi-language support
- Automatic placeholder text based on field label

### Configuration Options
- `asset_js` - URL for the html5-qrcode JavaScript library
- `formats` - Barcode symbologies to scan for (`Html5QrcodeSupportedFormats` names)
- `modal.width` - Width of the scanner modal (uses Filament Width enum)
- `reader.width` / `reader.height` - Barcode reader dimensions
- `scanner.fps` - Scanner frames per second
- `scanner.width` / `scanner.height` - Scanner viewport dimensions

### Best Practices
- This is a standalone form component, not a panel plugin (no plugin registration needed)
- Use `->required()` when the barcode value is mandatory
- Customize scanner dimensions in config for optimal camera performance on 1D barcodes (wider than tall)
- Restrict `formats` to only the symbologies you need for faster, more reliable scanning
- Publish translations to customize field labels and placeholders
