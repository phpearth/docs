---
title: "What is template method design pattern and how to use it in PHP?"
read_time: "2-5 min"
updated: "Mar 20, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/template-method/"
---

## Intent

* Define the skeleton of an algorithm in an operation, deferring some steps to client subclasses. Template Method lets subclasses redefine certain steps of an algorithm without changing the algorithm's structure.
* Base class declares algorithm 'placeholders', and derived classes implement the placeholders.

## Problem

Two different components have significant similarities, but demonstrate no reuse of common interface or implementation. If a change common to both components becomes necessary, duplicate effort must be expended.

## Discussion

The component designer decides which steps of an algorithm are invariant (or standard), and which are variant (or customizable). The invariant steps are implemented in an abstract base class, while the variant steps are either given a default implementation, or no implementation at all. The variant steps represent "hooks", or "placeholders", that can, or must, be supplied by the component's client in a concrete derived class.

The component designer mandates the required steps of an algorithm, and the ordering of the steps, but allows the component client to extend or replace some number of these steps.

Template Method is used prominently in frameworks. Each framework implements the invariant pieces of a domain's architecture, and defines "placeholders" for all necessary or interesting client customization options. In so doing, the framework becomes the "center of the universe", and the client customizations are simply "the third rock from the sun". This inverted control structure has been affectionately labelled "the Hollywood principle" - "don't call us, we'll call you".

## Structure

<img src="https://lh5.googleusercontent.com/-gGSqQl67U0c/VQvjkkWFpjI/AAAAAAAAAFw/FrmJE3VTg8c/w838-h514-no/Template_Method-2x.png">
The implementation of template_method() is: call step_one(), call step_two(), and call step_three(). step_two() is a "hook" method – a placeholder. It is declared in the base class, and then defined in derived classes. Frameworks (large scale reuse infrastructures) use Template Method a lot. All reusable code is defined in the framework's base classes, and then clients of the framework are free to define customizations by creating derived classes as needed.
<img src="https://lh3.googleusercontent.com/-NfFPDW797nc/VQvjleCm3fI/AAAAAAAAAF8/HzRnR9B9nH0/w920-h514-no/Template_Method_-2x.png">

## Example

The Template Method defines a skeleton of an algorithm in an operation, and defers some steps to subclasses. Home builders use the Template Method when developing a new subdivision. A typical subdivision consists of a limited number of floor plans with different variations available for each. Within a floor plan, the foundation, framing, plumbing, and wiring will be identical for each house. Variation is introduced in the later stages of construction to produce a wider variety of models.

Another example: daily routine of a worker.
<img src="https://lh3.googleusercontent.com/-N8x44kEKGQo/VQvjluqn3EI/AAAAAAAAAGA/rTeQhXgB948/w704-h725-no/Template_method_example-2x.png">

## Check list

1. Examine the algorithm, and decide which steps are standard and which steps are peculiar to each of the current classes.
2. Define a new abstract base class to host the "don't call us, we'll call you" framework.
3. Move the shell of the algorithm (now called the "template method") and the definition of all standard steps to the new base class.
4. Define a placeholder or "hook" method in the base class for each step that requires many different implementations. This method can host a default implementation – or – it can be defined as abstract (Java) or pure virtual (C++).
5. Invoke the hook method(s) from the template method.
6. Each of the existing classes declares an "is-a" relationship to the new abstract base class.
7. Remove from the existing classes all the implementation details that have been moved to the base class.
8. The only details that will remain in the existing classes will be the implementation details peculiar to each derived class.

## Rules

* Strategy is like Template Method except in its granularity.
* Template Method uses inheritance to vary part of an algorithm. Strategy uses delegation to vary the entire algorithm.
* Strategy modifies the logic of individual objects. Template Method modifies the logic of an entire class.
* Factory Method is a specialization of Template Method.

## Code
In the Template Pattern an abstract class will define a method with an algorithm, and methods which the algorithm will use. The methods the algorithm uses can be either required or optional. The optional method should by default do nothing.

The Template Pattern is unusual in that the Parent class has a lot of control.

In this example, the TemplateAbstract class has the showBookTitleInfo() method, which will call the methods getTitle() and getAuthor(). The method getTitle() must be overridden, while the method getAuthor() is not required.

```php
<?php

abstract class TemplateAbstract {
    //the template method 
    //  sets up a general algorithm for the whole class 
    public final function showBookTitleInfo($book_in) {
        $title = $book_in->getTitle();
        $author = $book_in->getAuthor();
        $processedTitle = $this->processTitle($title);
        $processedAuthor = $this->processAuthor($author);
        if (NULL == $processedAuthor) {
            $processed_info = $processedTitle;
        } else {
            $processed_info = $processedTitle.' by '.$processedAuthor;
        }
        return $processed_info;
    }
    //the primitive operation
    //  this function must be overridded
    abstract function processTitle($title);
    //the hook operation
    //  this function may be overridden, 
    //  but does nothing if it is not
    function processAuthor($author) {
        return NULL;
    } 
}

class TemplateExclaim extends TemplateAbstract {
    function processTitle($title) {
      return Str_replace(' ','!!!',$title); 
    }
    function processAuthor($author) {
      return Str_replace(' ','!!!',$author);
    }
}

class TemplateStars extends TemplateAbstract {
    function processTitle($title) {
        return Str_replace(' ','*',$title); 
    }
}

class Book {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {return $this->author;}
    function getTitle() {return $this->title;}
    function getAuthorAndTitle() {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}

  writeln('BEGIN TESTING TEMPLATE PATTERN');
  writeln('');
 
  $book = new Book('PHP for Cats','aaryadev');
 
  $exclaimTemplate = new TemplateExclaim();  
  $starsTemplate = new TemplateStars();
 
  writeln('test 1 - show exclaim template');
  writeln($exclaimTemplate->showBookTitleInfo($book));
  writeln('');

  writeln('test 2 - show stars template');
  writeln($starsTemplate->showBookTitleInfo($book));
  writeln('');

  writeln('END TESTING TEMPLATE PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
```

## Output

```
BEGIN TESTING TEMPLATE PATTERN

test 1 - show exclaim template
PHP!!!for!!!Cats by aaryadev

test 2 - show stars template
PHP*for*Cats

END TESTING TEMPLATE PATTERN
```
