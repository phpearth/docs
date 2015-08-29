---
title: "What is command design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "Feb 27, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/command/"
---

## Intent

Encapsulate a request as an object, thereby letting you parameterize clients with different requests, queue or log requests, and support undoable operations.
Promote "invocation of a method on an object" to full object status
An object-oriented callback

## Problem

Need to issue requests to objects without knowing anything about the operation being requested or the receiver of the request.

## Discussion

Command decouples the object that invokes the operation from the one that knows how to perform it. To achieve this separation, the designer creates an abstract base class that maps a receiver (an object) with an action (a pointer to a member function). The base class contains an execute() method that simply calls the action on the receiver.

All clients of Command objects treat each object as a "black box" by simply invoking the object's virtual execute() method whenever the client requires the object's "service".

A Command class holds some subset of the following: an object, a method to be applied to the object, and the arguments to be passed when the method is applied. The Command's "execute" method then causes the pieces to come together.

Sequences of Command objects can be assembled into composite (or macro) commands.

## Structure

The client that creates a command is not the same client that executes it. This separation provides flexibility in the timing and sequencing of commands. Materializing commands as objects means they can be passed, staged, shared, loaded in a table, and otherwise instrumented or manipulated like any other object.
<img src="https://lh4.googleusercontent.com/-qnoH7vyJpyk/VO91KdBxN5I/AAAAAAAACEA/GJVFsYpNecI/w1044-h583-no/Command-2x.png">
Command objects can be thought of as "tokens" that are created by one client that knows what need to be done, and passed to another client that has the resources for doing it.

## Example

The Command pattern allows requests to be encapsulated as objects, thereby allowing clients to be parameterized with different requests. The "check" at a diner is an example of a Command pattern. The waiter or waitress takes an order or command from a customer and encapsulates that order by writing it on the check. The order is then queued for a short order cook. Note that the pad of "checks" used by each waiter is not dependent on the menu, and therefore they can support commands to cook many different items.

<img src="https://lh5.googleusercontent.com/-DRppgSme8Xw/VO91KHrwpGI/AAAAAAAACD8/X9zOgsMMjIk/w964-h522-no/Command_example1-2x.png">

## Check list

1. Define a Command interface with a method signature like execute().
2. Create one or more derived classes that encapsulate some subset of the following: a "receiver" object, the method to invoke, the arguments to pass.
3. Instantiate a Command object for each deferred execution request.
4. Pass the Command object from the creator (aka sender) to the invoker (aka receiver).
5. The invoker decides when to execute().

## Rules of thumb

* Chain of Responsibility, Command, Mediator, and Observer, address how you can decouple senders and receivers, but with different trade-offs. Command normally specifies a sender-receiver connection with a subclass.
* Chain of Responsibility can use Command to represent requests as objects.
* Command and Memento act as magic tokens to be passed around and invoked at a later time. In Command, the token represents a request; in Memento, it represents the internal state of an object at a particular time. Polymorphism is important to Command, but not to Memento because its interface is so narrow that a memento can only be passed as a value.
* Command can use Memento to maintain the state required for an undo operation.
* MacroCommands can be implemented with Composite.
* A Command that must be copied before being placed on a history list acts as a Prototype.
* Two important aspects of the Command pattern: interface separation (the invoker is isolated from the receiver), time separation (stores a ready-to-go processing request that's to be stated later).

In the Command Pattern an object encapsulates everything needed to execute a method in another object.

In this example, a BookStarsOnCommand object is instantiated with an instance of the BookComandee class. The BookStarsOnCommand object will call that BookComandee object's bookStarsOn() function when it's execute() function is called.

## PHP code

```php
<?php

class BookCommandee {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->setAuthor($author_in);
        $this->setTitle($title_in);
    }
    function getAuthor() {
        return $this->author;
    }
    function setAuthor($author_in) {
        $this->author = $author_in;
    }
    function getTitle() {
        return $this->title;
    }
    function setTitle($title_in) {
        $this->title = $title_in;
    }
    function setStarsOn() {
        $this->setAuthor(Str_replace(' ','*',$this->getAuthor()));
        $this->setTitle(Str_replace(' ','*',$this->getTitle()));
    }
    function setStarsOff() {
        $this->setAuthor(Str_replace('*',' ',$this->getAuthor()));
        $this->setTitle(Str_replace('*',' ',$this->getTitle()));
    }
    function getAuthorAndTitle() {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

abstract class BookCommand {
    protected $bookCommandee;
    function __construct($bookCommandee_in) {
        $this->bookCommandee = $bookCommandee_in;
    }
    abstract function execute();
}

class BookStarsOnCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOn();
    }
}

class BookStarsOffCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOff();
    }
}
```

## Testing

```php
echo 'BEGIN TESTING COMMAND PATTERN<br>';
  $book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
 echo 'book after creation: <br>';
 echo $book->getAuthorAndTitle();
 echo '<br>';
 
  $starsOn = new BookStarsOnCommand($book);
  callCommand($starsOn);
 echo 'book after stars on: <br>';
 echo $book->getAuthorAndTitle();
 echo '<br>';
 
  $starsOff = new BookStarsOffCommand($book);
  callCommand($starsOff);
echo 'book after stars off:<br> ';
  echo $book->getAuthorAndTitle();
 echo '<br>';

ecgo 'END TESTING COMMAND PATTERN';
 
  // the callCommand function demonstrates that a specified
  // function in BookCommandee can be executed with only 
  // an instance of BookCommand.
  function callCommand(BookCommand $bookCommand_in) {
    $bookCommand_in->execute();
  }
```

## Output

```
BEGIN TESTING COMMAND PATTERN

book after creation: 
Design Patterns by Gamma, Helm, Johnson, and Vlissides

book after stars on: 
Design*Patterns by Gamma,*Helm,*Johnson,*and*Vlissides

book after stars off: 
Design Patterns by Gamma, Helm, Johnson, and Vlissides

END TESTING COMMAND PATTERN
```
