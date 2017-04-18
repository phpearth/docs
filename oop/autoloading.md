# Autoloading PHP Classes

When creating multiple classes you will usually create them in separate files for
readability and easier code maintenance. To use these classes in your code you
must require the class files:

```php
<?php

require __DIR__.'/../src/Auth.php';
require __DIR__.'/../src/Config.php';

$auth = new Auth();
$config = new Config();
// ...
```

The list of required files can soon become very long when dealing with a lot of
classes. PHP offers classes autoloading, for example, the `spl_autoload_register()`
function simplifies autoloading:

```php
<?php
// loader.php

spl_autoload_register(function ($class) {
    include __DIR__.'/src/'.$class.'.php';
});
```

## PSR-4 and Composer

How to autoload classes is a matter of preference and depends on the developer.
In case of open source ecosystem libraries, frameworks, and other people's code
this soon becomes an issue.

Therefore there has been an initiative from PHP-FIG to standardize the autoloading
with the [PSR-4 autoloading standard](http://www.php-fig.org/psr/psr-4/), which
became the de-facto standard for autoloading in PHP and specially with the rise
of Composer, the PHP package manager.

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
        "php": "^7.1",
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
public/index.php
composer.json
composer.lock
```

The `src` folder contains your application classes, the `vendor` folder is created
automatically by Composer when installing 3rd party packages or a framework. The
`composer.lock` file is automatically handled by Composer and contains specific
versions of your installed 3rd party packages. The `tests` folder can contain the
unit and functional tests.

The `public/index.php` file also known as the front controller can be one of the
places where you could use the Composer's autoloader:

```php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use Acme\ExampleProject\App;

$app = new App();
$app->run();
```

## PSR-0

The predecessor of PSR-4 autoloading standard was the [PSR-0](http://www.php-fig.org/psr/psr-0/),
which is now deprecated and shouldn't be used anymore. Some libraries might still
use it and Composer offers that also. For creating new code, stick to PSR-4
autoloading standard and make your development life easier and more consistent.

## See Also

* [PHP Manual: Autoloading Classes](http://php.net/manual/en/language.oop5.autoload.php)
* [Composer: Autoloading](https://getcomposer.org/doc/01-basic-usage.md#autoloading)
