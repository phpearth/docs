---
title: "Dependency injection design pattern with PHP example"
updated: "August 16, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/dependency-injection/"
---

Dependency Injection is a design pattern which helps to reduce tight coupling.

Let's check the example, where we link an author to the book:

```php
class Author
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

class Book
{
    private $title;
    private $author;

    public function __construct($firstName, $lastName, $title)
    {
        $this->name = $name;
        $this->author = new Author($firstName, $lastName);
    }
}
```

As you can see, we have a class `Author` with `$firstName` and `$lastName`
properties, and in the class `Book` constructor, we inject the properties of the
`Author` class along with the `Book` class properties and create an object of the
`Author` class and store it. You may think it is great code, but it is not.

Why?

* You are violating the Single Responsibility Principle. The `Book` class does more than representing a `Book`.
* You are tightly coupling the code. If you ever had to add a new property to the `Author` class constructor, then you will break the `Book` class.

Therefore, to solve this issue, we use dependency injection, and this is how you use it:

```php
class Author
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

class Book
{
    private $title;
    private $author;

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
