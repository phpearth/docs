---
title: "Builder design pattern in PHP"
updated: "August 16, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/builder/"
---

Separate the construction of a complex object from its representation so that the
same construction process can create different representations. Parse a complex
representation, create one of several targets.

## Problem

An application needs to create the elements of a complex aggregate. The
specification for the aggregate exists on secondary storage and one of many
representations needs to be built in primary storage.

## Discussion

Separate the algorithm for interpreting (i.e. reading and parsing) a stored
persistence mechanism (e.g. RTF files) from the algorithm for building and
representing one of many target products (e.g. ASCII, TeX, text widget). The
focus/distinction is on creating complex aggregates.

The "director" invokes "builder" services as it interprets the external format.
The "builder" creates part of the complex object each time it is called and
maintains all intermediate state. When the product is finished, the client
retrieves the result from the "builder".

Affords finer control over the construction process. Unlike creational patterns
that construct products in one shot, the Builder pattern constructs the product
step by step under the control of the "director".

## Structure

The Reader encapsulates the parsing of the common input. The Builder hierarchy
makes possible the polymorphic creation of many peculiar representations or
targets.

<img src="https://lh4.googleusercontent.com/-eN4ErAC4hKw/VQRs7t7ziCI/AAAAAAAAAEM/tT0qePHotDo/w749-h593-no/Builder-2x.png">

## Example

The Builder pattern separates the construction of a complex object from its
representation so that the same construction process can create different
representations. This pattern is used by fast food restaurants to construct
children's meals. Children's meals typically consist of a main item, a side item,
a drink, and a toy (e.g., a hamburger, fries, Coke, and toy dinosaur). Note that
there can be variation in the content of the children's meal, but the construction
process is the same. Whether a customer orders a hamburger, cheeseburger, or
chicken, the process is the same. The employee at the counter directs the crew
to assemble a main item, side item, and toy. These items are then placed in a
bag. The drink is placed in a cup and remains outside of the bag. This same
process is used at competing restaurants.

<img src="https://lh3.googleusercontent.com/-v4LvBgk0Q7A/VQRs78nKq9I/AAAAAAAAAEI/aYC086Y1hqI/w656-h593-no/Builder_example1-2x.png">

## Check list

1. Decide if a common input and many possible representations (or outputs) is the problem at hand.
2. Encapsulate the parsing of the common input in a Reader class.
3. Design a standard protocol for creating all possible output representations. Capture the steps of this protocol in a Builder interface.
4. Define a Builder derived class for each target representation.
5. The client creates a Reader object and a Builder object, and registers the latter with the former.
6. The client asks the Reader to "construct".
7. The client asks the Builder to return the result.

## Rules

* Sometimes creational patterns are complementary: Builder can use one of the
  other patterns to implement which components get built. Abstract Factory,
  Builder, and Prototype can use Singleton in their implementations.
* Builder focuses on constructing a complex object step by step. Abstract Factory
  emphasizes a family of product objects (either simple or complex). Builder
  returns the product as a final step, but as far as the Abstract Factory is
  concerned, the product gets returned immediately.
* Builder often builds a Composite.
* Often, designs start out using Factory Method (less complicated, more
  customizable, subclasses proliferate) and evolve toward Abstract Factory,
  Prototype, or Builder (more flexible, more complex) as the designer discovers
  where more flexibility is needed.

## Code

In the Builder Pattern a director and a builder work together to build an object.
The director controls the building and specifies what parts and variations will
go into an object. The builder knows how to assemble the object given specification.

In this example we have a director, HTMLPageDirector, which is given a builder,
HTMLPageBuilder. The director tells the builder what the pageTitle will be, what
the pageHeading will be, and gives multiple lines of text for the page. The director
then has the builder do a final assembly of the parts, and return the page.

```php
<?php

abstract class AbstractPageBuilder
{
    abstract function getPage();
}

abstract class AbstractPageDirector
{
    abstract function __construct(AbstractPageBuilder $builder);
    abstract function buildPage();
    abstract function getPage();
}

class HTMLPage
{
    private $page = null;
    private $page_title = null;
    private $page_heading = null;
    private $page_text = null;

    public function showPage()
    {
        return $this->page;
    }

    public function setTitle($title)
    {
        $this->page_title = $title;
    }

    public function setHeading($heading)
    {
        $this->page_heading = $heading;
    }

    public function setText($text)
    {
        $this->page_text .= $text;
    }

    public function formatPage()
    {
       $this->page  = '<html>';
       $this->page .= '<head><title>'.$this->page_title.'</title></head>';
       $this->page .= '<body>';
       $this->page .= '<h1>'.$this->page_heading.'</h1>';
       $this->page .= $this->page_text;
       $this->page .= '</body>';
       $this->page .= '</html>';
    }
}

class HTMLPageBuilder extends AbstractPageBuilder
{
    private $page = null;

    public function __construct()
    {
        $this->page = new HTMLPage();
    }

    public function setTitle($title)
    {
        $this->page->setTitle($title);
    }

    public function setHeading($heading)
    {
        $this->page->setHeading($heading);
    }

    public function setText($text)
    {
        $this->page->setText($text);
    }

    public function formatPage()
    {
        $this->page->formatPage();
    }

    public function getPage()
    {
        return $this->page;
    }
}

class HTMLPageDirector extends AbstractPageDirector
{
    private $builder = null;

    public function __construct(AbstractPageBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildPage()
    {
        $this->builder->setTitle('Testing the HTMLPage');
        $this->builder->setHeading('Testing the HTMLPage');
        $this->builder->setText('Testing, testing, testing!');
        $this->builder->setText('Testing, testing, testing, or!');
        $this->builder->setText('Testing, testing, testing, more!');
        $this->builder->formatPage();
    }

    public function getPage()
    {
        return $this->builder->getPage();
    }
}

$pageBuilder = new HTMLPageBuilder();
$pageDirector = new HTMLPageDirector($pageBuilder);
$pageDirector->buildPage();
$page = $pageDirector->getPage();
echo $page->showPage();
```
