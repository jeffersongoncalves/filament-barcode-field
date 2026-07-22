<?php

namespace JeffersonGoncalves\Filament\BarcodeField\Forms\Components;

use Filament\Forms\Components\TextInput;

class BarcodeInput extends TextInput
{
    protected string $view = 'filament-barcode-field::components.barcode-input';

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeholder(fn (BarcodeInput $component): string => __('filament-barcode-field::barcode-field.placeholder', [
            'label' => strtolower($component->getLabel()),
        ]));
    }

    public function icon(string $icon): static
    {
        return $this->extraAttributes(['icon' => $icon]);
    }
}
