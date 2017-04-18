# Abstract Classes in PHP

An abstract class is one that cannot be instantiated, only inherited. It is declared
with the keyword `abstract`:

```php
<?php

abstract class MyAbstractClass
{
    abstract function myAbstractFunction() {}
}
```
In PHP there is no multiple inheritance: a class cannot inherit (extend) more than one class, but an abstract class may be extendend by multiple classes.

When inheriting from an abstract class, all methods marked abstract in the
parent's class declaration must be defined by the child; additionally, these
methods must be defined with the same (or a less restricted) visibility.

Note that function definitions inside an abstract class must also be preceded by
the keyword `abstract`. It is not legal to have abstract function definitions
inside a non-abstract class. Any class that contains at least one abstract method, must be declared abstract.

## See also

Other useful resources to check out:

* [PHP Manual](http://php.net/manual/en/language.oop5.abstract.php) - Class abstraction chapter in PHP Manual.
