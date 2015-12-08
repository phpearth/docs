---
title: "How to debug PHP code? What is debugging?"
read_time: "1 min"
updated: "april 29, 2015"
group: "testing"
permalink: "/faq/testing-and-code-quality/debugging-php-code/"

compass:
  prev: "/faq/testing-and-quality/php-and-code-quality/"
---

Debugging is a process to find and reduce number of bugs in your code. Not a very fun part of building applications but unavoidable one. There are multiple debugging approaches available for PHP but before that you must setup your development environment to show you meaningful errors.

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

Turn on error reporting and set the useful error reporting level either in your development code or better yet in php.ini file:

```php
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
```

## Types of errors

### Syntax errors

These are caused by a typo in your code. Examples include missing semicolons, quotation marks, incorrect variable definitions and similar.

### Warnings

Warnings will not break the execution of the script like syntax errors. Warning is notifying you that you made a mistake somewhere in your code but still executes the script.

```
Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead in /var/www/project/includes/connect.inc.php on line 2
```

### Notices

Notices will also continue the execution of the script like warnings, but they are important pieces of information in debugging your application.

### Fatal errors

These errors are quite simple to debug. Execution of the script halts on fatal error. Example of fatal errors include undefined functions, classes and similar.

```
Fatal error: Call to undefined function bootstrap() in /var/www/project/index.php on line 23
```

## var_dump/print_r

One of the most common and simple techique for PHP debugging is most likely using [var_dump][vardump] or [print_r][printr] functions:

```php
$date = '28. 04. 2015';
$start = DateTime::createFromFormat('d. m. Y', $date);
die(var_dump($start));
```

That way you can quickly end procedure and check the variable for which you want to know more.

## Xdebug

[Xdebug][xdebug] - PHP Swiss-Army knife - is a debugger and profiler for PHP. It can be used for more advanced debugging than just using var_dump function. It is one of the most used PHP debuggers. A lot of IDEs also utilize it and provide you simple debugging PHP environment.

## phdbg

[Phpdbg][phpdbg] is integrated in PHP since PHP 5.6.0. It is implemented and distributed as an SAPI module - just as the CLI interface.

## Symfony VarDumper

Using [Symfony VarDumper component][symfony-var-dumper] you can debug better with its `dump()` function that you can use instead of var_dump.

```php
<?php

require __DIR__.'/vendor/autoload.php';
// create a variable, which could be anything!
$someVar = '...';

dump($someVar);
```

## Zend Debugger

The [Zend Debugger][zend-debugger] is the PHP extension which should be installed on your Web server in order to perform optimal remote debugging and profiling using Zend Studio.

## FirePHP

[FirePHP][firephp] is a debugger that enables you to write to Firefox extension Firebug console using a simple PHP method call.

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
