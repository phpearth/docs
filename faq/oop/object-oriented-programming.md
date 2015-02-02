---
title: "What is OOP - object oriented programming?"
read_time: "1 min"
updated: "november 11, 2014"
group: "oop"
permalink: "/faq/object-oriented-programming/"
---

Object oriented programming is a programming paradigm with objects and classes. Objects are usually instances of classes which
have methods (functions or associated procedures) and properties (attributes or data fields which are descriptions of that class).

PHP is object oriented programming language and since the beginning of PHP 5 it has a full object model. Over the version updates
it got to an almost fully object oriented language. Many still consider PHP object-oriented capabilities not fully object oriented.
But it is a matter of a perspective and coding style as well.

Many developers don't find the concept of object oriented paradigm useful or they think it is scary because they don't
understand the practical benefits of it.



## Simple example of class in PHP:

```php
<?php

class Greet
{
    // property declaration
    public $name = 'world';

    // method declaration
    public function greetPerson($name = $this->name) {
        echo 'Hello, '.$this->name;
    }
}

$greetObject = new Greet();
$greetObject->greetPerson('Peter');

```

## Abstract Classes

Class abstraction is 

## Interfaces



Resources:

* [PHP Manual - Classes and Objects](http://php.net/manual/en/language.oop5.php)

