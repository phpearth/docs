---
title: "Type Tunnel Design Pattern in PHP"
updated: "March 10, 2017"
permalink: "/articles/object-oriented-programming/design-patterns/type-tunnel/"
redirect_from: "/faq/object-oriented-programming/design-patterns/type-tunnel/"
---

Type tunnel pattern is not exactly a recognized software design pattern by GOF
(Gang of Four book). Type tunnel is used in cases where multiple unrelated types
are passed (tunneled) through adaptation layer and converted to the type the
underlying layer expects.

![Type Tunnel Design Pattern UML](https://raw.githubusercontent.com/wwphp-fb/php-resources-assets/master/images/oop/design-patterns/type-tunnel.png "Type Tunnel Design Pattern UML")

Type tunnel also has side effect that compensates its benefits, because in a
dynamically typed language such as PHP, the types can be solved differently.

It can be best used in statically typed programming languages such as C++ but in
case of PHP implementing type tunnel isn't really applicable.

## See Also

* [Type Tunnel](https://en.wikipedia.org/wiki/Type_Tunnel_pattern)
* [Generalized String Manipulation: Access Shims and Type Tunneling](http://www.drdobbs.com/generalized-string-manipulation-access-s/184401689)
* [PHP Types](http://php.net/manual/en/language.types.php)
