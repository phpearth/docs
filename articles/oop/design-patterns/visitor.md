---
title: "What is visitor design pattern and how to use it in PHP?"
read_time: "2-4 min"
updated: "Mar 2, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/visitor/"
---

## Intent

Represent an operation to be performed on the elements of an object structure. Visitor lets you define a new operation without changing the classes of the elements on which it operates.
The classic technique for recovering lost type information.
Do the right thing based on the type of two objects.
Double dispatch

## Problem

Many distinct and unrelated operations need to be performed on node objects in a heterogeneous aggregate structure. You want to avoid "polluting" the node classes with these operations. And, you don't want to have to query the type of each node and cast the pointer to the correct type before performing the desired operation.

## Discussion

Visitor's primary purpose is to abstract functionality that can be applied to an aggregate hierarchy of "element" objects. The approach encourages designing lightweight Element classes - because processing functionality is removed from their list of responsibilities. New functionality can easily be added to the original inheritance hierarchy by creating a new Visitor subclass.

Visitor implements "double dispatch". OO messages routinely manifest "single dispatch" - the operation that is executed depends on: the name of the request, and the type of the receiver. In "double dispatch", the operation executed depends on: the name of the request, and the type of TWO receivers (the type of the Visitor and the type of the element it visits).

The implementation proceeds as follows. Create a Visitor class hierarchy that defines a pure virtual visit() method in the abstract base class for each concrete derived class in the aggregate node hierarchy. Each visit() method accepts a single argument - a pointer or reference to an original Element derived class.

Each operation to be supported is modelled with a concrete derived class of the Visitor hierarchy. The visit() methods declared in the Visitor base class are now defined in each derived subclass by allocating the "type query and cast" code in the original implementation to the appropriate overloaded visit() method.

Add a single pure virtual accept() method to the base class of the Element hierarchy. accept() is defined to receive a single argument - a pointer or reference to the abstract base class of the Visitor hierarchy.

Each concrete derived class of the Element hierarchy implements the accept() method by simply calling the visit() method on the concrete derived instance of the Visitor hierarchy that it was passed, passing its "this" pointer as the sole argument.

Everything for "elements" and "visitors" is now set-up. When the client needs an operation to be performed, (s)he creates an instance of the Vistor object, calls the accept() method on each Element object, and passes the Visitor object.

The accept() method causes flow of control to find the correct Element subclass. Then when the visit() method is invoked, flow of control is vectored to the correct Visitor subclass. accept() dispatch plus visit() dispatch equals double dispatch.

The Visitor pattern makes adding new operations (or utilities) easy - simply add a new Visitor derived class. But, if the subclasses in the aggregate node hierarchy are not stable, keeping the Visitor subclasses in sync requires a prohibitive amount of effort.

An acknowledged objection to the Visitor pattern is that is represents a regression to functional decomposition - separate the algorithms from the data structures. While this is a legitimate interpretation, perhaps a better perspective/rationale is the goal of promoting non-traditional behavior to full object status.

## Structure

The Element hierarchy is instrumented with a "universal method adapter". The implementation of accept() in each Element derived class is always the same. But – it cannot be moved to the Element base class and inherited by all derived classes because a reference to this in the Element class always maps to the base type Element.
<img src="https://lh4.googleusercontent.com/-e7IXFFSh4S0/VPP22SdRVBI/AAAAAAAACJE/iNi2SODKiCE/w1208-h679-no/Visitor1-2x.png">
When the polymorphic firstDispatch() method is called on an abstract First object, the concrete type of that object is "recovered". When the polymorphic secondDispatch() method is called on an abstract Second object, its concrete type is "recovered". The application functionality appropriate for this pair of types can now be exercised.
<img src="https://lh3.googleusercontent.com/-JzUSPMfFxww/VPP22of978I/AAAAAAAACJM/aXrmyPT1POA/w1046-h679-no/Visitor_1-2x.png">

## Example

The Visitor pattern represents an operation to be performed on the elements of an object structure without changing the classes on which it operates. This pattern can be observed in the operation of a taxi company. When a person calls a taxi company (accepting a visitor), the company dispatches a cab to the customer. Upon entering the taxi the customer, or Visitor, is no longer in control of his or her own transportation, the taxi (driver) is.
<img src="https://lh4.googleusercontent.com/-uGvg2ZtIZlM/VPP22o8cAfI/AAAAAAAACJI/8TXJilkmKQo/w812-h679-no/Visitor_example1-2x.png">

## Check list

1. Confirm that the current hierarchy (known as the Element hierarchy) will be fairly stable and that the public interface of these classes is sufficient for the access the Visitor classes will require. If these conditions are not met, then the Visitor pattern is not a good match.
2. Create a Visitor base class with a visit(ElementXxx) method for each Element derived type.
3. Add an accept(Visitor) method to the Element hierarchy. The implementation in each Element derived class is always the same – accept( Visitor v ) { v.visit( this ); }. Because of cyclic dependencies, the declaration of the Element and Visitor classes will need to be interleaved.
4. The Element hierarchy is coupled only to the Visitor base class, but the Visitor hierarchy is coupled to each Element derived class. If the stability of the Element hierarchy is low, and the stability of the Visitor hierarchy is high; consider swapping the 'roles' of the two hierarchies.
5. Create a Visitor derived class for each "operation" to be performed on Element objects. visit() implementations will rely on the Element's public interface.
6. The client creates Visitor objects and passes each to Element objects by calling accept().

## Rules

* The abstract syntax tree of Interpreter is a Composite (therefore Iterator and Visitor are also applicable).
* Iterator can traverse a Composite. Visitor can apply an operation over a Composite.
* The Visitor pattern is like a more powerful Command pattern because the visitor may initiate whatever is appropriate for the kind of object it encounters.
* The Visitor pattern is the classic technique for recovering lost type information without resorting to dynamic casts.

## Code

In the Visitor pattern, one class calls a function in another class with the current instance of itself. The called class has special functions for each class that can call it.

In this example, the BookVisitee can call the visitBook function in any function extending the Visitor class. By doing this new Visitors which format the BookVisitee information can easily be added without changing the BookVisitee at all.

```php
<?php

abstract class Visitee {
    abstract function accept(Visitor $visitorIn);
}

class BookVisitee extends Visitee {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {return $this->author;}
    function getTitle() {return $this->title;}
    function accept(Visitor $visitorIn) {
        $visitorIn->visitBook($this);
    }
}

class SoftwareVisitee extends Visitee {
    private $title;
    private $softwareCompany;
    private $softwareCompanyURL;
    function __construct($title_in, $softwareCompany_in, $softwareCompanyURL_in) {
        $this->title  = $title_in;
        $this->softwareCompany = $softwareCompany_in;
        $this->softwareCompanyURL = $softwareCompanyURL_in;
    }
    function getSoftwareCompany() {return $this->softwareCompany;}
    function getSoftwareCompanyURL() {return $this->softwareCompanyURL;}
    function getTitle() {return $this->title;}
    function accept(Visitor $visitorIn) {
        $visitorIn->visitSoftware($this);
    }
}

abstract class Visitor {
    abstract function visitBook(BookVisitee $bookVisitee_In);
    abstract function visitSoftware(SoftwareVisitee $softwareVisitee_In);
}

class PlainDescriptionVisitor extends Visitor {  
    private $description = NULL;
    function getDescription() {
        return $this->description;
    }
    function setDescription($descriptionIn) { 
        $this->description = $descriptionIn;
    }
    function visitBook(BookVisitee $bookVisiteeIn) {
        $this->setDescription($bookVisiteeIn->getTitle().'. written by '.$bookVisiteeIn->getAuthor());
    }
    function visitSoftware(SoftwareVisitee $softwareVisiteeIn) {
        $this->setDescription($softwareVisiteeIn->getTitle().
           '. made by '.$softwareVisiteeIn->getSoftwareCompany().
           '. website at '.$softwareVisiteeIn->getSoftwareCompanyURL());
    }
}

class FancyDescriptionVisitor extends Visitor {
    private $description = NULL;
    function getDescription() { return $this->description; }
    function setDescription($descriptionIn) { 
      $this->description = $descriptionIn;
    }
    function visitBook(BookVisitee $bookVisiteeIn) {
        $this->setDescription($bookVisiteeIn->getTitle().
            '...!*@*! written !*! by !@! '.$bookVisiteeIn->getAuthor());
    }
    function visitSoftware(SoftwareVisitee $softwareVisiteeIn) {
        $this->setDescription($softwareVisiteeIn->getTitle().
            '...!!! made !*! by !@@! '.$softwareVisiteeIn->getSoftwareCompany().
            '...www website !**! at http://'.$softwareVisiteeIn->getSoftwareCompanyURL());
    }
}

  writeln('BEGIN TESTING VISITOR PATTERN');
  writeln('');
 
  $book = new BookVisitee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
  $software = new SoftwareVisitee('Zend Studio', 'Zend Technologies', 'www.zend.com');

  $plainVisitor = new PlainDescriptionVisitor();
 
  acceptVisitor($book,$plainVisitor);
  writeln('plain description of book: '.$plainVisitor->getDescription());
  acceptVisitor($software,$plainVisitor);
  writeln('plain description of software: '.$plainVisitor->getDescription());
  writeln('');
 
  $fancyVisitor = new FancyDescriptionVisitor();
 
  acceptVisitor($book,$fancyVisitor);
  writeln('fancy description of book: '.$fancyVisitor->getDescription());
  acceptVisitor($software,$fancyVisitor);
  writeln('fancy description of software: '.$fancyVisitor->getDescription());

  writeln('END TESTING VISITOR PATTERN');

  //double dispatch any visitor and visitee objects
  function acceptVisitor(Visitee $visitee_in, Visitor $visitor_in) {
    $visitee_in->accept($visitor_in);
  }
   function writeln($line_in) {
    echo $line_in."<br/>";
  }
```
  
## Output

```
BEGIN TESTING VISITOR PATTERN

plain description of book: Design Patterns
. written by Gamma, Helm, Johnson, and Vlissides
plain description of software: Zend Studio
. made by Zend Technologies
. website at www.zend.com

fancy description of book: Design Patterns
...!*@*! written !*! by !@! Gamma, Helm, Johnson, and Vlissides
fancy description of software: Zend Studio
...!!! made !*! by !@@! Zend Technologies
...www website !**! at http://www.zend.com

END TESTING VISITOR PATTERN
```
