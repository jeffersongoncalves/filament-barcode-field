@php
    use function Filament\Support\prepare_inherited_attributes;

    $fieldWrapperView = $getFieldWrapperView();
    $datalistOptions = $getDatalistOptions();
    $extraAlpineAttributes = $getExtraAlpineAttributes();
    $extraAttributeBag = $getExtraAttributeBag();
    $hasInlineLabel = $hasInlineLabel();
    $id = $getId();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $statePath = $getStatePath();
    $placeholder = $getPlaceholder();

    $inputAttributes = $getExtraInputAttributeBag()
            ->merge($extraAlpineAttributes, escape: false)
            ->merge([
                'autofocus' => $isAutofocused(),
                'disabled' => $isDisabled,
                'id' => $id,
                'inputmode' => $getInputMode(),
                'list' => $datalistOptions ? $id . '-list' : null,
                'max' => (! $isConcealed) ? $getMaxValue() : null,
                'maxlength' => (! $isConcealed) ? $getMaxLength() : null,
                'min' => (! $isConcealed) ? $getMinValue() : null,
                'minlength' => (! $isConcealed) ? $getMinLength() : null,
                'placeholder' => filled($placeholder) ? e($placeholder) : null,
                'readonly' => $isReadOnly(),
                'required' => $isRequired() && (! $isConcealed),
                'type' => "text",
                $applyStateBindingModifiers('wire:model') => $statePath,
            ], escape: false)
            ->class([
                'barcode-field-input',
            ]);
@endphp
<x-dynamic-component
    :component="$fieldWrapperView"
    :field="$field"
    :has-inline-label="$hasInlineLabel"
    class="fi-fo-text-input-wrp"
>
    <div xmlns:x-filament="http://www.w3.org/1999/html"
         x-load-js="['{{ config('filament-barcode-field.asset_js') }}']"
         x-data="{
        html5Qrcode: null,
        scanning: false,
        async stopScanning() {
            if (!this.html5Qrcode) return;
            try {
                if (this.scanning) {
                    await this.html5Qrcode.stop();
                    this.scanning = false;
                }
                this.html5Qrcode.clear();
            } catch (e) {}
            this.html5Qrcode = null;
        },
        openScannerModal() {
            $dispatch('open-modal', { id: 'barcode-scanner-modal-{{ $getName() }}' });
            this.$nextTick(() => this.startCamera());
        },
        async closeScannerModal() {
            await this.stopScanning();
            $dispatch('close-modal', { id: 'barcode-scanner-modal-{{ $getName() }}' });
        },
        onScanSuccess(decodedText, decodedResult) {
            $wire.set('{{ $getStatePath() }}', decodedText);
            this.closeScannerModal();
        },
        startCamera() {
            const readerId = 'reader-{{ $getName() }}';
            const readerEl = document.getElementById(readerId);
            if (readerEl) readerEl.innerHTML = '';
            this.html5Qrcode = new Html5Qrcode(readerId, {
                formatsToSupport: [{{ collect(config('filament-barcode-field.formats'))->map(fn ($format) => "Html5QrcodeSupportedFormats.{$format}")->implode(', ') }}],
            });
            this.html5Qrcode.start(
                { facingMode: 'environment' },
                { fps: {{ config('filament-barcode-field.scanner.fps') }}, qrbox: { width: {{ config('filament-barcode-field.scanner.width') }}, height: {{ config('filament-barcode-field.scanner.height') }} }, experimentalFeatures: { useBarCodeDetectorIfSupported: true } },
                this.onScanSuccess.bind(this)
            ).then(() => {
                this.scanning = true;
            }).catch((err) => {
                console.error('Barcode Scanner start error:', err);
            });
        }
     }"
    >
        <div class="barcode-container">
            <x-filament::input.wrapper :disabled="$isDisabled" :valid="! $errors->has($statePath)"
                                       :attributes="prepare_inherited_attributes($extraAttributeBag)->class(['fi-fo-text-input'])">
                <input {{ $inputAttributes->class(['fi-input']) }} />
                <x-slot name="suffix">
                    <!-- Trigger Button for Filament Modal -->
                    <button type="button" @click="openScannerModal()" class="btn-scan-barcode" aria-label="{{ __('filament-barcode-field::barcode-field.aria_label') }}">
                        @if($getExtraAttributes()['icon'] ?? null)
                            <span class="icon-wrapper">
                                <x-dynamic-component :component="$getExtraAttributes()['icon']" class="icon-dynamic"/>
                            </span>
                        @else
                            <svg class="icon-dynamic icon-wrapper" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 5v14"></path>
                                <path d="M7 5v14"></path>
                                <path d="M10 5v14"></path>
                                <path d="M13 5v14"></path>
                                <path d="M16 5v14"></path>
                                <path d="M19 5v14"></path>
                                <path d="M21 5v14"></path>
                            </svg>
                        @endif
                    </button>
                </x-slot>
            </x-filament::input.wrapper>
        </div>
        <!-- Filament Modal for Barcode Scanner -->
        <x-filament::modal id="barcode-scanner-modal-{{ $getName() }}"
                           width="{{ config('filament-barcode-field.modal.width') }}" :close-by-clicking-away="false">
            <x-slot name="header">
                <h2 class="barcode-scanner-modal-title">
                    {{ __('filament-barcode-field::barcode-field.title', ['label' => $getLabel() ?? 'Barcode']) }}
                </h2>
            </x-slot>
            <div class="barcode-scanner-modal-container">
                <div id="scanner-container">
                    <div id="reader-{{ $getName() }}" width="{{ config('filament-barcode-field.reader.width') }}"
                         height="{{ config('filament-barcode-field.reader.height') }}"></div>
                </div>
            </div>
            <x-slot name="footer">
                <x-filament::button @click="closeScannerModal()" color="danger">
                    {{ __('filament-barcode-field::barcode-field.close') }}
                </x-filament::button>
            </x-slot>
        </x-filament::modal>
    </div>
</x-dynamic-component>
