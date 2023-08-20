# This is my package filament-nestable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/recca0120/filament-nestable.svg?style=flat-square)](https://packagist.org/packages/recca0120/filament-nestable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/recca0120/filament-nestable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/recca0120/filament-nestable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/recca0120/filament-nestable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/recca0120/filament-nestable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/recca0120/filament-nestable.svg?style=flat-square)](https://packagist.org/packages/recca0120/filament-nestable)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require recca0120/filament-nestable
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-nestable-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-nestable-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-nestable-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentNestable = new Recca0120\FilamentNestable();
echo $filamentNestable->echoPhrase('Hello, filament-nestable!');
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

- [recca0120](https://github.com/recca0120)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
