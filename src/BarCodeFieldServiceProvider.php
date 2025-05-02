<?php

namespace JeffersonGoncalves\Filament\BarCodeField;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BarCodeFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-barcode-field')
            ->hasViews();
    }
}
