---
title: "PHP best practices"
description: "PHP best practices for simplifying and improving your coding"
read_time: "5 min"
updated: "february 25, 2015"
group: "articles"
permalink: "/php-best-practices/"
layout: "article"
og_image: "resources/php-best-practices/bart-simpson-chalkboard.png"
menu:
    - title: "Introduction"
      href: "#introduction"
    - title: "1 PHP Setup"
      href: "#1-php-setup"
    - title: "&nbsp;&nbsp;&nbsp;1.1 PHP version"
      href: "#1.1-php-version"
    - title: "&nbsp;&nbsp;&nbsp;1.2 PHP extensions"
      href: "#1.2-php-extensions"
    - title: "2 Coding style"
      href: "#2-coding-style"
    - title: "&nbsp;&nbsp;&nbsp;2.1 Coding standards"
      href: "#2.1-coding-standards"
    - title: "&nbsp;&nbsp;&nbsp;2.2 Arrays"
      href: "#2.2-arrays"
    - title: "3 Composer"
      href: "#3-composer"
    - title: "4 Testing"
      href: "#4-testing"
    - title: "5 Emails"
      href: "#5-emails"
    - title: "6 Passwords"
      href: "#6-passwords"
    - title: "7 Databases"
      href: "#7-databases"
    - title: "8 Secured configuration files"
      href: "#8-secured-configuration-files"
    - title: "9 Documentation"
      href: "#9-documentation"
version: 0.3
---

![PHP Best Practices](https://raw.githubusercontent.com/wwphp-fb/php-resources/master/php-best-practices/bart-simpson-chalkboard.png "PHP Best Practices")

## Introduction

PHP offers a lot of options and styles of writing your code. But as your application grows and
becomes more complex following some good practices is a must if you want to have a maintanable and modern PHP coding
or just want to be a good PHP developer.

Currently there is no official or canonical way of using PHP but over the years of PHP development we can list
some of the PHP best practices that can simplify and improve your coding at the same time.

## 1 PHP Setup

### 1.1 PHP version

Use the latest stable PHP version. In the time of this writing i.e `PHP 5.6`. Using old versions lead to security issues, you are missing new features and new versions have overall better performance.

### 1.2 PHP extensions

For performance and security reasons it is a good practice to disable/not enable extensions you will not need in your production environment.

## 2 Coding style

### 2.1 Coding standards

Use [PSR-1][psr-1] and [PSR-2][psr-2] coding standards.

### 2.2 Arrays

Use short syntax for defining arrays:

```php
$array = [
    "foo" => "bar",
    "bar" => "foo",
];
```

## 3 Composer

In modern PHP we should write less code and since many problems have already been solved use existing solutions and libraries.
[Composer][composer] is a tool for managing your dependencies in a PHP project. Using your terminal you can add, update or remove dependant packages from [packagist.org][packagist]. In your project you create composer.json file and Composer uses it for managing dependant libraries and packages.

## 4 Testing

Always test your code. If you're not familiar with concept of testing start with [PHPUnit][phpunit].

## 5 Emails

For sending emails there are multiple options in PHP. From using default PHP's [mail()][mail] function to external 3rd party libraries such as [Swift Mailer][swift-mailer] and [PHP Mailer][php-mailer]. Avoid default mail function and use Swift Mailer or PHP Mailer.

## 6 Passwords

Storing passwords must be done with PHP's built-in [password hashing][password-hashing] API.

## 7 Databases

For databases using PDO or simply just ORM is very convenient and can greatly help you handle advanced database manipulation tasks.

```php
<?php
// PDO and MySQL example
$pdo = new PDO('mysql:host=localhost;dbname=database', 'user', 'password');
$statement = $pdo->query("SELECT id FROM friend");
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['id']);
```

## 8 Secured configuration files

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

## 9 Documentation

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