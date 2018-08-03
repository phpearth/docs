# How to debug PHP code?

Debugging is a process of finding and reducing number of bugs in your code. An
unavoidable and not particularly fun part of applications development. There are
multiple approaches for debugging PHP code.

## Prerequisites

Before debugging, you need to prepare your development environment to show
meaningful errors. Make sure to debug only in development environment and not
production.

Turn on error reporting and set the appropriately useful error reporting level,
either in the PHP code:

```php
<?php

// Turninig on errors in PHP code directly
ini_set('display_errors', 'On');
error_reporting(E_ALL);
```

Or better yet, in the `php.ini` file for development environment:

```ini
display_errors = On
log_errors = On
error_reporting = E_ALL
```

## Types of errors

### Syntax errors

These are caused by a typo in your code. Examples include missing semicolons,
quotation marks, incorrect variable definitions and so on.

### Warnings

Warnings will not break the execution of the script like syntax errors. Warnings
are to notify you when you've made a mistake somewhere in your code but when the
script can still execute.

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

## var\_dump/print\_r

One of the most common and simple techiques for PHP debugging is using
[var_dump](http://php.net/var_dump) or [print_r](http://php.net/print_r)
functions:

```php
<?php

$date = '2015-04-18';
$start = DateTime::createFromFormat('Y-m-d', $date);
die(var_dump($start));
```

That way you can end execution of the script and check if output of the variable
value matches what you expect it to be.

## Xdebug

[Xdebug](http://xdebug.org/) - A Swiss-Army knife of PHP, Xdebug is a debugger
and profiler that can be used for more advanced debugging than simply using the
`var_dump` or `print_r` functions. It is one of the most commonly used PHP
debuggers. Numerous IDEs also utilize it to provide you with a PHP debugging
environment.

## phdbg

[Phpdbg](http://phpdbg.com/) is a default interactive PHP debugger integrated
directly in the PHP out of the box. It is implemented and distributed as a SAPI
module (just like the PHP CLI interface).

## Symfony VarDumper

You can debug better by using the `dump()` function of the
[Symfony VarDumper component](http://symfony.com/components/VarDumper)
than is otherwise possible with using `var_dump` or `print_r`.

```php
<?php

require __DIR__.'/vendor/autoload.php';

// This is some variable which you want to check and debug.
$someVar = '...';

dump($someVar);
```

## Zend Debugger

The [Zend Debugger](https://www.zend.com/topics/Zend-Debugger-Installation-Guide.pdf)
is a PHP extension that should be installed on your Web server in order to
perform optimal remote debugging and profiling using Zend Studio.

## FirePHP

[FirePHP](http://www.firephp.org/) is a debugger that enables you to log to your
Firebug Console using a simple PHP method call.

```php
<?php

FB::log('Log message');
FB::info('Info message');
FB::warn('Warn message');
FB::error('Error message');
```

## See also

* [PHP errors](/php/ref/errors)
* [All hail Xdebug and lets let var dump die](http://jamescowie.me/blog/2016/12/all-hail-xdebug-and-lets-let-var-dump-die/)
* [Getting to Know and Love Xdebug](https://www.sitepoint.com/getting-know-love-xdebug/)
