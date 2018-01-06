# Abstract classes in PHP

An abstract class is one that can be inherited, but not instantiated. It is
declared with the keyword `abstract`:

```php
<?php

abstract class MyAbstractClass
{
    public function myImplementedMethod()
    {
        echo 'Hello World!';
    }
}
```

Abstract classes can also contain abstract methods. Abstract methods are
methods without body (implementation).

```php
<?php

abstract class MyAbstractClass
{
    public function myImplementedMethod()
    {
        echo 'Hello World!';
    }

    // Body can be simply omitted.
    abstract function myAbstractMethod();
}
```

When inheriting from an abstract class, all methods marked abstract in the
parent's class declaration must be defined by the child. Additionally, these
methods must be defined with the same (or a less restricted) visibility.

```php
<?php

abstract class MyAbstractClass
{
    public function myImplementedMethod()
    {
        echo 'Hello World!';
    }

    // Although this method was declared protected,
    abstract protected function myAbstractMethod();
}

class MyConcreteClass extends MyAbstractClass
{
    // but it can be public in child class.
    public function myAbstractMethod()
    {
        echo "I'm now implemented!";
    }
}
```

It is not legal to have abstract function definitions inside a non-abstract
class. Any class that contains at least one abstract method, must be declared
`abstract`. In PHP, abstract classes cannot be declared `final`.

## See also

Other useful resources to check out:

* [PHP Manual](http://php.net/manual/en/language.oop5.abstract.php) - Class
  abstraction chapter in the PHP manual.
