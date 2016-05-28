---
title: "What are abstract classes in PHP?"
read_time: "1 min"
updated: "March 14, 2016"
group: "oop"
redirect_from: "/faq/abstract-classes-in-oop/"
permalink: "/faq/object-oriented-programming/php-abstract-classes/"

compass:
  prev: "/faq/object-oriented-programming/"
  next: "/faq/object-oriented-programming/php-iterators/"
---

An abstract class is one that cannot be instantiated, only inherited. It is declared
with the keyword `abstract`:

~~~php
<?php

abstract class MyAbstractClass
{
    abstract function myAbstractFunction() {}
}
~~~

When inheriting from an abstract class, all methods marked abstract in the
parent's class declaration must be defined by the child; additionally, these
methods must be defined with the same visibility.

Note that function definitions inside an abstract class must also be preceded by
the keyword `abstract`. It is not legal to have abstract function definitions
inside a non-abstract class.

## See also

Other useful resources to check out:

* [PHP Manual](http://php.net/manual/en/language.oop5.abstract.php) - Class abstraction chapter in PHP Manual.
