---
title: "What is facade design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "Mar 15, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/facade/"
---

## Intent

Provide a unified interface to a set of interfaces in a subsystem. Facade defines a higher-level interface that makes the subsystem easier to use.
Wrap a complicated subsystem with a simpler interface.

## Problem

A segment of the client community needs a simplified interface to the overall functionality of a complex subsystem.

## Discussion

Facade discusses encapsulating a complex subsystem within a single interface object. This reduces the learning curve necessary to successfully leverage the subsystem. It also promotes decoupling the subsystem from its potentially many clients. On the other hand, if the Facade is the only access point for the subsystem, it will limit the features and flexibility that "power users" may need.

The Facade object should be a fairly simple advocate or facilitator. It should not become an all-knowing oracle or "god" object.

## Structure

Facade takes a "riddle wrapped in an enigma shrouded in mystery", and interjects a wrapper that tames the amorphous and inscrutable mass of software.

<img src="https://lh4.googleusercontent.com/-u8FvmDBBolw/VQSAoRq3ZJI/AAAAAAAAAEs/TmCUmAqFh_E/w689-h593-no/Facade1-2x.png">

SubsystemOne and SubsystemThree do not interact with the internal components of SubsystemTwo. They use the SubsystemTwoWrapper "facade" (i.e. the higher level abstraction).
<img src="https://lh4.googleusercontent.com/-H3J53IqjLjo/VQSAoePGRKI/AAAAAAAAAE0/mZahDdPGoD4/w668-h593-no/Facade_1-2x.png">

## Example

The Facade defines a unified, higher level interface to a subsystem that makes it easier to use. Consumers encounter a Facade when ordering from a catalog. The consumer calls one number and speaks with a customer service representative. The customer service representative acts as a Facade, providing an interface to the order fulfillment department, the billing department, and the shipping department.

<img src="https://lh3.googleusercontent.com/-n6DlqV-zigI/VQSAoRsweYI/AAAAAAAAAEw/r5T4nsaulUY/w864-h550-no/Facade_example1-2x.png">

## Check list

1. Identify a simpler, unified interface for the subsystem or component.
2. Design a 'wrapper' class that encapsulates the subsystem.
3. The facade/wrapper captures the complexity and collaborations of the component, and delegates to the appropriate methods.
4. The client uses (is coupled to) the Facade only.
5. Consider whether additional Facades would add value.

## Rules

* Facade defines a new interface, whereas Adapter uses an old interface. Remember that Adapter makes two existing interfaces work together as opposed to defining an entirely new one.
* Whereas Flyweight shows how to make lots of little objects, Facade shows how to make a single object represent an entire subsystem.
* Mediator is similar to Facade in that it abstracts functionality of existing classes. Mediator abstracts/centralizes arbitrary communications between colleague objects. It routinely "adds value", and it is known/referenced by the colleague objects. In contrast, Facade defines a simpler interface to a subsystem, it doesn't add new functionality, and it is not known by the subsystem classes.
* Abstract Factory can be used as an alternative to Facade to hide platform-specific classes.
Facade objects are often Singletons because only one Facade object is required.
* Adapter and Facade are both wrappers; but they are different kinds of wrappers. The intent of Facade is to produce a simpler interface, and the intent of Adapter is to design to an existing interface. While Facade routinely wraps multiple objects and Adapter wraps a single object; Facade could front-end a single complex object and Adapter could wrap several legacy objects.

## Question

So the way to tell the difference between the Adapter pattern and the Facade pattern is that the Adapter wraps one class and the Facade may represent many classes?

## Answer

No! Remember, the Adapter pattern changes the interface of one or more classes into one interface that a client is expecting. While most textbook examples show the adapter adapting one class, you may need to adapt many classes to provide the interface a client is coded to. Likewise, a Facade may provide a simplified interface to a single class with a very complex interface. The difference between the two is not in terms of how many classes they "wrap", it is in their intent.

## Code

In the facade pattern a class hides a complex subsystem from a calling class. In turn, the complex subsystem will know nothing of the calling class.

In this example, the CaseReverseFacade class will call a subsystem to reverse the case of a string passed from the Book class. The subsystem is controlled by the reverseCase function in the CaseReverseFacade, which in turn calls functions in the ArrayCaseReverse and ArrayStringFunctions classes. As written, the CaseReverseFacade can reverse the case of any string, but it could easily be changed to only reverse a single element of a single class.

In my example I make all elements of the Facade and the subsystem static. This could also easily be changed.

~~~php
<?php

class Book {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
    function getAuthorAndTitle() {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

class CaseReverseFacade {
    public static function reverseStringCase($stringIn) {
        $arrayFromString = ArrayStringFunctions::stringToArray($stringIn);
        $reversedCaseArray = ArrayCaseReverse::reverseCase($arrayFromString);
        $reversedCaseString = ArrayStringFunctions::arrayToString($reversedCaseArray);
        return $reversedCaseString;
    }
}

class ArrayCaseReverse {
    private static $uppercase_array =
             ['A', 'B', 'C', 'D', 'E', 'F',
              'G', 'H', 'I', 'J', 'K', 'L',
              'M', 'N', 'O', 'P', 'Q', 'R',
              'S', 'T', 'U', 'V', 'W', 'X',
              'Y', 'Z'];
    private static $lowercase_array =
        ['a', 'b', 'c', 'd', 'e', 'f',
              'g', 'h', 'i', 'j', 'k', 'l',
              'm', 'n', 'o', 'p', 'q', 'r',
              's', 't', 'u', 'v', 'w', 'x',
              'y', 'z'];
    public static function reverseCase($arrayIn) {
        $array_out = [];
        for ($x = 0; $x < count($arrayIn); $x++) {
         if (in_array($arrayIn[$x], self::$uppercase_array)) {
                 $key = array_search($arrayIn[$x], self::$uppercase_array);
         $array_out[$x] = self::$lowercase_array[$key];
         } elseif (in_array($arrayIn[$x], self::$lowercase_array)) {
                 $key = array_search($arrayIn[$x], self::$lowercase_array);
         $array_out[$x] = self::$uppercase_array[$key];
             } else {
         $array_out[$x] = $arrayIn[$x];
             }
        }
    return $array_out;
    }
}

class ArrayStringFunctions {
    public static function arrayToString($arrayIn) {
      $string_out = NULL;
      foreach ($arrayIn as $oneChar) {
        $string_out .= $oneChar;
      }
      return $string_out;
    }
    public static function stringToArray($stringIn) {
      return str_split($stringIn);
    }
}


  witeln('BEGIN TESTING FACADE PATTERN');
  witeln('');

  $book = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

  witeln('Original book title: '.$book->getTitle());
  witeln('');

  $bookTitleReversed = CaseReverseFacade::reverseStringCase($book->getTitle());  

  writeln('Reversed book title: '.$bookTitleReversed);
  witeln('');

  writeln('END TESTING FACADE PATTERN');

  function writeln($line_in) {
    echo $line_in."&lt;br/&gt;";
  }
~~~

## Output

~~~
BEGIN TESTING FACADE PATTERN

Original book title: Design Patterns

Reversed book title: dESIGNpATTERNS

END TESTING FACADE PATTERN
~~~
