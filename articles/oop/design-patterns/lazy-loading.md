---
title: "Lazy loading design pattern in PHP"
updated: "August 18, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/lazy-loading/"
---

[Lazy loading](https://en.wikipedia.org/wiki/Lazy_loading) is a software design
pattern where the initialization of an object occurs only when it is actually
needed and not before to preserve simplicity of usage and improve performance.

The opposite of lazy loading is so called eager loading where the data, resource,
object is created in the time of the initialization.

Practical example is reading data from the database, where each query is expensive
in terms of performance, only when the actual data is needed and getter is called.

In the following example the `bar` property is lazy loaded to preserve resources:

```php
<?php

class Foo
{
    private $bar = null;

    public function getBar()
    {
        if ($this->bar == null) {
            $this->bar = $this->expensiveOperation();
        }

        return $this->bar;
    }

    private function expensiveOperation()
    {
        // ...
    }
}
```

## Lazy loading with closures



## PHP implementations

Some PHP examples of the lazy loading implementation include:

* Doctrine ORM Proxy
* [Laravel Eloquent](https://laravel.com/docs/5.2/eloquent-relationships#lazy-eager-loading)
