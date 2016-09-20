---
title: "Adapter design pattern with PHP example"
updated: "August 18, 2016"
permalink: "/articles/object-oriented-programming/design-patterns/adapter/"
redirect_from: "/faq/object-oriented-programming/design-patterns/adapter/"
---

* Convert the interface of a class into another interface clients expect. Adapter
    lets classes work together that couldn't otherwise because of incompatible
    interfaces.
* Wrap an existing class with a new interface.
* Impedance match an old component to a new system

## Problem

An "off the shelf" component offers compelling functionality that you would like
to reuse, but its "view of the world" is not compatible with the philosophy and
architecture of the system currently being developed.

## Discussion

Reuse has always been painful and elusive. One reason has been the tribulation
of designing something new, while reusing something old. There is always something
not quite right between the old and the new. It may be physical dimensions or
misalignment. It may be timing or synchronization. It may be unfortunate
assumptions or competing standards.

It is like the problem of inserting a new three-prong electrical plug in an old
two-prong wall outlet – some kind of adapter or intermediary is necessary.

<img src="https://lh3.googleusercontent.com/gv5neGv-D4plGl8s5kgQXHFJo8eD-QjKxIQvvXBbXuE=w779-h362-no">

Adapter is about creating an intermediary abstraction that translates, or maps,
the old component to the new system. Clients call methods on the Adapter object
which redirects them into calls to the legacy component. This strategy can be
implemented either with inheritance or with aggregation.

Adapter functions as a wrapper or modifier of an existing class. It provides a
different or translated view of that class.

## Structure

Below, a legacy Rectangle component's display() method expects to receive "x, y,
w, h" parameters. But the client wants to pass "upper left x and y" and "lower
right x and y". This incongruity can be reconciled by adding an additional level
of indirection – i.e. an Adapter object.

<img src="https://lh6.googleusercontent.com/-6henwb2GmU4/VO944QwpXGI/AAAAAAAACEY/3Zl1r9VWas4/w1044-h538-no/Adapter_1-2x.png">

The Adapter could also be thought of as a "wrapper".

<img src="https://lh4.googleusercontent.com/-xePjLOZJ9io/VO944Mi1GSI/AAAAAAAACEU/mT_Aum9zJ0E/w1044-h461-no/Adapter-2x.png">

## Example

The Adapter pattern allows otherwise incompatible classes to work together by
converting the interface of one class into an interface expected by the clients.
Socket wrenches provide an example of the Adapter. A socket attaches to a ratchet,
provided that the size of the drive is the same. Typical drive sizes in the
United States are 1/2" and 1/4". Obviously, a 1/2" drive ratchet will not fit
into a 1/4" drive socket unless an adapter is used. A 1/2" to 1/4" adapter has a
1/2" female connection to fit on the 1/2" drive ratchet, and a 1/4" male connection
to fit in the 1/4" drive socket.

<img src="https://lh6.googleusercontent.com/-_HKoJIu7Mpo/VO96SH68ciI/AAAAAAAACEw/i0wGDN4GWA0/w663-h547-no/Adapter_example1-2x.png">

## Check list

1. Identify the players: the component(s) that want to be accommodated (i.e. the
    client), and the component that needs to adapt (i.e. the adaptee).
2. Identify the interface that the client requires.
3. Design a "wrapper" class that can "impedance match" the adaptee to the client.
4. The adapter/wrapper class "has a" instance of the adaptee class.
5. The adapter/wrapper class "maps" the client interface to the adaptee interface.
6. The client uses (is coupled to) the new interface

## Rules

* Adapter makes things work after they're designed; Bridge makes them work before
    they are.
* Bridge is designed up-front to let the abstraction and the implementation vary
    independently. Adapter is retrofitted to make unrelated classes work together.
* Adapter provides a different interface to its subject. Proxy provides the same
    interface. Decorator provides an enhanced interface.
* Adapter is meant to change the interface of an existing object. Decorator
    enhances another object without changing its interface. Decorator is thus more
    transparent to the application than an adapter is. As a consequence, Decorator
    supports recursive composition, which isn't possible with pure Adapters.
* Facade defines a new interface, whereas Adapter reuses an old interface. Remember
    that Adapter makes two existing interfaces work together as opposed to defining
    an entirely new one.

## Code

In the Adapter Design Pattern, a class converts the interface of one class to be
what another class expects.

In this example we have a class `Book` with `getAuthor()` and `getTitle()`
methods. The client, expects a getAuthorAndTitle() method. To "adapt" `Book` for
testAdapter we have an adapter class, BookAdapter, which takes in an instance of
`Book`, and uses the getAuthor() and getTitle() methods in it's own
getAuthorAndTitle() method.

Adapters are helpful if you want to use a class that doesn't have quite the exact
methods you need, and you can't change the original class. The adapter can take
the methods you can access in the original class, and adapt them into the methods
you need.

```php
<?php

class Book
{
    private $author;
    private $title;

    public function __construct($author, $title)
    {
        $this->author = $author;
        $this->title  = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class BookAdapter
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAuthorAndTitle()
    {
        return $this->book->getTitle().' by '.$this->book->getAuthor();
    }
}

$book = new Book('peterkokot, aaryadev, others', 'Design Patterns');
$bookAdapter = new BookAdapter($book);
echo 'Author and Title: '.$bookAdapter->getAuthorAndTitle();
```

## UML diagram

![Adapter pattern UML diagram](/_images/object-oriented-programming/design-patterns/adapter.png "Adapter pattern UML diagram")

## See Also

* [Wikipedia](http://en.wikipedia.org/wiki/Adapter_pattern)
