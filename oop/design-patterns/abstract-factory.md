---
title: "Abstract Factory Design Pattern in PHP"
updated: "September 21, 2016"
permalink: "/articles/object-oriented-programming/design-patterns/abstract-factory/"
redirect_from: "/faq/object-oriented-programming/design-patterns/abstract-factory/"
---

* Provide an interface for creating families of related or dependent objects
    without specifying their concrete classes.
* A hierarchy that encapsulates: many possible "platforms", and the construction
    of a suite of "products".
* The new operator considered harmful.

## Problem

If an application is to be portable, it needs to encapsulate platform dependencies.
These "platforms" might include: windowing system, operating system, database,
etc. Too often, this encapsulation is not engineered in advance, and lots of if
case statements with options for all currently supported platforms begin to
procreate like rabbits throughout the code.

## Discussion

Provide a level of indirection that abstracts the creation of families of related
or dependent objects without directly specifying their concrete classes. The
"factory" object has the responsibility for providing creation services for the
entire platform family. Clients never create platform objects directly, they ask
the factory to do that for them.

This mechanism makes exchanging product families easy because the specific class
of the factory object appears only once in the application - where it is
instantiated. The application can wholesale replace the entire family of products
simply by instantiating a different concrete instance of the abstract factory.

Because the service provided by the factory object is so pervasive, it is
routinely implemented as a Singleton.

## Structure

The Abstract Factory defines a Factory Method per product. Each Factory Method
encapsulates the new operator and the concrete, platform-specific, product classes.
Each "platform" is then modeled with a Factory derived class.

<img src="https://lh6.googleusercontent.com/kC5Nbfhw9Dod4e6CEfMMqO94InGNo5zH-er4-dMSgHk=w755-h547-no">

## Example

The purpose of the Abstract Factory is to provide an interface for creating families of related objects, without specifying concrete classes. This pattern is found in the sheet metal stamping equipment used in the manufacture of Japanese automobiles. The stamping equipment is an Abstract Factory which creates auto body parts. The same machinery is used to stamp right hand doors, left hand doors, right front fenders, left front fenders, hoods, etc. for different models of cars. Through the use of rollers to change the stamping dies, the concrete classes produced by the machinery can be changed within three minutes.

<img src="https://lh6.googleusercontent.com/-cvjlEuOs6MI/VOi2pwwtTtI/AAAAAAAAB_o/X9KCjbqUQjQ/w736-h547-no/Abstract_Factory_example1-2x.png">

## Check list

* Decide if "platform independence" and creation services are the current source of pain.
* Map out a matrix of "platforms" versus "products".
* Define a factory interface that consists of a factory method per product.
* Define a factory derived class for each platform that encapsulates all references to the new operator.
* The client should retire all references to new, and use the factory methods to  create the product objects.

## Rules of thumb

* Sometimes creational patterns are competitors: there are cases when either Prototype or Abstract Factory could be used profitably. At other times they are complementary: Abstract Factory might store a set of Prototypes from which to clone and return product objects, Builder can use one of the other patterns to implement which components get built. Abstract Factory, Builder, and Prototype can use Singleton in their implementation.
* Abstract Factory, Builder, and Prototype define a factory object that's responsible for knowing and creating the class of product objects, and make it a parameter of the system. Abstract Factory has the factory object producing objects of several classes. Builder has the factory object building a complex product incrementally using a correspondingly complex protocol. Prototype has the factory object (aka prototype) building a product by copying a prototype object.
* Abstract Factory classes are often implemented with Factory Methods, but they can also be implemented using Prototype.
* Abstract Factory can be used as an alternative to Facade to hide platform-specific classes.
* Builder focuses on constructing a complex object step by step. Abstract Factory emphasizes a family of product objects (either simple or complex). Builder returns the product as a final step, but as far as the Abstract Factory is concerned, the product gets returned immediately.
* Often, designs start out using Factory Method (less complicated, more customizable, subclasses proliferate) and evolve toward Abstract Factory, Prototype, or Builder (more flexible, more complex) as the designer discovers where more flexibility is needed.

## Example

In the Abstract Factory Pattern, an abstract factory defines what objects the non-abstract or concrete factory will need to be able to create.

The concrete factory must create the correct objects for it's context, insuring that all objects created by the concrete factory have been chosen to be able to work correctly for a given circumstance.

In this example we have an abstract factory, AbstractBookFactory, that specifies two classes, AbstractPHPBook and AbstractMySQLBook, which will need to be created by the concrete factory.

The concrete class OReillyBookfactory extends AbstractBookFactory, and can create the OReillyMySQLBook and OReillyPHPBook classes, which are the correct classes for the context of OReilly.

```php
<?php

abstract class AbstractBookFactory
{
    abstract function makePHPBook();
    abstract function makeMySQLBook();
}

class OReillyBookFactory extends AbstractBookFactory
{
    private $context = 'OReilly';

    public function makePHPBook()
    {
        return new OReillyPHPBook();
    }

    public function makeMySQLBook()
    {
        return new OReillyMySQLBook();
    }
}

class SamsBookFactory extends AbstractBookFactory
{
    private $context = 'Sams';

    public function makePHPBook()
    {
        return new SamsPHPBook();
    }

    public function makeMySQLBook()
    {
        return new SamsMySQLBook();
    }
}

abstract class AbstractBook
{
    abstract function getAuthor();
    abstract function getTitle();
}

abstract class AbstractMySQLBook extends AbstractBook
{
    private $subject = 'MySQL';
}

class OReillyMySQLBook extends AbstractMySQLBook
{
    private $author;
    private $title;

    public function __construct()
    {
        $this->author = 'George Reese, Randy Jay Yarger, and Tim King';
        $this->title = 'Managing and Using MySQL';
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

class SamsMySQLBook extends AbstractMySQLBook
{
    private $author;
    private $title;

    public function __construct()
    {
        $this->author = 'Paul Dubois';
        $this->title = 'MySQL, 3rd Edition';
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

abstract class AbstractPHPBook extends AbstractBook
{
    private $subject = 'PHP';
}

class OReillyPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;
    private static $oddOrEven = 'odd';

    public function __construct()
    {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title = 'Programming PHP';
            self::$oddOrEven = 'even';
        } else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title = 'PHP Cookbook';
            self::$oddOrEven = 'odd';
        }
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

class SamsPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;

    public function __construct()
    {
        //alternate randomly between 2 books
        mt_srand((double)microtime() * 10000000);
        $rand_num = mt_rand(0, 1);

        if (1 > $rand_num) {
            $this->author = 'George Schlossnagle';
            $this->title = 'Advanced PHP Programming';
        } else {
            $this->author = 'Christian Wenz';
            $this->title = 'PHP Phrasebook';
        }
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

$bookFactoryInstance = new OReillyBookFactory;
testConcreteFactory($bookFactoryInstance);

$bookFactoryInstance = new SamsBookFactory;
testConcreteFactory($bookFactoryInstance);

function testConcreteFactory($bookFactoryInstance) {
    $phpBookOne = $bookFactoryInstance->makePHPBook();
    echo 'first php Author: '.$phpBookOne->getAuthor();
    echo 'first php Title: '.$phpBookOne->getTitle();

    $phpBookTwo = $bookFactoryInstance->makePHPBook();
    echo 'second php Author: '.$phpBookTwo->getAuthor();
    echo 'second php Title: '.$phpBookTwo->getTitle();

    $mySqlBook = $bookFactoryInstance->makeMySQLBook();
    echo 'MySQL Author: '.$mySqlBook->getAuthor();
    echo 'MySQL Title: '.$mySqlBook->getTitle();
}

first php Author: Rasmus Lerdorf and Kevin Tatroe
first php Title: Programming PHP
second php Author: David Sklar and Adam Trachtenberg
second php Title: PHP Cookbook
MySQL Author: George Reese, Randy Jay Yarger, and Tim King
MySQL Title: Managing and Using MySQL

testing SamsBookFactory
first php Author: Christian Wenz
first php Title: PHP Phrasebook
second php Author: George Schlossnagle
second php Title: Advanced PHP Programming
MySQL Author: Paul Dubois
MySQL Title: MySQL, 3rd Edition
```

## See Also

* [Wikipedia: Abstract factory design pattern](https://en.wikipedia.org/wiki/Abstract_factory_pattern)
* [DesignPatternsPHP: Abstract Factory](http://designpatternsphp.readthedocs.io/en/latest/Creational/AbstractFactory/README.html)
