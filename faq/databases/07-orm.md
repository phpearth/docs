---
title: "What is ORM?"
read_time: "2 min"
updated: "september 28, 2015"
group: "databases"
permalink: "/faq/databases/orm/"

compass:
  prev: "/faq/databases/mongodb-vs-mysql/"
  next: "/faq/php-frameworks/what-is-a-framework/"
---

[ORM](https://en.wikipedia.org/wiki/Object-relational_mapping) (Object-relational mapping), also known as O/RM, and O/R mapping is a programming approach for converting data between incompatible type systems.

Many full stack frameworks provide their own database abstraction approaches or ORMs.

Standalone database abstraction layers and ORMs to check out:

* [Aura SQL](https://github.com/auraphp/Aura.Sql) - Extension to the native PDO along with a profiler and connection locator.
* [Doctrine](http://www.doctrine-project.org/) - Home to several PHP libraries primarily focused on database storage and object mapping. The core projects are a [Object Relational Mapper (ORM)](http://www.doctrine-project.org/projects/orm.html) and the [Database Abstraction Layer (DBAL)](http://www.doctrine-project.org/projects/dbal.html) it is built upon.
* [Eloquent](https://github.com/illuminate/database) - Illuminate Database component, used in Laravel framework but also a standalone component.
* [Pomm](https://github.com/chanmix51/Pomm) - PHP Object Model Manager for Postgresql.
* [Propel](http://propelorm.org/) - A highly customizeable and blazing fast ORM library.
* [ProxyManager](https://github.com/Ocramius/ProxyManager) - Library that aims at providing abstraction for generating various kinds of proxy classes.
* [RedBeanPHP](http://redbeanphp.com/) - Easy to use ORM for PHP.
* [safemysql](https://github.com/colshrapnel/safemysql) - A real safe and convenient way to handle MySQL queries.
* [Spot ORM](http://phpdatamapper.com/) - simple and efficient DataMapper built on Doctrine Database Abstraction Layer.
* [ZF2 DB](http://packages.zendframework.com/docs/latest/manual/en/index.html#zend-db)
* [DataMonkey](https://github.com/devsdmf/datamonkey) - Database ORM for PHP build on top of Doctrine.
* [Medoo](http://medoo.in/) - Light PHP database framework to accelerate development.

## Design patterns

There are mainly two main design patterns used in ORMs - [Active Record](https://en.wikipedia.org/wiki/Active_record_pattern) and [Data Mapper](https://en.wikipedia.org/wiki/Data_mapper_pattern).

## When not to use ORM and what are the alternatives?

As some articles have pointed out ([1](http://www.yegor256.com/2014/12/01/orm-offensive-anti-pattern.html), [2](http://seldo.com/weblog/2011/08/11/orm_is_an_antipattern), [3](http://en.wikipedia.org/wiki/Object-relational_impedance_mismatch)), ORM is anti-pattern that violates principles of object-oriented programming.

Alternatives to ORM:

* [Lessql](http://lessql.net/) - Lightweight and efficient alternative to ORM for PHP

## Resources

Here are some other useful and updated resources to read or check as well:

* [ActiveRecord and the Beauty Lost in Translation](http://matthewmachuga.com/blog/2015/activerecord-and-the-beauty-lost-in-translation.html)
