---
title: "PHP best practices"
description: "PHP best practices"
read_time: "5 min"
updated: "october 11, 2015"
group: "practices"
permalink: "/php-best-practices/"
og_image: "resources/images/best-practices/bart-simpson-chalkboard.png"
---

![PHP Best Practices](/resources/images/best-practices/bart-simpson-chalkboard.png "PHP Best Practices")

1. [Introduction](#introduction)
1. [PHP Setup](#php-setup)
    1. [PHP version](#php-version)
    1. [PHP extensions](#php-extensions)
1. [Coding style](#coding-style)
    1. [Coding standards](#coding-standards)
    1. [Arrays](#arrays)
    1. [Ternary](#ternary)
1. [Composer](#composer)
1. [Testing](#testing)
1. [Emails](#emails)
1. [Passwords](#passwords)
1. [Databases](#databases)
1. [Security](#security)
    1. [Secured configuration files](#secured-configuration-files)
1. [Documentation](#documentation)
1. [Development environment](#development-environment)

## Introduction

In this section we will list some of the best practices to become real PHP ninja. PHP offers a lot of options and styles of
writing your code. But as your application grows and becomes more complex following some good practices is a must if
you want to have a maintanable and modern PHP coding or just want to be a good PHP developer.

Currently there is no official or canonical way of using PHP but over the years of PHP development we can list
some of the PHP best practices that can simplify and improve your coding at the same time.

## PHP Setup

### PHP version

Use the latest stable PHP version. In the time of this writing i.e `PHP 5.6`. Using old versions lead to security issues, you are missing new features and new versions have overall better performance.

### PHP extensions

For performance and security reasons it is a good practice to disable/not enable extensions you will not need in your production environment.

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

### Ternary

In cases where you need to make a quick conditional check, there's a [ternary operator](http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary) that could make your code cleaner and more readable.

Say you want to check the `$amount` variable equals to `10`, and if `$amount` equals to `10`
you want to set the `$total` to `1000` and if the `$amount` is **not** equal to `10` you want to set 
`$total` to `200`.

```php
$amount = 10;
$total = 0;
```

You could do this:

```php
if ($amount == 10) {
    $total = 1000;
} else {
    $total = 200;
}
```

Or you could use the `ternary` operator to simplify them by writing:

```php
$total = ($amount == 10) ? 1000 : 200;
```

Note that in cases that you need to do something like appending a `query` if certain condition is met. In that case, the normal `if` statement would be a better choice.

## Composer

In modern PHP we should write less code and since many problems have already been solved use existing solutions and libraries.
[Composer][composer] is a tool for managing your dependencies in a PHP project. Using your terminal you can add, update or remove dependant packages from [packagist.org][packagist]. In your project you create composer.json file and Composer uses it for managing dependant libraries and packages.

## Testing

Always test your code. If you're not familiar with concept of testing start with [PHPUnit][phpunit].

## Emails

For sending emails there are multiple options in PHP. From using default PHP's [mail()][mail] function to external 3rd party libraries such as [Swift Mailer][swift-mailer] and [PHP Mailer][php-mailer]. Avoid default mail function and use Swift Mailer or PHP Mailer.

## Passwords

Storing passwords must be done with PHP's built-in [password hashing][password-hashing] API.

## Databases

For databases using PDO or simply just ORM is very convenient and can greatly help you handle advanced database manipulation tasks.

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

Storing Configuration files MUST be done encapsulated.

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

Storing configurations along json or yaml files should be always encapsulated within .htaccess access restriction:

```
#Apache 2.4+
Require local

#Before Apache 2.4
Order deny, allow
Deny from all
```

Nginx

```text
location /foo/bar/config.yml {
   deny   all;
}
```

The best protection for configuration files is to store them outside the public available DOCUMENT_ROOT of your webspace.

## Documentation

Always maintain documentation of your code. It adds extra time to your work but it is very important because it helps others (and also you)
to understand what you've written in the future. We're all humans we forget what certain functions, methods or parts of code do, so please
always take extra time to do that.

For inline PHP documentation use [phpDocumentor][phpdocumentor]:

```php
<?php
/**
 * Foo file descrription.
 */

/**
 * I belong to a class
 */
class Foo
{
}
```


## Development Environment
Don't pick a premade *AMP (MAMP/LAMP/WAMP/XAMPP) stack. Instead, use a virtualization software like [Vagrant][vagrant]. Vagrant helps you create and configure lightweight, reproducible, and portable development environments. When using Vagrant (or any similiar software) make sure to create a Virtual machine that resembles the production server (the machine where you deploy). This will help you catch deployment issues during the development stage. These articles can help you get started with Vagrant in PHP development:
- [5 Easy Ways to Get Started with PHP on Vagrant](http://www.sitepoint.com/5-easy-ways-getting-started-php-vagrant/)
- [Re-introducing Vagrant: The Right Way to Start with PHP](http://www.sitepoint.com/re-introducing-vagrant-right-way-start-php/)


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
