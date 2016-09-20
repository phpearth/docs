---
title: "Strategy design pattern with PHP example"
updated: "August 16, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/strategy/"
---

Define a family of algorithms, encapsulate each one, and make them interchangeable.
Strategy lets the algorithm vary independently from the clients that use it.
Capture the abstraction in an interface, bury implementation details in derived
classes.

## Problem

One of the dominant strategies of object-oriented design is the "open-closed principle".

Figure demonstrates how this is routinely achieved - encapsulate interface details in a base class, and bury implementation details in derived classes. Clients can then couple themselves to an interface, and not have to experience the upheaval associated with change: no impact when the number of derived classes changes, and no impact when the implementation of a derived class changes.

<img src="https://lh5.googleusercontent.com/-BBcQfTx30Ns/VPhr063lqFI/AAAAAAAACLE/zmW4tf_g8lM/w904-h556-no/Strategy1-2x.png">

A generic value of the software community for years has been, "maximize cohesion and minimize coupling". The object-oriented design approach shown in figure is all about minimizing coupling. Since the client is coupled only to an abstraction (i.e. a useful fiction), and not a particular realization of that abstraction, the client could be said to be practicing "abstract coupling" . an object-oriented variant of the more generic exhortation "minimize coupling".

A more popular characterization of this "abstract coupling" principle is "Program to an interface, not an implementation".

Clients should prefer the "additional level of indirection" that an interface (or an abstract base class) affords. The interface captures the abstraction (i.e. the "useful fiction") the client wants to exercise, and the implementations of that interface are effectively hidden.

## Structure

The Interface entity could represent either an abstract base class, or the method signature expectations by the client. In the former case, the inheritance hierarchy represents dynamic polymorphism. In the latter case, the Interface entity represents template code in the client and the inheritance hierarchy represents static polymorphism.

<img src="https://lh5.googleusercontent.com/-NHP-WzXATUc/VPhr0wVa5sI/AAAAAAAACLI/3-0OGruedQM/w890-h593-no/Strategy_-2x.png">

## Example

A Strategy defines a set of algorithms that can be used interchangeably. Modes of transportation to an airport is an example of a Strategy. Several options exist such as driving one's own car, taking a taxi, an airport shuttle, a city bus, or a limousine service. For some airports, subways and helicopters are also available as a mode of transportation to the airport. Any of these modes of transportation will get a traveler to the airport, and they can be used interchangeably. The traveler must chose the Strategy based on tradeoffs between cost, convenience, and time.

<img src="https://lh3.googleusercontent.com/-0HHbsRuQCFA/VPhr1SQnx4I/AAAAAAAACLM/KozexlVyNAM/w877-h593-no/Strategy_example1-2x.png">

## Check list

1. Identify an algorithm (i.e. a behavior) that the client would prefer to access through a "flex point".
2. Specify the signature for that algorithm in an interface.
3. Bury the alternative implementation details in derived classes.
4. Clients of the algorithm couple themselves to the interface.

## Rules

* Strategy is like Template Method except in its granularity.
* State is like Strategy except in its intent.
* Strategy lets you change the guts of an object. Decorator lets you change the skin.
* State, Strategy, Bridge (and to some degree Adapter) have similar solution structures. They all share elements of the 'handle/body' idiom. They differ in intent - that is, they solve different problems.
* Strategy has 2 different implementations, the first is similar to State. The difference is in binding times (Strategy is a bind-once pattern, whereas State is more dynamic).
* Strategy objects often make good Flyweights.

## Code

In the Strategy Pattern a context will choose the appropriate concrete extension
of a class interface.

In this example, the StrategyContext class will set a strategy of StrategyCaps,
StrategyExclaim, or StrategyStars depending on a paramter StrategyContext receives
at instantiation. When the showName() method is called in StrategyContext it will
call the showName() method in the Strategy that it set.

```php
<?php

class StrategyContext
{
    private $strategy = null;

    /**
     * BookList is not instantiated at construct time
     */
    public function __construct($strategy_ind_id)
    {
        switch ($strategy_ind_id) {
            case "C":
                $this->strategy = new StrategyCaps();
            break;
            case "E":
                $this->strategy = new StrategyExclaim();
            break;
            case "S":
                $this->strategy = new StrategyStars();
            break;
        }
    }

    public function showBookTitle($book)
    {
        return $this->strategy->showTitle($book);
    }
}

interface StrategyInterface
{
    public function showTitle($book);
}

class StrategyCaps implements StrategyInterface
{
    public function showTitle($book)
    {
        $title = $book->getTitle();
        $this->titleCount++;

        return strtoupper ($title);
    }
}

class StrategyExclaim implements StrategyInterface
{
    public function showTitle($book)
    {
        $title = $book->getTitle();
        $this->titleCount++;

        return str_replace(' ', '!', $title);
    }
}

class StrategyStars implements StrategyInterface
{
    public function showTitle($book)
    {
        $title = $book->getTitle();
        $this->titleCount++;

        return str_replace(' ', '*', $title);
    }
}

class Book
{
    private $title;
    private $author;

    public function __construct($title, $author)
    {
        $this->title  = $title;
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitleAndAuthor()
    {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

$book = new Book('PHP for Cats', 'Larry Truett');

$strategyContextC = new StrategyContext('C');
$strategyContextE = new StrategyContext('E');
$strategyContextS = new StrategyContext('S');

// Show name with context C
echo $strategyContextC->showBookTitle($book); // PHP FOR CATS

// Show name with context E
echo $strategyContextE->showBookTitle($book); // PHP!for!Cats

// Show name with context S
echo $strategyContextS->showBookTitle($book); // PHP*for*Cats
```
