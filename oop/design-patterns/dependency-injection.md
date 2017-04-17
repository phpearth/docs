---
title: "Dependency Injection Design Pattern in PHP"
updated: "September 20, 2016"
permalink: "/articles/object-oriented-programming/design-patterns/dependency-injection/"
redirect_from: "/faq/object-oriented-programming/design-patterns/dependency-injection/"
---

Dependency injection is a design pattern which helps to reduce tight coupling.

Let's check the example, where we link an author to the book:

```php
<?php

class Author
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * Constructor.
     *
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

class Book
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * Constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $title
     */
    public function __construct($firstName, $lastName, $title)
    {
        $this->title = $title;
        $this->author = new Author($firstName, $lastName);
    }
}
```

As you can see, we have a class `Author` with `$firstName` and `$lastName`
properties, and in the class `Book` constructor, we inject the properties of the
`Author` class along with the `Book` class properties and create an object of the
`Author` class and store it. You may think it is great code, but it is not.

Why?

* You are violating the single responsibility principle. The `Book` class does
  more than representing a `Book`.
* You are tightly coupling the code. If you ever had to add a new property to the
  `Author` class constructor, then you will break the `Book` class.

Therefore, to solve this issue, we use dependency injection, and this is how you
use it:

```php
<?php

class Author
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * Constructor.
     *
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

class Book
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var Author
     */
    private $author;

    /**
     * Constructor.
     *
     * @param string $title
     * @param Author $author
     */
    public function __construct($title, Author $author)
    {
        $this->title = $title;
        $this->author = $author;
    }
}

$author = new Author('John', 'Doe');
$book = new Book('Some legendary book', $author);
```

So, as you can see, we created an object of the `Author` class, and passed the
variable referring to the object into the `Book` class. So basically, that is it
about dependency injection.

## Types of Dependency Injection

Most common types of dependency injection are:

* Constructor injection
* Setter injection
* Interface injection

### Constructor injection

Dependency gets injected via class constructor as shown in above example:

```php
$author = new Author('John', 'Doe');
$book = new Book('Some legendary book', $author);
```

### Setter injection

Dependency gets injected with class setter method:

```php
<?php

class Author
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * Constructor.
     *
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

class Book
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var Author
     */
    private $author;

    /**
     * Set book author.
     *
     * @param Author $author
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Set book title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

$author = new Author('John', 'Doe');
$book = new Book();
$book->setAuthor($author);
$book->setTitle('Some legendary book');
```

### Interface injection

Client uses interface for dependency injection.

## Dependency Injection Container

In projects with a lot of classes which utilize the dependency injection pattern,
managing these dependencies can be solved nicely with
[dependency injection container](/oop/dic.md)

## See Also

* [Wikipedia: Dependency injection](https://en.wikipedia.org/wiki/Dependency_injection)
* [What is Dependency Injection? by Fabien Potencier](http://fabien.potencier.org/what-is-dependency-injection.html)
* [DesignPatternsPHP: Dependency Injection](http://designpatternsphp.readthedocs.io/en/latest/Structural/DependencyInjection/README.html)
* [Inversion of Control Containers and the Dependency Injection pattern](http://www.martinfowler.com/articles/injection.html)
* [PHP The Right Way: Dependency Injection](http://www.phptherightway.com/#dependency_injection)
