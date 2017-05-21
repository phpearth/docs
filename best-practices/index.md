---
description: "Some of the best PHP practices."
---

# PHP Best Practices

* [Introduction](#introduction)
* [PHP setup](#php-setup)
    * [PHP version](#php-version)
    * [PHP extensions](#php-extensions)
* [Coding style](#coding-style)
    * [Coding standards](#coding-standards)
    * [Arrays](#arrays)
    * [Ternary operator](#ternary-operator)
* [Composer](#composer)
* [Testing](#testing)
* [Emails](#emails)
* [Passwords](#passwords)
* [Databases](#databases)
* [Security](#security)
    * [Secured configuration files](#secured-configuration-files)
* [Documentation](#documentation)
* [Development environment](#development-environment)

## Introduction

In this section we will list some of the best PHP practices you should consider
adopting. PHP offers a lot of options and styles of writing your code. However, as
your application grows and becomes more complex, following some good practices
is a must if you want to have a maintainable and modern PHP coding or simply want
to be a good PHP developer.

## PHP setup

### PHP version

Use the latest stable PHP version. In the time of this writing i.e `PHP 7.1`.
You will be able to use great new features and have better performance. Using
old versions can lead to security issues.

### PHP extensions

For performance and security reasons a good practice is to disable extensions
you will not need in your production environment.

## Coding style

### Coding standards

Use [PSR-1][psr-1] and [PSR-2][psr-2] coding standards.

### Arrays

Use short syntax for defining arrays:

```php
$array = [
    "foo" => "bar",
    "bar" => "foo",
];
```

### Ternary operator

In cases where you need to make a quick conditional check, there's a
[ternary operator](http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary)
that can make your code cleaner and more readable.

Let's assume you want to set the `$discount` based on the value of the `$amount`.
If the `$amount` is less than `100`, than the discount is 10%, otherwise it is 20%.

Say you want to check if the `$amount` variable equals to `10`, and if `$amount` equals to `10`
you want to set the `$total` to `1000` and if the `$amount` is **not** equal to `10` you want to set
`$total` to `200`.

You could use the if else statement:

```php
<?php

if ($amount < 100) {
    $discount = 10;
} else {
    $discount = 20;
}
```

By using `ternary` operator, you can write this in one line:

```php
<?php

$discount = ($amount < 100) ? 10 : 20;
```

Note that in cases where you need to append a `query` if a certain condition is met,
the `if` statement would be a better choice.

## Composer

In modern PHP we should write less code and since many problems have already been
solved, use existing solutions and libraries. [Composer][composer] is a tool for
managing your dependencies in a PHP project. By using a terminal you can add, update
or remove dependent packages from [packagist.org][packagist] or other repositories.
Composer is using a `composer.json` file located in your project for managing
dependent packages.

## Testing

Always test your code. If you're not familiar with concept of testing, start with
[PHPUnit][phpunit].

## Emails

For sending emails there are multiple options in PHP. From using default PHP's
[mail()][mail] function to external 3rd party libraries such as [Swift Mailer][swift-mailer]
and [PHPMailer][php-mailer]. Try to avoid the default mail function and instead
use Swift Mailer or PHPMailer. Building modern contact forms, customizing headers,
sending HTML emails, SMTP sending, different setups for sending emails in development
environments, testing emails and other advanced functionalities are sort of a must
these days, and the `mail()` function is too basic for that.

## Passwords

Storing passwords must be done with PHP's built-in [password hashing][password-hashing]
API.

## Databases

For databases using PDO or simply just an ORM is very convenient and can greatly
help you handle advanced database manipulation tasks.

```php
<?php
// PDO and MySQL example
$pdo = new PDO('mysql:host=localhost;dbname=database', 'user', 'password');
$statement = $pdo->query("SELECT id FROM friend");
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['id']);
```

## Security

### Secured configuration files

Storing configuration files MUST be encapsulated.

```php
return [
    # Database Configuration
    'database' => [
        'hostname' => 'localhost',
        'port' => 3306,
        'username' => 'someone',
        'password' => 'v3RyS3c|_|re'
    ],
];
```

```php
<?php

$config = require __DIR__.'/relative/path/to/the/config.php';
```

Storing configurations along json or yaml files should be always encapsulated
within `.htaccess` access restriction:

```apacheconf
#Apache 2.4+
Require local

#Before Apache 2.4
Order deny, allow
Deny from all
```

Nginx

```nginx
location /foo/bar/config.yml {
   deny all;
}
```

The best protection of configuration files is to store them outside of the
publicly available document root.

## Documentation

Always maintain documentation of your code. It adds extra time to your work, but
in the future it helps others (and also you) understand what you've written.
We forget what certain functions, methods or parts of code do, so please always
take extra time to do that.

For inline PHP documentation use [phpDocumentor][phpdocumentor]:

```php
<?php

/**
 * Foo file description.
 */

/**
 * I belong to a class
 */
class Foo
{
}
```

## Development environment

Don't pick a premade \*AMP (MAMP/LAMP/WAMP/XAMPP) stack. Instead, use a
virtualization software like [Vagrant][vagrant] or [Docker][docker]. Vagrant
helps you create and configure lightweight, reproducible, and portable
development environments. When using virtualization, make sure to create a virtual
machine that resembles the production server (the machine where you deploy). This
will help you catch deployment issues during the development stage. These articles
can help you get started with Vagrant and Docker in PHP development:

- [5 Easy Ways to Get Started with PHP on Vagrant](http://www.sitepoint.com/5-easy-ways-getting-started-php-vagrant/)
- [Re-introducing Vagrant: The Right Way to Start with PHP](http://www.sitepoint.com/re-introducing-vagrant-right-way-start-php/)
- [Docker and dockerfiles made easy](http://www.sitepoint.com/docker-and-dockerfiles-made-easy/)

Since the information provided on the article page may be outdated, you should
also refer to the official documentation of [vagrant] and [docker] provided by
the application vendor.

[psr-1]: http://www.php-fig.org/psr/psr-1/
[psr-2]: http://www.php-fig.org/psr/psr-2/
[composer]: https://getcomposer.org
[packagist]: https://packagist.org
[phpunit]: http://phpunit.de
[mail]: http://php.net/manual/function.mail
[swift-mailer]: http://swiftmailer.org/
[php-mailer]: https://github.com/PHPMailer/PHPMailer
[password-hashing]: http://php.net/manual/en/book.password.php
[phpdocumentor]: http://www.phpdoc.org/
[vagrant]: https://www.vagrantup.com/
[docker]:https://www.docker.com/
