---
title: "Iterator Design Pattern in PHP"
updated: "March 10, 2017"
permalink: "/articles/object-oriented-programming/design-patterns/iterator/"
redirect_from: "/faq/object-oriented-programming/design-patterns/iterator/"
---

Iterator pattern is software design pattern which provides access to the elements
of an aggregate object sequentially without exposing its underlying representation.
It makes elements appear as a collection of objects.

* Promote to "full object status" the traversal of a collection.
* Polymorphic traversal

## PHP Implementations

* PHP offers [Iterator interface](http://php.net/manual/en/class.iterator.php)
  out of the box. Its SPL library has also a wide variety of
  [useful iterators](http://php.net/manual/en/spl.iterators.php). After
  understanding the basics of the iterator pattern using these instead of
  reinventing the wheel is more convenient.

## See Also

* [Wikipedia: Iterator pattern](https://en.wikipedia.org/wiki/Iterator_pattern)
* [DesignPatternsPHP: Iterator](http://designpatternsphp.readthedocs.io/en/latest/Behavioral/Iterator/README.html)
