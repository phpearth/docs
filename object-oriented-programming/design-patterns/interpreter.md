---
title: "Interpreter design pattern in PHP"
updated: "August 16, 2016"
permalink: "/faq/object-oriented-programming/design-patterns/interpreter/"
---

* Given a language, define a representation for its grammar along with an interpreter that uses the representation to interpret sentences in the language.
* Map a domain to a language, the language to a grammar, and the grammar to a hierarchical object-oriented design.

## Problem

A class of problems occurs repeatedly in a well-defined and well-understood domain. If the domain were characterized with a "language", then problems could be easily solved with an interpretation "engine".

## About

The Interpreter pattern discusses: defining a domain language (i.e. problem characterization) as a simple language grammar, representing domain rules as language sentences, and interpreting these sentences to solve the problem. The pattern uses a class to represent each grammar rule. And since grammars are usually hierarchical in structure, an inheritance hierarchy of rule classes maps nicely.

An abstract base class specifies the method interpret(). Each concrete subclass implements interpret() by accepting (as an argument) the current state of the language stream, and adding its contribution to the problem solving process.

## Structure

Interpreter suggests modeling the domain with a recursive grammar. Each rule in the grammar is either a 'composite' (a rule that references other rules) or a terminal (a leaf node in a tree structure). Interpreter relies on the recursive traversal of the Composite pattern to interpret the 'sentences' it is asked to process.

<img src="https://lh3.googleusercontent.com/-RcWs22FT2iA/VOjVfI2f2QI/AAAAAAAACA0/j9tRZ0rJ8-s/w904-h593-no/Interpreter1-2x.png">

## Example

The Intepreter pattern defines a grammatical representation for a language and an interpreter to interpret the grammar. Musicians are examples of Interpreters. The pitch of a sound and its duration can be represented in musical notation on a staff. This notation provides the language of music. Musicians playing the music from the score are able to reproduce the original pitch and duration of each sound represented.

<img src="https://lh4.googleusercontent.com/-_0UGnQ2sJ1w/VOjVfIVMtvI/AAAAAAAACA4/rQ48J5vOqmI/w669-h593-no/Interpreter_example1-2x.png">

## Check list

* Decide if a "little language" offers a justifiable return on investment.
* Define a grammar for the language.
* Map each production in the grammar to a class.
* Organize the suite of classes into the structure of the Composite pattern.
* Define an interpret(Context) method in the Composite hierarchy.
* The Context object encapsulates the current state of the input and output as the former is parsed and the latter is accumulated. It is manipulated by each grammar class as the "interpreting" process transforms the input into the output.

## Rules of thumb

* Considered in its most general form (i.e. an operation distributed over a class hierarchy based on the Composite pattern), nearly every use of the Composite pattern will also contain the Interpreter pattern. But the Interpreter pattern should be reserved for those cases in which you want to think of this class hierarchy as defining a language.
* Interpreter can use State to define parsing contexts.
* The abstract syntax tree of Interpreter is a Composite (therefore Iterator and Visitor are also applicable).
* Terminal symbols within Interpreter's abstract syntax tree can be shared with Flyweight.
* The pattern doesn't address parsing. When the grammar is very complex, other techniques (such as a parser) are more appropriate.

## The Code

In the interpreter pattern you define a language, parse requests in that language, and assign the appropriate class(es), method(s), etc to handle each request.

In this example, the Interpreter class can handle strings in the following formats: "book author #", "book title #", or "book author title #". The # must be a numeric which must correlate to a book in the list of books we have.

```php
<?php

class Interpreter
{
    private $bookList;

    public function __construct($bookList)
    {
        $this->bookList = $bookList;
    }

    public function interpret($string)
    {
        $arrayIn = explode(' ', $string);
        $returnString = null;

        // Go through the array validating And if possible calling a book method
        // could use refactoring, some duplicate logic
        if ('book' == $arrayIn[0]) {
        if ('author' == $arrayIn[1]) {
          if (is_numeric($arrayIn[2])) {
            $book = $this->bookList->getBook($arrayIn[2]);
            if (null == $book) {
              $returnString = 'Can not process, there is no book # '.$arrayIn[2];
            } else {
              $returnString = $book->getAuthor();
            }
          } elseif ('title' == $arrayIn[2]) {
            if (is_numeric($arrayIn[3])) {
              $book = $this->bookList->getBook($arrayIn[3]);
              if (NULL == $book) {
                $returnString = 'Can not process, there is no book # '.
                  $arrayIn[3];
              } else {
                $returnString = $book->getAuthorAndTitle();
              }
            } else {
              $returnString = 'Can not process, book # must be numeric.';
            }
          } else {
            $returnString = 'Can not process, book # must be numeric.';
          }
        }
        if ('title' == $arrayIn[1]) {
          if (is_numeric($arrayIn[2])) {
            $book = $this->bookList->getBook($arrayIn[2]);
            if (null == $book) {
              $returnString = 'Can not process, there is no book # '.
                $arrayIn[2];
            } else {
              $returnString = $book->getTitle();
            }
          } else {
            $returnString = 'Can not process, book # must be numeric.';
          }
        }
      } else {
        $returnString = 'Can not process, can only process book author #,  book title #, or book author title #';
      }

      return $returnString;
    }
}

class BookList
{
    private $books = [];

    private $bookCount = 0;

    public function getBookCount()
    {
        return $this->bookCount;
    }

    private function setBookCount($newCount)
    {
        $this->bookCount = $newCount;
    }

    public function getBook($bookNumberToGet)
    {
        if ( (is_numeric($bookNumberToGet)) &&
           ($bookNumberToGet <= $this->getBookCount())) {
           return $this->books[$bookNumberToGet];
        }

        return NULL;
    }

    public function addBook(Book $book)
    {
        $this->setBookCount($this->getBookCount() + 1);
        $this->books[$this->getBookCount()] = $book;

        return $this->getBookCount();
    }

    public function removeBook(Book $book)
    {
      $counter = 0;
      while (++$counter <= $this->getBookCount()) {
        if ($book->getAuthorAndTitle() ==
          $this->books[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getBookCount(); $x++) {
              $this->books[$x] = $this->books[$x + 1];
          }
          $this->setBookCount($this->getBookCount() - 1);
        }
      }

      return $this->getBookCount();
    }
}

class Book
{
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title  = $title;
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorAndTitle()
    {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

//load BookList for test data
$bookList = new BookList();
$book_1 = new Book('PHP for Cats', 'Larry Truett';
$book_2 = new Book('MySQL for Cats', 'Larry Truett';
$bookList->addBook($book_1);
$bookList->addBook($book_2);

$interpreter = new Interpreter($bookList);

// Invalid request missing "book
echo $interpreter->interpret('author 1'); // Can not process, can only process book author #, book title #, or book author title #

// Valid book author request
echo $interpreter->interpret('book author 1'); // Larry Truett

// Valid book title request
echo $interpreter->interpret('book title 2'); // MySQL for Cats

// Valid book author title request
echo $interpreter->interpret('book author title 1'); // PHP for Cats by Larry Truett

// invalid request with invalid book number
echo $interpreter->interpret('book title 3'); // Can not process, there is no book # 3

// Invalid request with non numeric book number
echo $interpreter->interpret('book title one'); // Can not process, book # must be numeric.
```
