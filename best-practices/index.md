---
description: "Some of the best PHP practices."
---

# PHP best practices

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
adopting. PHP offers a lot of options and styles of writing your code. However,
as your application grows and becomes more complex, following best practices is
a must if you want modern and maintainable PHP code or simply want to be a
better PHP developer.

## PHP setup

### PHP version

Use the latest stable PHP version (i.e., `PHP 7.1` at the time of writing
this). You will be able to use great new features and overall performance will
be improved. Using old versions can lead to security issues.

### PHP extensions

For performance and security reasons, a good practice is to disable extensions
that you will not need in your production environment.

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

Let's assume you want to set the `$discount` based on the value of the
`$amount`. If the `$amount` is less than `100`, then the discount is 10%, and
otherwise, it is 20%.

Say you want to check if the `$amount` variable equals `10`, and if `$amount`
equals `10` you want to set the `$total` to `1000`, and if the `$amount` is
**NOT** equal to `10` you want to set `$total` to `200`.

You could use an `if else` statement:

```php
<?php

if ($amount < 100) {
    $discount = 10;
} else {
    $discount = 20;
}
```

By using a `ternary` operator, you could write this in one line:

```php
<?php

$discount = ($amount < 100) ? 10 : 20;
```

Note that in cases where you need to append a `query` if a certain condition is
met, an `if` statement would be a better choice.

## Composer

In modern PHP, we should write less code, and since many problems have already
been solved, use existing solutions and libraries. [Composer][composer] is a
tool for managing your dependencies in a PHP project. By using a terminal, you
can add, update, and remove dependent packages from [packagist.org][packagist]
and other repositories. Composer uses a `composer.json` file, located in your
project directory, for managing dependent packages.

## Testing

Always test your code. If you're not familiar with concept of testing, start
with [PHPUnit][phpunit].

## Emails

For sending emails there are multiple options in PHP, from using PHP's default
[mail()][mail] function, to external third-party libraries such as
[Swift Mailer][swift-mailer] and [PHPMailer][php-mailer]. Try to avoid the
default `mail()` function and instead use Swift Mailer or PHPMailer. Building
modern contact forms, customizing headers, sending HTML emails, SMTP sending,
different setups for sending emails in development environments, testing emails
and other advanced functionalities are sort of a must these days, and the
`mail()` function is too basic for that.

## Passwords

Storing passwords must be done with PHP's built-in
[password hashing API][password-hashing].

## Databases

For databases, using PDO or simply just an ORM is very convenient and can
greatly help you handle advanced database manipulation tasks.

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

Direct access to configuration files stored as formats such as JSON or YAML,
for example, should always be restricted by `.htaccess`:

```apacheconf
#Apache 2.4+
Require local

#Before Apache 2.4
Order Deny,Allow
Deny from all
```

For Nginx servers, where `.htaccess` files aren't used, the equivalent can be
achieved by using your `nginx.conf` file:

```nginx
location /foo/bar/config.yml {
   deny all;
}
```

When possible, for the best protection of configuration files, store them
outside of the publicly available document root.

## Documentation

Always maintain documentation for your code. It adds extra time to your work,
but will be helpful to others (and also to you) in the future, to understand
what you've written. We forget what certain functions, methods and parts of
code do, so please always take extra time to document your work.

For inline PHP documentation, use [phpDocumentor][phpdocumentor]:

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

Don't pick a premade \*AMP (MAMP/LAMP/WAMP/XAMPP) stack. Instead, use
virtualization software like [Vagrant][vagrant] or [Docker][docker]. Vagrant
helps you create and configure lightweight, reproducible, and portable
development environments. When using virtualization, make sure to create a
virtual machine that resembles the production server (the machine where you
deploy). This will help you catch deployment issues during the development
stage. These articles can help you get started with Vagrant and Docker in PHP
development:

- [5 Easy Ways to Get Started with PHP on Vagrant](http://www.sitepoint.com/5-easy-ways-getting-started-php-vagrant/)
- [Re-introducing Vagrant: The Right Way to Start with PHP](http://www.sitepoint.com/re-introducing-vagrant-right-way-start-php/)
- [Docker and dockerfiles made easy](http://www.sitepoint.com/docker-and-dockerfiles-made-easy/)

Since the information provided on the article page may be outdated, you should
also refer to the official documentation for [vagrant] and [docker], provided
by the application vendor.

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
