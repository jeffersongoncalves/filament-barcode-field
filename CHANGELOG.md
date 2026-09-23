# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/jeffersongoncalves/filament-barcode-field/compare/1.1.0...1.x)

## [1.1.0](https://github.com/jeffersongoncalves/filament-barcode-field/compare/1.0.0...1.1.0) - 2026-09-23

### What's new

- **Translations:** 17 new locales (ar, az, de, es, fa, fr, hi, it, ja, nl, pl, pt, ru, tr, uk, uz, zh_CN). (#29)

Thanks to @Elvin-Qulizade (Elvin Qulizada) for the i18n initiative behind these translations — first contributed in jeffersongoncalves/filament-scanner-guard#2 and now rolled out across the Filament plugins. He is credited as co-author.

### What's Changed

* docs: add Buy Me a Coffee sponsor link by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/13
* chore: add Buy Me a Coffee to FUNDING.yml by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/16
* ci: standardize update-changelog workflow (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/20
* build(deps-dev): bump the npm-deps group with 4 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/27
* build(deps): bump actions/checkout from 6.1.0 to 7.0.1 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/24
* feat(i18n): add translations (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/29

**Full Changelog**: https://github.com/jeffersongoncalves/filament-barcode-field/compare/1.0.0...1.1.0

## [1.0.0](https://github.com/jeffersongoncalves/filament-barcode-field/releases/tag/1.0.0) - YYYY-MM-DD

### Added

- Initial release of `BarcodeInput` Filament form component for Filament v3
- Camera-based barcode scanning via html5-qrcode, restricted to EAN-13, EAN-8, UPC-A, UPC-E, Code 128, Code 39, ITF and Codabar
- Configurable scanner dimensions, modal width and supported symbologies
- English and Brazilian Portuguese translations
