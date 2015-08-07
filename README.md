# G2AImporter for Laravel 5

[![Software License][ico-license]](LICENSE.md)

Simple G2A importer to import products to your own database.

## Install

Via Composer

``` bash
$ composer require zborowski/G2AImporter
```

or add this line in your composer.json and run composer update
``` bash
"zborowski/g2aimport": "0.8.0"
```



Register Service Provider
``` php
Zborowski\G2aimport\G2aimportServiceProvider::class,
```


``` bash
$ composer require zborowski/G2AImporter
```

## Usage

``` php
php artisan vendor:publish
php artisan migrate
php artisan g2a:import
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
