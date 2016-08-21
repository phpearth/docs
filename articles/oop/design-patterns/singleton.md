---
title: "Singleton Design Pattern in PHP"
updated: "August 21, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/singleton/"
---

For example when the application code requires only a single instance of an object,
with lazy initialization and global access.

To solve this, global variables inside a class such as constants defined elsewhere,
could be used. However sooner or later this makes the class not modular and is
used only for the current application implementation. Therefore this is considered
a bad practice. Another approach would be to use the singleton pattern.

Singleton design pattern is creational design pattern where a class ensures it
has only one instance, and provides a global access point. It has encapsulated
"just-in-time initialization" or "initialization on first use".

![Singleton Design Pattern UML Diagram](/images/articles/oop/design-patterns/singleton.svg "Singleton Design Pattern UML Diagram")

In its basics the `Singleton` class has the following structure:

```php
<?php

class Singleton
{
    private static $instance;

    private function __construct() {}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __clone()
    {
        throw new Exception('You cannot clone singleton object');
    }
}
```

Making the `__construct` private ensures it can be initialized only from itself,
and `__clone()` throws exception when trying to clone it. The public static
`getInstance()` method makes lazy initialization of the class only on its first
use. Client code can so use only the accessor method of the class to manipulate
the singleton.

A bit more descriptive example is for example the configuration class:

```php
<?php

class Config
{
    private static $instance;
    private static $values = [];

    private function __construct() {}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function set($key, $val)
    {
        self::$values[$key] = $val;
    }

    public static function get($key)
    {
        if (isset(self::$values[$key])) {
            return self::$values[$key];
        }

        return null;
    }

    public function __clone()
    {
        throw new Exception('You cannot clone singleton object');
    }
}
```

The Singleton pattern can be extended to support access to an application-specific
number of instances.

By using the "static accessor method", supporting inheritance of the singleton
class will not be possible.

Deleting a Singleton class/instance is a non-trivial design problem. See
"To Kill A Singleton" by John Vlissides for more information.

## Further PHP Example

```php
<?php

class BookSingleton
{
    private $author = 'peterkokot, samundra, aaryadev and others';
    private $title  = 'Design Patterns';
    private static $book = NULL;
    private static $isLoanedOut = FALSE;

    private function __construct() {}

    static function borrowBook()
    {
        if (false == self::$isLoanedOut) {
            if (null == self::$book) {
                self::$book = new BookSingleton();
            }
            self::$isLoanedOut = true;

            return self::$book;
        }

        return null;
    }

    public function returnBook(BookSingleton $bookReturned)
    {
        self::$isLoanedOut = false;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getAuthorAndTitle()
    {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

class BookBorrower
{
    private $borrowedBook;
    private $haveBook = false;

    public function __construct() {}

    public function getAuthorAndTitle()
    {
        if (true == $this->haveBook) {
            return $this->borrowedBook->getAuthorAndTitle();
        }

        return "I don't have the book";
    }

    public function borrowBook()
    {
        $this->borrowedBook = BookSingleton::borrowBook();
        $this->haveBook = ($this->borrowedBook == null) ? false : true;
    }

    public function returnBook()
    {
        $this->borrowedBook->returnBook($this->borrowedBook);
    }
}

$bookBorrower1 = new BookBorrower();
$bookBorrower2 = new BookBorrower();

$bookBorrower1->borrowBook();

// BookBorrower1 asked to borrow the book
// BookBorrower1 Author and Title
echo $bookBorrower1->getAuthorAndTitle(); // Design Patterns by peterkokot, samundra, aaryadev and others

$bookBorrower2->borrowBook();
// BookBorrower2 asked to borrow the book
// BookBorrower2 Author and Title:
echo $bookBorrower2->getAuthorAndTitle(); // I don't have the book

// BookBorrower1 returned the book
$bookBorrower1->returnBook();

// BookBorrower2 Author and Title
$bookBorrower2->borrowBook();
echo $bookBorrower1->getAuthorAndTitle(); // Design Patterns by peterkokot, samundra, aaryadev and others
```

## When to Use Singleton Pattern?

* Abstract factory, builder, and prototype can use singleton in their
  implementation.
* Facade objects are often singletons because only one facade object is required.
* State objects are often singletons.
* The advantage of singleton over global variables is that you are absolutely
  sure of the number of instances when you use Singleton, and, you can change
  your mind and manage any number of instances.
* The singleton design pattern is one of the most inappropriately used patterns.
  Singletons are intended to be used when a class must have exactly one instance,
  no more, no less. Designers frequently use singletons in a misguided attempt to
  replace global variables. A singleton is, for intents and purposes, a global
  variable. The singleton does not do away with the global; it merely renames it.
* When is singleton unnecessary? Short answer: most of the time. Long answer: when
  it's simpler to pass an object resource as a reference to the objects that need
  it, rather than letting objects access the resource globally. The real problem
  with singletons is that they give you such a good excuse not to think carefully
  about the appropriate visibility of an object. Finding the right balance of
  exposure and protection for an object is critical for maintaining flexibility.

The same as using global variables inside classes also singleton pattern is
considered a bad practice so at the same time this is also anti pattern. It is
important to understand what it is and how can be used, but better approaches can
be done, such as [dependency injection](/faq/object-oriented-programming/design-patterns/dependency-injection/).

Singleton should be considered only if all three of the following criteria are
satisfied:

* Ownership of the single instance cannot be reasonably assigned
* Lazy initialization is desirable
* Global access is not otherwise provided

If ownership of the single instance, when and how initialization occurs, and
global access are not issues, Singleton is not sufficiently interesting.

## See Also

* [Wikipedia: Singleton pattern](https://en.wikipedia.org/wiki/Singleton_pattern)
* [DesignPatternsPHP: Singleton](https://designpatternsphp.readthedocs.io/en/latest/Creational/Singleton/README.html)
