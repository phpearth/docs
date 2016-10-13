---
title: "Autoloading"
updated: "October 13, 2016"
permalink: "/articles/oop/autoloading/"
---

When writing classes each class is most of the time created in a separate file.
To use these classes in your code you must first require the file and then use
the `use` keyword:

```php
<?php

use Vendor/Package/Base.php

class Example extends Base
{

}
```

This soon becomes tedious with a lot of classes. PHP offers some autoloading
functions.

## PSR-4 and Composer

There has been an initiative from PHP-FIG to standardize the autoloading with the
[PSR-4 autoloading standard](http://www.php-fig.org/psr/psr-4/), which became
the de-facto standard for autoloading in PHP and specially with the rise of Composer,
the PHP package manager.

Autoloading classes with Composer is very simple and advanced enough to meet any
requirement you'll meet in your applications.

To use the Composer, create a `composer.json` file in the root of your project
with `composer init` command which generates the initial composer.json file you
can use and extend further on. Our example will use the following:

```javascript
{
    "name": "vendor/example-project",
    "description": "Example project",
    "type": "project",
    "require": {
        "php": "^7.0",
        "monolog/monolog": "^1.21"
    },
    "require-dev": {
        "phpunit/phpunit": "^5.6"
    },
    "autoload": {
        "psr-4": {"Vendor\\ExampleProject\\": "src/"}
    },
    "autoload-dev": {
        "psr-4": { "Vendor\\ExampleProject\\Tests\\": "tests/" }
    }
}
```

The most common file structure for PHP can be the following:

```
src/
tests/
vendor/
composer.json
composer.lock
```

## PSR-0

The predecessor of PSR-4 standard was the PSR-0, which has been deprecated.

## See Also

* [PHP Manual: Autoloading Classes](http://php.net/manual/en/language.oop5.autoload.php)
