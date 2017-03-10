---
title: "Object Pool Design Pattern in PHP"
updated: "March 10, 2017"
permalink: "/articles/object-oriented-programming/design-patterns/object-pool/"
redirect_from: "/faq/object-oriented-programming/design-patterns/object-pool/"
---

Object pool pattern is a software creational design pattern which is used in
situations where the cost of initializing a class instance is high. It can offer
a significant performance boost.

![Object Pool Design Pattern UML](https://raw.githubusercontent.com/php-earth/php-resources-assets/master/images/oop/design-patterns/object-pool.png "Object Pool Design Pattern")

Object pool (resource pool) manages instantiated classes. Client code has access
to the pool and can then use it to avoid creating new objects by going through
the pool to find the one that has already been instantiated. When the pool is
empty it will create new objects. Depending on the wanted implementation and
functionality the pool can be also set to limit the number of instantiated
classes.

## PHP Example of Object Pool

```php
<?php

class ObjectPool
{
    /** @var array Instances of reusable objects */
    private $instances = [];

    /**
     * Get object from instances.
     *
     * @param string $key Key for retrieving the instance.
     *
     * @return ReusableObject
     */
    public function get($key)
    {
        return $this->instances[$key];
    }

    /**
     * Add object to list of instances.
     *
     * @param ReusableObject
     */
     public function add($object, $key)
     {
         $this->instances[$key] = $object;
     }
}

class ReusableObject
{
    /**
     * Do something.
     */
    public function doSomething()
    {
        // ...
    }
}

// Client code
$pool = new ObjectPool();
$reusableObject = new ReusableObject();
$pool->add($reusableObject, 'reusable_object_key')

$reusableObject = $pool->get('reusable_object_key');
$reusableObject->doSomething();
```

## More Practical Examples

Practical example can be also a managing a conference with call for papers. When
the call for paper is issued, speakers propose their talks and the managers
decide which speakers to invite. Speakers get assigned to talk sessions. If a
speaker cancels the talk, the talk session becomes available for the next speaker.

Most of the time keep all reusable objects that are not currently in use in the
same object pool so that they can be managed by one coherent policy. To achieve
this, the reusable pool class is designed to be a singleton class.

## Open Source PHP Implementations

* [Pool in pthreads](http://php.net/manual/en/class.pool.php)
* [PSR-6](http://www.php-fig.org/psr/psr-6/) compatible cache libraries

[Dependency injection container](/faq/object-oriented-programming/dependency-injection-container/)
can also use object pool together with some other design patterns.

## See Also

* [Wikipedia: Object pool pattern](https://en.wikipedia.org/wiki/Object_pool_pattern)
* [DesignPatternsPHP: Pool](http://designpatternsphp.readthedocs.io/en/latest/Creational/Pool/README.html)
