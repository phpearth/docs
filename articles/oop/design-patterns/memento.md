---
title: "What is memento design pattern and how to use it PHP?"
read_time: "1 min"
updated: "Mar 11, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/memento/"
---

## Intent

Without violating encapsulation, capture and externalize an object's internal state so that the object can be returned to this state later.
A magic cookie that encapsulates a "check point" capability.
Promote undo or rollback to full object status.

## Problem

Need to restore an object back to its previous state (e.g. "undo" or "rollback" operations).

## Discussion

The client requests a Memento from the source object when it needs to checkpoint the source object's state. The source object initializes the Memento with a characterization of its state. The client is the "care-taker" of the Memento, but only the source object can store and retrieve information from the Memento (the Memento is "opaque" to the client and all other objects). If the client subsequently needs to "rollback" the source object's state, it hands the Memento back to the source object for reinstatement.

An unlimited "undo" and "redo" capability can be readily implemented with a stack of Command objects and a stack of Memento objects.

The Memento design pattern defines three distinct roles:

1. Originator - the object that knows how to save itself.
2. Caretaker - the object that knows why and when the Originator needs to save and restore itself.
3. Memento - the lock box that is written and read by the Originator, and shepherded by the Caretaker.

## Structure

![Memento design pattern UML diagram](/images/design-patterns/memento.png "Memento design pattern UML diagram")

## Example

The Memento captures and externalizes an object's internal state so that the object can later be restored to that state. This pattern is common among do-it-yourself mechanics repairing drum brakes on their cars. The drums are removed from both sides, exposing both the right and left brakes. Only one side is disassembled and the other serves as a Memento of how the brake parts fit together. Only after the job has been completed on one side is the other side disassembled. When the second side is disassembled, the first side acts as the Memento.

Check list

1. Identify the roles of “caretaker” and “originator”.
2. Create a Memento class and declare the originator a friend.
3. Caretaker knows when to "check point" the originator.
4. Originator creates a Memento and copies its state to that Memento.
5. Caretaker holds on to (but cannot peek into) the Memento.
6. Caretaker knows when to "roll back" the originator.
7. Originator reinstates itself using the saved state in the Memento.

## Rules

* Command and Memento act as magic tokens to be passed around and invoked at a later time. In Command, the token represents a request; in Memento, it represents the internal state of an object at a particular time. Polymorphism is important to Command, but not to Memento because its interface is so narrow that a memento can only be passed as a value.
* Command can use Memento to maintain the state required for an undo operation.
* Memento is often used in conjunction with Iterator. An Iterator can use a Memento to capture the state of an iteration. The Iterator stores the Memento internally.

In this example, the BookMark class is the "Memento", and holds the state of the BookReader class. The BookReader class would be the "Originator" in this example, as it had the original state. Client holds the BookMark object, and so is the "Caretaker".

The memento should be set up so that the caretaker can create, set, and get memento values for an originator. However, the caretaker itself can not access any of the values stored in the memento.

In my example I do this by having memento only allow calls to it's get and set functions in which it is passed a BookReader object. The BookMark can then get or set the titles or pages for a bookreader object it is passed. The downside of my implementation is that I have BookReader's get and set functions as public.

## Code

```php
<?php

class BookReader {    
    private $title;   
    private $page;    
    function __construct($title_in, $page_in) {
      $this->setPage($page_in);
      $this->setTitle($title_in);
    }  
    public function getPage() {
      return $this->page;
    }      
    public function setPage($page_in) {
      $this->page = $page_in;
    }
    public function getTitle() {
      return $this->title;
    }      
    public function setTitle($title_in) {
      $this->title = $title_in;
    }
}

class BookMark {    
    private $title;    
    private $page;    
    function __construct(BookReader $bookReader) {
      $this->setPage($bookReader);
      $this->setTitle($bookReader);      
    }  
    public function getPage(BookReader $bookReader) {
      $bookReader->setPage($this->page);
    }  
    public function setPage(BookReader $bookReader) {
      $this->page = $bookReader->getPage();
    }    
    public function getTitle(BookReader $bookReader) {
      $bookReader->setTitle($this->title);
    }      
    public function setTitle(BookReader $bookReader) {
      $this->title = $bookReader->getTitle();
    }    
}

  // Client

  writeln('BEGIN TESTING MEMENTO PATTERN');
  writeln('');
 
  $bookReader = new BookReader('Core PHP Programming, Third Edition','103');
  $bookMark = new BookMark($bookReader);
 
  writeln('(at beginning) bookReader title: '.$bookReader->getTitle());
  writeln('(at beginning) bookReader page: '.$bookReader->getPage());
 
  $bookReader->setPage("104");
  $bookMark->setPage($bookReader);
  writeln('(one page later) bookReader page: '.$bookReader->getPage());  

  $bookReader->setPage('2005');  //oops! a typo
  writeln('(after typo) bookReader page: '.$bookReader->getPage());    
 
  $bookMark->getPage($bookReader);
  writeln('(back to one page later) bookReader page: '.$bookReader->getPage());    
  writeln('');

  writeln('END TESTING MEMENTO PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
```

## Output

```
BEGIN TESTING MEMENTO PATTERN

(at beginning) bookReader title: Core PHP Programming, Third Edition
(at beginning) bookReader page: 103
(one page later) bookReader page: 104
(after typo) bookReader page: 2005
(back to one page later) bookReader page: 104

END TESTING MEMENTO PATTERN
```

## Resources

* [Memento design pattern on Wikipedia](http://en.wikipedia.org/wiki/Memento_pattern)
