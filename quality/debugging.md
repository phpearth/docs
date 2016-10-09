---
title: "How to debug PHP code? What is debugging?"
updated: "October 9, 2016"
permalink: "/faq/testing-and-code-quality/debugging-php-code/"
---

Debugging is a process to find and reduce number of bugs in your code. An
unavoidable but not particularly fun part of building applications. There are
multiple approaches to debugging available for PHP, but before that, you must
set your development environment up in such a way as to be able to see
meaningful errors.

## Index

* [Prerequisites](#prerequisites)
* [Types of errors](#types-of-errors)
  * [Syntax errors](#syntax-errors)
  * [Warnings](#warnings)
  * [Notices](#notices)
  * [Fatal errors](#fatal-errors)
* [var_dump/print_r](#var_dump/print_r)
* [Xdebug](#xdebug)
* [phpdbg](#phpdbg)
* [Symfony VarDumper](#symfony-vardumper)
* [Zend Debugger](#zend-debugger)
* [FirePHP](#firephp)

## Prerequisites

Turn on error reporting and set the appropriately useful error reporting level,
either in your development code, or better yet, in your `php.ini` file:

```php
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
```

## Types of errors

### Syntax errors

These are caused by a typo in your code. Examples include missing semicolons,
quotation marks, incorrect variable definitions and so on.

### Warnings

Warnings will not break the execution of the script like syntax errors.
Warnings are to notify you when you've made a mistake somewhere in your code
but when the script can still execute.

```
Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead in /var/www/project/includes/connect.inc.php on line 2
```

### Notices

Notices will not break the execution of the script (just like with Warnings),
but they are important pieces of information for debugging your application.

### Fatal errors

These errors are quite simple to debug, due to the script will cease execution
when a fatal error occurs. Example of fatal errors include undefined functions,
classes and so on.

```
Fatal error: Call to undefined function bootstrap() in /var/www/project/index.php on line 23
```

## var_dump/print_r

One of the most common and simple techiques for PHP debugging is using
[var_dump][vardump] or [print_r][printr] functions:

```php
$date = '28. 04. 2015';
$start = DateTime::createFromFormat('d. m. Y', $date);
die(var_dump($start));
```

That way you can quickly end execution and check the variable when you want to
know more.

## Xdebug

[Xdebug][xdebug] - A Swiss-Army knife of PHP, Xdebug is a debugger and profiler
that can be used for more advanced debugging than simply using the `var_dump`
or `print_r` functions. It is one of the most commonly used PHP debuggers.
Numerous IDEs also utilize it to provide you with a PHP debugging environment.

## phdbg

[Phpdbg][phpdbg] is integrated in PHP since PHP 5.6.0. It is implemented and
distributed as an SAPI module (just like the CLI interface).

## Symfony VarDumper

You can debug better by using the `dump()` function of [Symfony VarDumper component][symfony-var-dumper]
than is otherwise possible with using `var_dump` or `print_r`.

```php
<?php

require __DIR__.'/vendor/autoload.php';
// create a variable, which could be anything!
$someVar = '...';

dump($someVar);
```

## Zend Debugger

The [Zend Debugger][zend-debugger] is a PHP extension that should be installed
on your Web server in order to perform optimal remote debugging and profiling
using Zend Studio.

## FirePHP

[FirePHP][firephp] is a debugger that enables you to log to your Firebug
Console using a simple PHP method call.

```php
<?php

FB::log('Log message');
FB::info('Info message');
FB::warn('Warn message');
FB::error('Error message');
```

[vardump]: http://php.net/var_dump
[printr]: http://php.net/print_r
[xdebug]: http://xdebug.org/
[phpdbg]: http://phpdbg.com/
[symfony-var-dumper]: http://symfony.com/components/VarDumper
[zend-debugger]: https://www.zend.com/topics/Zend-Debugger-Installation-Guide.pdf
[firephp]: http://www.firephp.org/
