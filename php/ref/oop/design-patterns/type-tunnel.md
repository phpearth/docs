# Type tunnel design pattern in PHP

The type tunnel pattern is not exactly a recognized software design pattern by
GoF (Gang of Four book). Type tunnel is used in cases where multiple unrelated
types are passed (tunneled) through adaptation layer and converted to the type
the underlying layer expects.

![Type tunnel design pattern UML](https://assets.php.earth/docs/oop/design-patterns/type-tunnel.png "Type Tunnel Design Pattern UML")

Type tunnel also has side effects that compensate its benefits, because in a
dynamically typed language such as PHP, the types can be solved differently.

It can be used best in statically typed programming languages such as C++, but
in case of PHP, implementing type tunnel isn't really applicable.

## See also

* [Type Tunnel](https://en.wikipedia.org/wiki/Type_Tunnel_pattern)
* [Generalized String Manipulation: Access Shims and Type Tunneling](http://www.drdobbs.com/generalized-string-manipulation-access-s/184401689)
* [PHP Types](http://php.net/manual/en/language.types.php)
