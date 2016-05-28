---
title: "What is flyweight design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "Feb 28, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/flyweight/"
---

## Intent

Use sharing to support large numbers of fine-grained objects efficiently.
The Motif GUI strategy of replacing heavy-weight widgets with light-weight gadgets.

## Problem

Designing objects down to the lowest levels of system "granularity" provides optimal flexibility, but can be unacceptably expensive in terms of performance and memory usage.

## Discussion

The Flyweight pattern describes how to share objects to allow their use at fine granularities without prohibitive cost. Each "flyweight" object is divided into two pieces: the state-dependent (extrinsic) part, and the state-independent (intrinsic) part. Intrinsic state is stored (shared) in the Flyweight object. Extrinsic state is stored or computed by client objects, and passed to the Flyweight when its operations are invoked.

An illustration of this approach would be Motif widgets that have been re-engineered as light-weight gadgets. Whereas widgets are "intelligent" enough to stand on their own; gadgets exist in a dependent relationship with their parent layout manager widget. Each layout manager provides context-dependent event handling, real estate management, and resource services to its flyweight gadgets, and each gadget is only responsible for context-independent state and behavior.

## Structure

Flyweights are stored in a Factory's repository. The client restrains herself from creating Flyweights directly, and requests them from the Factory. Each Flyweight cannot stand on its own. Any attributes that would make sharing impossible must be supplied by the client whenever a request is made of the Flyweight. If the context lends itself to "economy of scale" (i.e. the client can easily compute or look-up the necessary attributes), then the Flyweight pattern offers appropriate leverage.

<img src="https://lh5.googleusercontent.com/-ETHcCJ2--rU/VPFo-93d2jI/AAAAAAAACHc/LrknYYWYF_4/w750-h422-no/Flyweight1-2x.png">
The Ant, Locust, and Cockroach classes can be "light-weight" because their instance-specific state has been de-encapsulated, or externalized, and must be supplied by the client.
<img src="https://lh3.googleusercontent.com/-86miMC6g9Xg/VPFo-sGiulI/AAAAAAAACHg/KMyr64aEwC0/w1025-h725-no/Flyweight_1-2x.png">

## Example

The Flyweight uses sharing to support large numbers of objects efficiently. Modern web browsers use this technique to prevent loading same images twice. When browser loads a web page, it traverse through all images on that page. Browser loads all new images from Internet and places them the internal cache. For already loaded images, a flyweight object is created, which has some unique data like position within the page, but everything else is referenced to the cached one.
<img src="https://lh6.googleusercontent.com/-Qrfht7yFGF4/VPFo-xiiYSI/AAAAAAAACHk/NynJgMZhFI4/w884-h400-no/Flyweight_example1-2x.png">

## Check list

1. Ensure that object overhead is an issue needing attention, and, the client of the class is able and willing to absorb responsibility realignment.
2. Divide the target class's state into: shareable (intrinsic) state, and non-shareable (extrinsic) state.
3. Remove the non-shareable state from the class attributes, and add it the calling argument list of affected methods.
4. Create a Factory that can cache and reuse existing class instances.
5. The client must use the Factory instead of the new operator to request objects.
6. The client (or a third party) must look-up or compute the non-shareable state, and supply that state to class methods.

## Rules

* Whereas Flyweight shows how to make lots of little objects, Facade shows how to make a single object represent an entire subsystem.
* Flyweight is often combined with Composite to implement shared leaf nodes.
* Terminal symbols within Interpreter's abstract syntax tree can be shared with Flyweight.
* Flyweight explains when and how State objects can be shared.

## Code

In the flyweight pattern instances of a class which are identical are shared in an implementation instead of creating a new instance of that class for every instance.

This is done largely to assist performance, and works best when a large number of the exact same instance of a class would otherwise be created.

In this example, the FlyweightBook class stores only author and title, with only three possible author title combinations being used by the system, and yet the system may have a large number of duplicate books.

FlyweightFactory is in charge of distributing instances of FlyweightBook, and only creates a new instance when necessary.

~~~php
<?php

class FlyweightBook {
    private $author;
    private $title;    
    function __construct($author_in, $title_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }      
    function getAuthor() {
        return $this->author;
    }    
    function getTitle() {
        return $this->title;
    }
}

class FlyweightFactory {
    private $books = [];     
    function __construct() {
        $this->books[1] = NULL;
        $this->books[2] = NULL;
        $this->books[3] = NULL;
    }  
    function getBook($bookKey) {
        if (NULL == $this->books[$bookKey]) {
            $makeFunction = 'makeBook'.$bookKey;
            $this->books[$bookKey] = $this->$makeFunction();
        }
        return $this->books[$bookKey];
    }    
    //Sort of an long way to do this, but hopefully easy to follow.  
    //How you really want to make flyweights would depend on what
    //your application needs.  This, while a little clumbsy looking,
    //does work well.
    function makeBook1() {
        $book = new FlyweightBook('Aaryade','PHP For Cats');
        return $book;
    }
    function makeBook2() {
        $book = new FlyweightBook('Aaryadev','PHP For Dogs');
        return $book;
    }
    function makeBook3() {
        $book = new FlyweightBook('Aaryadev','PHP For Parakeets');
        return $book;
    }
}

class FlyweightBookShelf {
    private $books = [];
    function addBook($book) {
        $this->books[] = $book;
    }    
    function showBooks() {
        $return_string = NULL;
        foreach ($this->books as $book) {
            $return_string .= 'title: '.$book->getAuthor().'  author: '.$book->getTitle();
        };
        return $return_string;
    }
}
writeln('BEGIN TESTING FLYWEIGHT PATTERN');

  $flyweightFactory = new FlyweightFactory();
  $flyweightBookShelf1 =  new FlyweightBookShelf();
  $flyweightBook1 = $flyweightFactory->getBook(1);
  $flyweightBookShelf1->addBook($flyweightBook1);
  $flyweightBook2 = $flyweightFactory->getBook(1);
  $flyweightBookShelf1->addBook($flyweightBook2);

  writeln('test 1 - show the two books are the same book');
  if ($flyweightBook1 === $flyweightBook2) {
     writeln('1 and 2 are the same');
  } else {
     writeln('1 and 2 are not the same');    
  }
  writeln('');

  writeln('test 2 - with one book on one self twice');
  writeln($flyweightBookShelf1->showBooks());
  writeln('');

  $flyweightBookShelf2 =  new FlyweightBookShelf();
  $flyweightBook1 = $flyweightFactory->getBook(2);  
  $flyweightBookShelf2->addBook($flyweightBook1);
  $flyweightBookShelf1->addBook($flyweightBook1);

  writeln('test 3 - book shelf one');
  writeln($flyweightBookShelf1->showBooks());
  writeln('');

  writeln('test 3 - book shelf two');
  writeln($flyweightBookShelf2->showBooks());
  writeln('');

  writeln('END TESTING FLYWEIGHT PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
~~~

## Output

~~~
BEGIN TESTING FLYWEIGHT PATTERN

test 1 - show the two books are the same book
1 and 2 are the same

test 2 - with one book on one self twice
title: Aaryadev author: PHP For Cats
title: Aaryadev author: PHP For Cats

test 3 - book shelf one
title: Aaryadev author: PHP For Cats
title: Aaryadev author: PHP For Cats
title: Aaryadev author: PHP For Dogs

test 3 - book shelf two
title: Aaryadev author: PHP For Dogs


END TESTING FLYWEIGHT PATTERN
~~~
