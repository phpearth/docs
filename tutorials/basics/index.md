---
title: "PHP basics"
read_time: "5 min"
updated: "february 21, 2015"
group: "tutorials"
permalink: "/tutorials/php-basics/index.html"
layout: "article"
---

This tutorial will show you basic PHP syntax and its features. If you're new to PHP read the most basic [PHP tutorial](http://php.net/manual/en/tutorial.php) to get started as quickly and painlessly as possible. For becoming modern PHP developer read and follow also [PHP: The Right Way](http://phptherightway.com). Seriously.

* [PHP in a nutshell](#php-in-a-nutshell)
* [Basic syntax](#basic-syntax)
  * [Hello world](#hello-world)
  * [Operators](#operators)
    * [Arithmetic](#operators)
    * [Comparison](#comparison)
    * [Logical](#logical)
    * [Assignment](#assignment)
  * [Declarations](#declarations)
  * [Functions](#functions)
    * [Variadic functions](#variadic-functions)
  * [Control structures](#control-structures)
    * [If](#if)
    * [Loops](#loops)
    * [Switch](#switch)
  * [Arrays](#arrays)
  * [Operations on arrays](#operations-on-arrays)
  * [Errors](#errors)

## PHP in a nutshell

* scripting language
* procedural and object oriented language
* dynamically (weakly) typed
* syntax similar to C, C++, C#, Java and Perl
* Imperative language
* PHP has closures

# Basic syntax

## Hello world

File `hello.php`:

```php
<?php

echo 'Hello, world.';
```
`$ php hello.php`

## Operators

### Arithmetic

|Operator|Name|Result|
|--------|----|-----------|
|`-$a`|negation|Opposite of $a.|
|`$a + $b`|addition|Sum of $a and $b.|
|`$a - $b`|Subtraction|Difference of $a and $b.|
|`$a * $b`|Multiplication|Product of $a and $b.|
|`$a / $b`|division|Quotient of $a and $b.|
|`$a % $b`|modulus|Remainder of $a divided by $b.|
|`$a ** $b`|Exponentiation|Result of raising $a to the $b'th power.|

### Comparison

|Operator|Name|Result|
|--------|----|-----------|
|`$a == $b`|Equal|TRUE if $a is equal to $b after type juggling.|
|`$a === $b`|Identical|TRUE if $a is equal to $b, and they are of the same type.|
|`$a != $b`|Not equal|TRUE if $a is not equal to $b after type juggling.|
|`$a <> $b`|Not equal|TRUE if $a is not equal to $b after type juggling.|
|`$a !== $b`|Not identical|TRUE if $a is not equal to $b, or they are not of the same type.|
|`$a < $b`|Less than|TRUE if $a is strictly less than $b.|
|`$a > $b`|Greater than|TRUE if $a is strictly greater than $b.|
|`$a <= $b`|Less than or equal to|TRUE if $a is less than or equal to $b.|
|`$a >= $b`|Greater than or equal to|TRUE if $a is greater than or equal to $b.|

### Logical

|Operator|Name|Result|
|--------|----|------|
|`$a and $b`|And|TRUE if both $a and $b are TRUE.|
|`$a or $b`|Or|TRUE if either $a or $b is TRUE.|
|`$a xor $b`|Xor|TRUE if either $a or $b is TRUE, but not both.|
|`! $a`|Not|TRUE if $a is not TRUE.|
|`$a && $b`|And|TRUE if both $a and $b are TRUE.|
|`$a || $b`|Or|TRUE if either $a or $b is TRUE.|

### Assignment

|Operator|Description|
|--------|-----------|
|`=`|Set a value to variable|
|`+=`|Addition of numeric value to variable|
|`.=`|Add string to variable|

## Declarations



## Functions

```php
// a simple function
function functionName() {}

// function with parameters
function functionName($param1, $param2) {}
```

### Variadic functions


## Control structures

### If

```php
    if $x > 0 {
        return $x;
    } else {
        return -$x;
    }
```

### Loops

```php
// for
for ($i = 1; $i<10; $i++) {}
    
// while
while ($i < 10) {}
    
// do while
$i = 0;
do {
    echo $i;
} while ($i > 0);


// foreach
foreach ($array as $key => $value) {}
```

### Switch

```php
// switch statement
switch ($operatingSystem) {
    case 'darwin':
        echo 'Mac OS Hipster';
        break;
    case 'linux':
        echo 'Linux Geek';
        break;
    default:
        // Windows, BSD, ...
        echo 'Other';
}
```

## Arrays

```php

```

### Operations on arrays



## Errors


## What's next

Use [php.net](http://php.net). It has a great and detailed manual for all your PHP adventures.