---
title: "Lazy Loading Design Pattern in PHP"
updated: "March 10, 2017"
permalink: "/articles/object-oriented-programming/design-patterns/lazy-loading/"
redirect_from: "/faq/object-oriented-programming/design-patterns/lazy-loading/"
---

Lazy loading is a software design pattern where the initialization of an object
occurs only when it is actually needed and not before to preserve simplicity of
usage and improve performance.

The opposite of lazy loading is so called eager loading where the data, resource,
object is created in the time of the initialization.

!["Lazy Loading Design Pattern"](https://raw.githubusercontent.com/php-earth/php-resources-assets/master/images/oop/design-patterns/lazy-loading.png "Lazy Loading Design Pattern")

Practical example is reading data from the database, where each query is expensive
in terms of performance. When the data is requested via the getter method, it is
retrieved then once and not before.

In the following example the `bar` property is lazy loaded to preserve resources:

```php
<?php

class Foo
{
    /** @var mixed Reference property */
    private $bar = null;

    /**
     * Get reference and assign it via some resource expensive method call only once.
     *
     * @return mixed
     */
    public function getBar()
    {
        if ($this->bar == null) {
            $this->bar = $this->expensiveCall();
        }

        return $this->bar;
    }

    /**
     * This method makes something resource intense and calling it multiple times
     * inside a single request can be avoided with above lazy loading.
     */
    private function expensiveCall()
    {
        // ...
    }
}
```

## Lazy Loading With Closures

For lazy loading we can also use [closures](http://php.net/manual/en/class.closure.php).

For example, let's make the `User` model which represents the user entity with
the data from the database. Each user has many posts (one to many association),
so retrieving posts for each user should be lazy loaded to preserve some more
resources. Some properties and the database wrapper/ORM itself is simplified for
example purposes:

```php
<?php

/**
 * User model which calls an resource intense repository method to get posts.
 */
class User
{
    /** @var array Post items */
    private $posts;

    /** @var Closure Reference to a user repository */
    private $reference;

    /**
     * Set reference to a user repository method with Closure.
     *
     * @param Closure
     */
    public function setReference(Closure $reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get array of items retrieved from the database with the method call of the
     * repository. The retrieval from the database happens only once with the
     * help of lazy loading and therefore improves performance.
     *
     * @return array
     */
    public function getPosts()
    {
        if (!isset($this->posts)) {
            $reference = $this->reference;
            $this->posts = $reference();
        }

        return $this->posts;
    }
}

/**
 * Repository of users from the database.
 */
class UserRepository
{
    /** @var mixed Reference to a database or ORM database manager object */
    private $database;

    // ... Example is simplified for readability.

    /**
     * Get user and set the reference to call when requiring posts from the
     * database by the given ID.
     *
     * @param int $id
     *
     * @return User
     */
    public function findOneById($id)
    {
        $database = $this->database;
        $query = $database->query('SELECT * FROM user WHERE id = :id')
        $query->setParameter('id', $id);

        $user = new User($query->getResult());

        $reference = function($user) use($id, $database) {
            $query = $database->query('SELECT * FROM post WHERE user_id = :id');
            $query->setParameter('id', $id);
            $userData = $query->getResult();

            $posts = [];
            foreach ($userData as $data) {
                $posts[] = new Post($data);
            }

            return $posts;
        };

        $user->setReference($reference);

        return $user;
    }
}
```

## PHP Implementations

Some PHP examples of the lazy loading implementation include:

* Doctrine ORM Proxy
* [Laravel Eloquent](https://laravel.com/docs/5.2/eloquent-relationships#lazy-eager-loading)

## See Also

* [Wikipedia: Lazy loading](https://en.wikipedia.org/wiki/Lazy_loading)
