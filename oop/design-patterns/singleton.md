# Singleton design pattern in PHP

The Singleton design pattern is a creational design pattern where a class
ensures it has only one instance with lazy initialization, and can be accessed
from a global scope. It has encapsulated "just-in-time initialization" or
"initialization on first use".

To solve this, we could use global variables (constants) inside a class.
However, this doesn't make classes modular and can be used only for the current
application implementation. Therefore, this is considered a bad practice.
Another approach to solve this would be to use the singleton pattern.

![Singleton design pattern uml Diagram](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/oop/design-patterns/creational/singleton.png "Singleton Design Pattern UML Diagram")

PHP example of a `Singleton` class:

```php
<?php

class Singleton
{
    /** @var Singleton Reference to singleton class instance. */
    private static $instance;

    /**
     * Private constructor ensures the class can be initialized only from
     * itself.
     */
    private function __construct() {}

    /**
     * Get a singleton class instance with lazy initialization only on first
     * call. Client code can therefore use only this accessor method to
     * manipulate the singleton.
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @throws Exception to prevent cloning object.
     */
    public function __clone()
    {
        throw new Exception('You cannot clone singleton object');
    }
}
```

The singleton pattern can be extended to support access to an
application-specific number of instances.

Inheritance of the singleton class is not possible when using a static
accessor method. Also, deleting an instance of a singleton class is a
non-trivial design problem.

## When to use the singleton pattern?

A singleton should be considered only if all of the following criteria are met:

* Ownership of the single instance cannot be reasonably assigned.
* Lazy initialization is desirable.
* Global access is not otherwise provided (in case of legacy applications).

If the above criteria does not present implementation issues in the application
code, then in most cases, the [dependency injection](/oop/design-patterns/dependency-injection.md)
should be used for better testability and flexible maintainability.

When accessing the global scope, the advantage of the singleton pattern over
global variables is that it ensures the number of instances which can be
changed to any required number any time.

The same as using global variables inside classes, the singleton pattern
implemented on class level is considered an anti-pattern because it reduces
testability and maintainability of the code. To replace global variables with a
singleton is a wrong approach to solve access of global scope from a class.

A singleton can be used when it is simpler to pass an object resource as a
reference to the objects that need it instead of letting objects access the
resource globally. It might be useful and handy to use a singleton, but the
appropriate visibility of an object must be thought through.

The singleton pattern implemented on factory, incubator, or service container
level is not an anti-pattern. Abstract factory, builder, and prototype can use
a singleton in their implementation. Facade and state objects are also often
a singleton, because only one class instance is required.

## See also

* [Wikipedia: Singleton pattern](https://en.wikipedia.org/wiki/Singleton_pattern)
* [DesignPatternsPHP: Singleton](https://designpatternsphp.readthedocs.io/en/latest/Creational/Singleton/README.html)
