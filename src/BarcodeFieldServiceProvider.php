<?php

namespace JeffersonGoncalves\Filament\BarcodeField;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

    protected function getAssetPackageName(): ?string
    {
        return 'jeffersongoncalves/filament-barcode-field';
    }

    protected function getAssets(): array
    {
        return [
            Css::make('filament-barcode-field-styles', __DIR__.'/../resources/dist/filament-barcode-field.css'),
        ];
    }
}
