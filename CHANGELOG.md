# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/jeffersongoncalves/filament-barcode-field/compare/3.1.0...3.x)

## [3.1.0](https://github.com/jeffersongoncalves/filament-barcode-field/compare/3.0.0...3.1.0) - 2026-09-23

### What's new

- **Translations:** 17 new locales (ar, az, de, es, fa, fr, hi, it, ja, nl, pl, pt, ru, tr, uk, uz, zh_CN). (#31)

Thanks to @Elvin-Qulizade (Elvin Qulizada) for the i18n initiative behind these translations — first contributed in jeffersongoncalves/filament-scanner-guard#2 and now rolled out across the Filament plugins. He is credited as co-author.

### What's Changed

* build(deps): bump actions/checkout from 6 to 7 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/1
* build(deps-dev): bump the actions-deps group with 2 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/2
* build(deps-dev): bump postcss from 8.5.21 to 8.5.22 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/3
* build(deps-dev): bump postcss-nesting from 14.0.0 to 14.0.1 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/4
* build(deps-dev): bump postcss from 8.5.22 to 8.5.23 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/5
* build(deps-dev): bump postcss from 8.5.23 to 8.5.24 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/6
* build(deps-dev): bump postcss from 8.5.24 to 8.5.25 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/7
* build(deps-dev): bump cssnano from 8.0.2 to 8.0.3 in the npm-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/8
* build(deps-dev): bump the npm-deps group with 2 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/9
* build(deps-dev): bump cssnano from 8.0.5 to 8.0.6 in the npm-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/10
* build(deps-dev): bump cssnano from 8.0.6 to 8.0.9 in the npm-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/11
* docs: add Buy Me a Coffee sponsor link by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/12
* chore: add GitHub Sponsors to FUNDING.yml by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/15
* build(deps-dev): bump cssnano from 8.0.9 to 8.0.10 in the npm-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/18
* build(deps-dev): bump the npm-deps group with 2 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/19
* ci: standardize update-changelog workflow (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/22
* ci: standardize dependabot config by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/23
* build(deps-dev): bump the npm-deps group with 2 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-barcode-field/pull/26
* feat(i18n): add translations (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-barcode-field/pull/31

**Full Changelog**: https://github.com/jeffersongoncalves/filament-barcode-field/compare/3.0.0...3.1.0

## [3.0.0](https://github.com/jeffersongoncalves/filament-barcode-field/releases/tag/3.0.0) - YYYY-MM-DD

### Added

- Initial release of `BarcodeInput` Filament form component for Filament v5
- Camera-based barcode scanning via html5-qrcode, restricted to EAN-13, EAN-8, UPC-A, UPC-E, Code 128, Code 39, ITF and Codabar
- Configurable scanner dimensions, modal width and supported symbologies
- English and Brazilian Portuguese translations
