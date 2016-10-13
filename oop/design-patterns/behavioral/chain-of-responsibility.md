---
title: "Chain of Responsibility Design Pattern in PHP"
updated: "October 13, 2016"
permalink: "/articles/object-oriented-programming/design-patterns/chain-of-responsibility/"
redirect_from: "/faq/object-oriented-programming/design-patterns/chain-of-responsibility/"
---

Avoid coupling the sender of a request to its receiver by giving more than one
object a chance to handle the request. Chain the receiving objects and pass the
request along the chain until an object handles it. Launch-and-leave requests
with a single processing pipeline that contains many possible handlers. An
object-oriented linked list with recursive traversal.

## Problem

There is a potentially variable number of "handler" or "processing element" or
"node" objects, and a stream of requests that must be handled. Need to efficiently
process the requests without hard-wiring handler relationships and precedence, or request-to-handler mappings.

![Chain of responsibility design pattern](/images/oop/design-patterns/Chain_of_responsibility1-2x.png "Chain of responsibility design pattern")

## Discussion

Encapsulate the processing elements inside a "pipeline" abstraction; and have clients "launch and leave" their requests at the entrance to the pipeline.

![Chain of responsibility design pattern](/images/oop/design-patterns/Chain_of_responsibility_1-2x.png "Chain of responsibility design pattern")

The pattern chains the receiving objects together, and then passes any request messages from object to object until it reaches an object capable of handling the message. The number and type of handler objects isn't known a priori, they can be configured dynamically. The chaining mechanism uses recursive composition to allow an unlimited number of handlers to be linked.

Chain of Responsibility simplifies object interconnections. Instead of senders and receivers maintaining references to all candidate receivers, each sender keeps a single reference to the head of the chain, and each receiver keeps a single reference to its immediate successor in the chain.

Make sure there exists a "safety net" to "catch" any requests which go unhandled.

Do not use Chain of Responsibility when each request is only handled by one handler, or, when the client object knows which service object should handle the request.

## Structure

The derived classes know how to satisfy Client requests. If the "current" object is not available or sufficient, then it delegates to the base class, which delegates to the "next" object, and the circle of life continues.

![Chain of responsibility design pattern](/images/oop/design-patterns/Chain_of_responsibility__-2x.png "Chain of responsibility design pattern")

Multiple handlers could contribute to the handling of each request. The request can be passed down the entire length of the chain, with the last link being careful not to delegate to a "null next".

## Example

The Chain of Responsibility pattern avoids coupling the sender of a request to the receiver by giving more than one object a chance to handle the request. ATM use the Chain of Responsibility in money giving mechanism.

![Chain of responsibility design pattern](/images/oop/design-patterns/Chain_of_responsibility_example.png "Chain of responsibility design pattern")

## Check list

* The base class maintains a "next" pointer.
* Each derived class implements its contribution for handling the request.
* If the request needs to be "passed on", then the derived class "calls back" to the base class, which delegates to the "next" pointer.
* The client (or some third party) creates and links the chain (which may include a link from the last node to the root node).
* The client "launches and leaves" each request with the root of the chain.
* Recursive delegation produces the illusion of magic.

## Rules

* Chain of Responsibility, Command, Mediator, and Observer, address how you can decouple senders and receivers, but with different trade-offs. Chain of Responsibility passes a sender request along a chain of potential receivers.
* Chain of Responsibility can use Command to represent requests as objects.
* Chain of Responsibility is often applied in conjunction with Composite. There, a component's parent can act as its successor.

## Code

A method called in one object will move up a chain of objects until one is found
that can properly handle the call.

```php
<?php

abstract class AbstractBookTopic
{
    abstract function getTopic();
    abstract function getTitle();
    abstract function setTitle($title_in);
}

class BookTopic extends AbstractBookTopic
{
    private $topic;
    private $title;
    function __construct($topic_in) {
      $this->topic = $topic_in;
      $this->title = NULL;
    }
    function getTopic() {
      return $this->topic;
    }
    //this is the end of the chain - returns title or says there is none
    function getTitle() {
      if (NULL != $this->title) {
        return $this->title;
      } else {
        return 'there is no title avaialble';
      }
    }
    function setTitle($title_in) {$this->title = $title_in;}
}

class BookSubTopic extends AbstractBookTopic
{
    private $topic;
    private $parentTopic;
    private $title;
    function __construct($topic_in, BookTopic $parentTopic_in) {
      $this->topic = $topic_in;
      $this->parentTopic = $parentTopic_in;
      $this->title = NULL;
    }
    function getTopic() {
      return $this->topic;
    }
    function getParentTopic() {
      return $this->parentTopic;
    }
    function getTitle() {
      if (NULL != $this->title) {
        return $this->title;
      } else {
        return $this->parentTopic->getTitle();
      }
    }
    function setTitle($title_in) {$this->title = $title_in;}
}

class BookSubSubTopic extends AbstractBookTopic
{
    private $topic;
    private $parentTopic;
    private $title;
    function __construct($topic_in, BookSubTopic $parentTopic_in) {
      $this->topic = $topic_in;
      $this->parentTopic = $parentTopic_in;
      $this->title = NULL;
    }
    function getTopic() {
      return $this->topic;
    }
    function getParentTopic() {
      return $this->parentTopic;
    }
    function getTitle() {
      if (NULL != $this->title) {
        return $this->title;
      } else {
        return $this->parentTopic->getTitle();
      }
    }
    function setTitle($title_in) {$this->title = $title_in;}
}

  writeln("BEGIN TESTING CHAIN OF RESPONSIBILITY PATTERN");
  writeln("");

  $bookTopic = new BookTopic("PHP 5");
  writeln("bookTopic before title is set:");
  writeln("topic: " . $bookTopic->getTopic());
  writeln("title: " . $bookTopic->getTitle());
  writeln("");

  $bookTopic->setTitle("PHP 5 Recipes by Babin, Good, Kroman, and Stephens");
  writeln("bookTopic after title is set: ");
  writeln("topic: " . $bookTopic->getTopic());
  writeln("title: " . $bookTopic->getTitle());
  writeln("");

  $bookSubTopic = new BookSubTopic("PHP 5 Patterns",$bookTopic);
  writeln("bookSubTopic before title is set: ");
  writeln("topic: " . $bookSubTopic->getTopic());
  writeln("title: " . $bookSubTopic->getTitle());
  writeln("");

  $bookSubTopic->setTitle("PHP 5 Objects Patterns and Practice by Zandstra");
  writeln("bookSubTopic after title is set: ");
  writeln("topic: ". $bookSubTopic->getTopic());
  writeln("title: ". $bookSubTopic->getTitle());
  writeln("");

  $bookSubSubTopic = new BookSubSubTopic("PHP 5 Patterns for Cats",
    $bookSubTopic);
  writeln("bookSubSubTopic with no title set: ");
  writeln("topic: " . $bookSubSubTopic->getTopic());
  writeln("title: " . $bookSubSubTopic->getTitle());
  writeln("");

  $bookSubTopic->setTitle(NULL);
  writeln("bookSubSubTopic with no title for set for bookSubTopic either:");
  writeln("topic: " . $bookSubSubTopic->getTopic());
  writeln("title: " . $bookSubSubTopic->getTitle());
  writeln("");

  writeln("END TESTING CHAIN OF RESPONSIBILITY PATTERN");

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
```

## Output

```
BEGIN TESTING CHAIN OF RESPONSIBILITY PATTERN

bookTopic before title is set:
topic: PHP 5
title: there is no title avaialble


bookTopic after title is set:
topic: PHP 5
title: PHP 5 Recipes by Babin, Good, Kroman, and Stephens


bookSubTopic before title is set:
topic: PHP 5 Patterns
title: PHP 5 Recipes by Babin, Good, Kroman, and Stephens


bookSubTopic after title is set:
topic: PHP 5 Patterns
title: PHP 5 Objects Patterns and Practice by Zandstra


bookSubSubTopic with no title set:
topic: PHP 5 Patterns for Cats
title: PHP 5 Objects Patterns and Practice by Zandstra


bookSubSubTopic with no title for set for bookSubTopic either:
topic: PHP 5 Patterns for Cats
title: PHP 5 Recipes by Babin, Good, Kroman, and Stephens


END TESTING CHAIN OF RESPONSIBILITY PATTERN
```

## See Also

* [Wikipedia: Chain-of-responsibility pattern](https://en.wikipedia.org/wiki/Chain-of-responsibility_pattern)
* [PHPDesignPatterns: Chain of Responsibilities](http://designpatternsphp.readthedocs.io/en/latest/Behavioral/ChainOfResponsibilities/README.html)
