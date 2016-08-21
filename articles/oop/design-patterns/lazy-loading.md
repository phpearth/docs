---
title: "Lazy Loading Design Pattern in PHP"
updated: "August 21, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/lazy-loading/"
---

Lazy loading is a software design pattern where the initialization of an object
occurs only when it is actually needed and not before to preserve simplicity of
usage and improve performance.

The opposite of lazy loading is so called eager loading where the data, resource,
object is created in the time of the initialization.

Practical example is reading data from the database, where each query is expensive
in terms of performance. When the data is requested via the getter method, it is
retrieved then once and not before.

In the following example the `bar` property is lazy loaded to preserve resources:

```php
<?php

class Foo
{
    private $bar = null;

    public function getBar()
    {
        if ($this->bar == null) {
            $this->bar = $this->expensiveCall();
        }

        return $this->bar;
    }

    private function expensiveCall()
    {
        // ...
    }
}
```

## Lazy Loading With Closures

For lazy loading we can also use [closures](http://php.net/manual/en/class.closure.php).

For example let's make the `User` model which represents the user entity with
the data from the database. Each user has many posts (one to many association),
so retrieving posts for each user should be lazy loaded to preserve some more
resources. Some properties and the database wrapper/ORM itself is simplified for
example purposes:

```php
<?php

class User
{
    private $posts;

    private $reference;

    public function setReference(Closure $reference)
    {
        $this->reference = $reference;
    }

    public function getPosts()
    {
        if (!isset($this->posts)) {
            $reference = $this->reference;
            $this->posts = $reference();
        }

        return $this->posts;
    }
}

class UserRepository
{
    private $database;

    // ...

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
