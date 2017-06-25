# Autoloading PHP classes

When creating multiple classes, you will usually create them as separate files
for readability and for easier code maintainability. To use these classes in
your code you must require the class files:

```php
<?php

require __DIR__.'/../src/Auth.php';
require __DIR__.'/../src/Config.php';

$auth = new Auth();
$config = new Config();
// ...
```

The list of required files can soon become very long when dealing with large
numbers of classes. To help deal with this, PHP offers class autoloading. For
example, the `spl_autoload_register()` function simplifies autoloading:

```php
<?php
// loader.php

/**
 * The callback takes 1 parameter, the class name to be loaded.
 * Callback should return nothing, and if it cannot find the class name requested,
 * the next callback in queue (if there's any) will be called.
 */
spl_autoload_register(function ($class) {
    // Map class name to your file system, this step is up to you how to make file path.
    $path = __DIR__ . '/src/' . $class . '.php';
    // You should check wheter the file exists before loading
    // because it's better to make callback not to raise any errors/exceptions
    if (file_exists($path)) {
        require $path;
    }
});
```

## PSR-4 and Composer

How to autoload classes is a matter of preference and depends on the developer.
In the case of open source ecosystem libraries, frameworks, and code from other
people, this soon becomes an issue.

Therefore there has been an initiative from PHP-FIG to standardize autoloading
with the [PSR-4 autoloading standard](http://www.php-fig.org/psr/psr-4/), which
became the de-facto standard for autoloading in PHP, especially with the rise
of Composer, the PHP package manager.

Autoloading classes with Composer is very simple and advanced enough to meet
any requirement you'll meet in your applications.

To use Composer, create a `composer.json` file in the root of your project with
the `composer init` command, which generates an initial `composer.json` file
that you can use and extend further on. As an example:

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

The most common file structure for PHP projects is as follows:

```
src/
tests/
vendor/
public/index.php
composer.json
composer.lock
```

The `src` folder contains your application classes. The `vendor` folder is
created automatically by Composer when installing third-party packages or
frameworks. The `composer.lock` file is automatically handled by Composer and
contains specific versions of your installed third-party packages. The `tests`
folder can contain the unit and functional tests.

The `public/index.php` file, also known as the front controller, can be one of
the places where you could use Composer's autoloader:

```php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use Acme\ExampleProject\App;

$app = new App();
$app->run();
```

## PSR-0

The predecessor of the PSR-4 autoloading standard was
[PSR-0](http://www.php-fig.org/psr/psr-0/), which is now deprecated and
shouldn't be used anymore. Some libraries might still use it and Composer still
offers it, but for creating new code, stick to the PSR-4 autoloading standard
and make your development life easier and more consistent.

## See also

* [PHP Manual: Autoloading Classes](http://php.net/manual/en/language.oop5.autoload.php)
* [Composer: Autoloading](https://getcomposer.org/doc/01-basic-usage.md#autoloading)
