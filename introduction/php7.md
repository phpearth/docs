---
title: "PHP 7"
updated: "February 19, 2016"
permalink: "/articles/php-7/"
image: "/images/articles/php7/php7.png"
---

## Introduction

<img src="/images/introduction/php7.png" align="right" alt="PHP 7" width="450">
PHP 7 is the next major version of the PHP language. You really should check it out
and upgrade.

### Why PHP 7 and not PHP 6?

Choosing the version 7 (instead of 6) was chosen because a lot of existing books
were mentioning PHP 6 long before the development of the next major version after
PHP 5 started. Andi Gutmans said "We're going to skip version 6 because years ago,
we had plans for a 6 but those plans were very different from what we're doing now,"
so the name PHP 7 was chosen.

## Major changes

Most important changes from PHP 5:

* Performance improvements - PHP 7 is [significantly faster](https://docs.google.com/spreadsheets/d/1qW0avj2eRvPVxj_5V4BBNrOP1ULK7AaXTFsxcffFxT8/edit#gid=1334306309) than previous versions.
* [Exceptions in the engine](#exceptions-in-the-engine)
* [Scalar type declarations](#scalar-type-declarations)
* [Combined comparison (spaceship) operator](#combined-comparison-spaceship-operator)
* [Easy user-land CSPRNG](#easy-user-land-csprng)
* [Null coalescing operator](#null-coalescing-operator)
* Removed deprecated functionality from PHP 5

Be sure to read more about the changes in the [migration chapter of PHP manual](http://php.net/manual/en/migration70.php).

### Exceptions in the engine

In previous versions you couldn't catch fatal errors. Now you can do this:

```php
<?php

function doSomething($obj) {
    $obj->nope();
}

try {
    doSomething(null)
} catch (\Error $e) {
    echo "Error: {$e->getMessage()}\n";
}

// Error: Call to a member function method() on a non-object
```

### Scalar type declarations

Now you can enforce parameter types as strings (string), integers (int),
floating-point numbers (float), and booleans (bool). Type declarations (previously
known as type hints) in PHP 5 were class names, interfaces, array and callable.

```php
<?php

// Coercive mode
function sum (int ...$numbers) {
    return array_sum($numbers);
}

var_dump(sum(2, '3', 4.1)); // outputs 9
```

Besides coercive mode there is also strict mode which can be enabled per file
basis with:

```
<?php

declare(strict_types=1);
```

Read more about type declarations in the [PHP manual](http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration).

### Combined comparison (spaceship) operator

The spaceship operator is used for three-way comparison of two expressions. It
returns:

* 1 (if the left-hand operand is greater than the right-hand operand)
* 0 (if both operands are equal)
* -1 (if the right-hand operand is greater than the left-hand operand)

Example of spaceship operator where you need to sort multidimensional array

To do this, you can use `usort()` with comparison function:

```php
<?php

$items = [
    ['title' => 'Mouse'],
    ['title' => 'Computer'],
    ['title' => 'LCD Screen'],
];

// sort items by title
usort($items, function ($a, $b) {
    return $a['title'] <=> $b['title'];
});
```

### Easy user-land CSPRNG

PHP 7 has two new functions `random_bytes()` and `random_int()` for generating
cryptographically secure integers and strings in a cross platform way.

Before PHP 7 you had to use the generator on the platform. For example, CryptGenRandom
on Windows and /dev/urandom on Linux. If you're building modules that must work
on all platforms, this might be an issue. In PHP 7 you can simply use the built-in
generator.

### Null coalescing operator

It turned out that often you needed to use ternary operator with `isset()`
function.

An example where you need to check if the GET data has been sent and set the
`$username` based on that. In PHP 5 you could do something like this:

```php
<?php
$user = isset($_GET['user']) ? $_GET['user'] : 'Guest';
```

Now you can simplify this a lot:

```php
<?php
$user = $_GET['user'] ?? 'Guest';
```

## Resources

Other resources and tutorials to get to know and use PHP 7:

* [Rasmus Lerdorf's PHP 7 development box](https://github.com/rlerdorf/php7dev) - Debian Vagrant box with PHP 7 installed.
* [PHP 7 Docker container](https://github.com/dave1010/php7-docker) - Docker container with PHP 7.
* [PHP 7 logo](http://www.cowburn.info/2015/06/18/php7-logo/) - PHP 7 logo by Vincent Pontier and Peter Cowburn.
* [php7cc](https://github.com/sstalle/php7cc) - PHP 7 Compatibility Checker.
* Reading:
    * [Getting ready for PHP 7](http://php7start.tk/)
    * [PHP 7 Reference](https://github.com/tpunt/PHP7-Reference) - An overview of the features, changes, and backward compatibility breakages in PHP 7.
    * [PHP 7 tutorial](http://php7-tutorial.com/) - Interactive simple and efficient tutorial presenting all the important changes and backwards incompatibilities.
