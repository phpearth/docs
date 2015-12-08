---
title: "What are abstract classes in OOP - object oriented programming?"
read_time: "1 min"
updated: "october 4, 2015"
group: "oop"
permalink: "/faq/abstract-classes-in-oop/"

compass:
  prev: "/faq/intro/which-hosting-service-should-i-use/"
  next: "/faq/object-oriented-programming/design-patterns/"
---

## Abstract Classes

An abstract class is one that cannot be instantiated, only inherited. You declare an abstract class with the keyword abstract, like this:

When inheriting from an abstract class, all methods marked abstract in the parent's class declaration must be defined by the child; additionally, these methods must be defined with the same visibillity.

```php
abstract class MyAbstractClass
{
   abstract function myAbstractFunction() {}
}
```

Note that function definitions inside an abstract class must also be preceded by the keyword abstract. It is not legal to have abstract function definitions inside a non-abstract class.

## Resources

Other useful resources to check out:

* [PHP Manual](http://php.net/manual/en/language.oop5.abstract.php) - Class abstraction chapter in PHP Manual.
