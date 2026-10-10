<?php

use Illuminate\Support\Facades\Blade;
use JeffersonGoncalves\Filament\BarcodeField\Forms\Components\BarcodeInput;

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    ['JeffersonGoncalves\\Filament\\BarcodeField\\BarcodeFieldServiceProvider'],
    ['JeffersonGoncalves\\Filament\\BarcodeField\\Forms\\Components\\BarcodeInput'],
]);

it('compiles every Blade view it ships', function (string $file) {
    expect(Blade::compileString((string) file_get_contents(__DIR__.'/../../'.$file)))->toBeString();
})->with([
    ['resources/views/components/barcode-input.blade.php'],
]);

it('builds BarcodeInput', function () {
    expect(BarcodeInput::make('subject')->getName())->toBe('subject');
});
