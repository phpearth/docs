---
title: "Type Tunnel Design Pattern in PHP"
updated: "August 21, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/type-tunnel/"
---

Type tunnel pattern is a software design pattern used in cases where multiple
unrelated types are passed (tunneled) through adaptation layer and converted to
the type the underlying layer expects.

Type tunnel also has side effect that compensates its benefits, because in a
dynamically typed language such as PHP, the types can be solved differently.

It can be best used in statically typed programming languages such as C++ but in
case of PHP implementing type tunnel isn't really applicable.

## See Also

* [Type Tunnel](https://en.wikipedia.org/wiki/Type_Tunnel_pattern)
* [Generalized String Manipulation: Access Shims and Type Tunneling](http://www.drdobbs.com/generalized-string-manipulation-access-s/184401689)
