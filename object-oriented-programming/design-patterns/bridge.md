---
title: "Bridge design pattern with PHP example"
updated: "August 16, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/bridge/"
---

Decouple an abstraction from its implementation so that the two can vary
independently. Publish interface in an inheritance hierarchy, and bury
implementation in its own inheritance hierarchy. Beyond encapsulation, to
insulation

## Problem

"Hardening of the software arteries" has occurred by using subclassing of an
abstract base class to provide alternative implementations. This locks in
compile-time binding between interface and implementation. The abstraction and
implementation cannot be independently extended or composed.

## Motivation

Consider the domain of "thread scheduling".

<img src="https://lh5.googleusercontent.com/-p8vYuhEzPj4/VOjHe5DO8xI/AAAAAAAACAE/6ttx_ypgLf8/w892-h388-no/Bridge-2x.png">

There are two types of thread schedulers, and two types of operating systems or "platforms". Given this approach to specialization, we have to define a class for each permutation of these two dimensions. If we add a new platform (say ... Java's Virtual Machine), what would our hierarchy look like?

<img src="https://lh5.googleusercontent.com/-lDuDVBtUf0M/VOjHe2fZiLI/AAAAAAAACAM/CW1rNCDFNiU/w1032-h438-no/Bridge_-2x.png">

What if we had three kinds of thread schedulers, and four kinds of platforms? What if we had five kinds of thread schedulers, and ten kinds of platforms? The number of classes we would have to define is the product of the number of scheduling schemes and the number of platforms.

The Bridge design pattern proposes refactoring this exponentially explosive inheritance hierarchy into two orthogonal hierarchies – one for platform-independent abstractions, and the other for platform-dependent implementations.

<img src="https://lh4.googleusercontent.com/-lFFfRZHVctM/VOjHfMaA4-I/AAAAAAAACAI/P3tMLw2WW1Y/w1044-h393-no/Bridge__-2x.png">

## Discussion

Decompose the component's interface and implementation into orthogonal class hierarchies. The interface class contains a pointer to the abstract implementation class. This pointer is initialized with an instance of a concrete implementation class, but all subsequent interaction from the interface class to the implementation class is limited to the abstraction maintained in the implementation base class. The client interacts with the interface class, and it in turn "delegates" all requests to the implementation class.

The interface object is the "handle" known and used by the client; while the implementation object, or "body", is safely encapsulated to ensure that it may continue to evolve, or be entirely replaced (or shared at run-time.

Use the Bridge pattern when:
* you want run-time binding of the implementation,
* you have a proliferation of classes resulting from a coupled interface and numerous implementations,
* you want to share an implementation among multiple objects,
* you need to map orthogonal class hierarchies.

Consequences include:
* decoupling the object's interface,
* improved extensibility (you can extend (i.e. subclass) the abstraction and implementation hierarchies independently),
* hiding details from clients.

Bridge is a synonym for the "handle/body" idiom. This is a design mechanism that encapsulates an implementation class inside of an interface class. The former is the body, and the latter is the handle. The handle is viewed by the user as the actual class, but the work is done in the body. "The handle/body class idiom may be used to decompose a complex abstraction into smaller, more manageable classes. The idiom may reflect the sharing of a single resource by multiple classes that control access to it (e.g. reference counting)."

## Structure

The client doesn’t want to deal with platform-dependent details. The bridge
pattern encapsulates this complexity behind an abstraction "wrapper".

Bridge emphasizes identifying and decoupling "interface" abstraction from
"implementation" abstraction.

<img src="https://lh6.googleusercontent.com/-8qE6WrdThCc/VOjHgHkzZ6I/AAAAAAAACAY/1I0ZeMXaYAM/w907-h593-no/Bridge___-2x.png">

## Example

The Bridge pattern decouples an abstraction from its implementation, so that the
two can vary independently. A household switch controlling lights, ceiling fans,
etc. is an example of the Bridge. The purpose of the switch is to turn a device
on or off. The actual switch can be implemented as a pull chain, simple two
position switch, or a variety of dimmer switches.

<img src="https://lh4.googleusercontent.com/-3Tff5XEuxOs/VOjHgUbptuI/AAAAAAAACAc/8Sb1IfirAFI/w852-h593-no/Bridge_example-2x.png">

## Check list

* Decide if two orthogonal dimensions exist in the domain. These independent
    concepts could be: abstraction/platform, or domain/infrastructure, or
    front-end/back-end, or interface/implementation.
* Design the separation of concerns: what does the client want, and what do the
    platforms provide.
* Design a platform-oriented interface that is minimal, necessary, and sufficient. Its goal is to decouple the abstraction from the platform.
* Define a derived class of that interface for each platform.
* Create the abstraction base class that "has a" platform object and delegates the platform-oriented functionality to it.
* Define specializations of the abstraction class if desired.

## Rules

* Adapter makes things work after they're designed; Bridge makes them work before they are.
* Bridge is designed up-front to let the abstraction and the implementation vary independently. Adapter is retrofitted to make unrelated classes work together.
* State, Strategy, Bridge (and to some degree Adapter) have similar solution structures. They all share elements of the "handle/body" idiom. They differ in intent - that is, they solve different problems.
* The structure of State and Bridge are identical (except that Bridge admits hierarchies of envelope classes, whereas State allows only one). The two patterns use the same structure to solve different problems: State allows an object's behavior to change along with its state, while Bridge's intent is to decouple an abstraction from its implementation so that the two can vary independently.
* If interface classes delegate the creation of their implementation classes (instead of creating/coupling themselves directly), then the design usually uses the Abstract Factory pattern to create the implementation objects.

## PHP Code

In the Bridge Design Pattern, functionality abstraction and implementation are in
separate class hierarchies.

In this example we have `Book` which uses either `BookCapsImplementation` or
`BookStarsImplementation`. `Book` will assign one implementation or the other
each time class `Book` is instantiated.

The bridge pattern is helpful when you want to decouple a class from it's
implementation.

```php
<?php

abstract class Book
{
    private $author;
    private $title;
    private $implementation;

    public function __construct($author, $title, $choice)
    {
        $this->author = $author;
        $this->title  = $title;

        if ('STARS' == $choice) {
            $this->implementation = new BookStarsImplementation();
        } else {
            $this->implementation = new BookCapsImplementation();
        }
    }

    public function showAuthor()
    {
        return $this->implementation->showAuthor($this->author);
    }

    public function showTitle()
    {
        return $this->implementation->showTitle($this->title);
    }
}

class BookAuthorTitle extends Book
{
    public function showAuthorTitle()
    {
        return $this->showAuthor()."'s ".$this->showTitle();
    }
}

class BookTitleAuthor extends Book
{
    public function showTitleAuthor()
    {
        return $this->showTitle().' by '.$this->showAuthor();
    }
}

abstract class BookImplementation
{
    abstract function showAuthor($author);
    abstract function showTitle($title);
}

class BookCapsImplementation extends BookImplementation
{
    public function showAuthor($author)
    {
        return strtoupper($author);
    }

    public function showTitle($title)
    {
        return strtoupper($title);
    }
}

class BookStarsImplementation extends BookImplementation
{
    public function showAuthor($author)
    {
        return str_replace(' ', '*', $author);
    }

    public function showTitle($title)
    {
        return str_replace(' ', '*', $title);
    }
}
```

Usage example:

```php
<?php

  // Example 1 - author title with caps
  $book = new BookAuthorTitle('Larry Truett', 'PHP for Cats', 'CAPS');
  echo $book->showAuthorTitle();

  // Example 2 - author title with stars
  $book = new BookAuthorTitle('Larry Truett', 'PHP for Cats', 'STARS');
  echo $book->showAuthorTitle();

  // Example 3 - title author with caps
  $book = new BookTitleAuthor('Larry Truett', 'PHP for Cats', 'CAPS');
  echo $book->showTitleAuthor();

  // Example 4 - title author with stars
  $book = new BookTitleAuthor('Larry Truett','PHP for Cats','STARS');
  echo $book->showTitleAuthor();
```
