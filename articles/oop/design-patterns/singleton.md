---
title: "What is singleton design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "Feb 27, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/singleton/"
---


## Intent

* Ensure a class has only one instance, and provide a global point of access to it.
* Encapsulated "just-in-time initialization" or "initialization on first use".

## Problem

Application needs one, and only one, instance of an object. Additionally, lazy initialization and global access are necessary.

## Discussion

Make the class of the single instance object responsible for creation, initialization, access, and enforcement. Declare the instance as a private static data member. Provide a public static member function that encapsulates all initialization code, and provides access to the instance.

The client calls the accessor function (using the class name and scope resolution operator) whenever a reference to the single instance is required.

Singleton should be considered only if all three of the following criteria are satisfied:
* Ownership of the single instance cannot be reasonably assigned
* Lazy initialization is desirable
* Global access is not otherwise provided for

If ownership of the single instance, when and how initialization occurs, and global access are not issues, Singleton is not sufficiently interesting.

The Singleton pattern can be extended to support access to an application-specific number of instances.

The "static member function accessor" approach will not support subclassing of the Singleton class. If subclassing is desired, refer to the discussion in the book.

Deleting a Singleton class/instance is a non-trivial design problem. See "To Kill A Singleton" by John Vlissides for a discussion.

## Structure

<img src="https://lh4.googleusercontent.com/-EpIPS4bze7c/VO9yNWL-JeI/AAAAAAAACDk/h8DyOnHK7Cs/w694-h294-no/singleton1-2x.png">

Make the class of the single instance responsible for access and "initialization on first use". The single instance is a private static attribute. The accessor function is a public static method.

<img src="https://lh4.googleusercontent.com/-_h_XVuCrPQA/VO9yNXDinDI/AAAAAAAACDo/sBid-fhjtyA/w404-h200-no/Singleton-2x.png">

## Example

The Singleton pattern ensures that a class has only one instance and provides a global point of access to that instance. It is named after the singleton set, which is defined to be a set containing one element. The office of the President of the United States is a Singleton. The United States Constitution specifies the means by which a president is elected, limits the term of office, and defines the order of succession. As a result, there can be at most one active president at any given time. Regardless of the personal identity of the active president, the title, "The President of the United States" is a global point of access that identifies the person in the office.

<img src="https://lh6.googleusercontent.com/-pi5uV3Zoihw/VO9yNqNoNyI/AAAAAAAACDg/DK5qF3OcbRI/w664-h340-no/Singleton_example1-2x.png">

## Check list

1. Define a private static attribute in the "single instance" class.
2. Define a public static accessor function in the class.
3. Do "lazy initialization" (creation on first use) in the accessor function.
4. Define all constructors to be protected or private.
5. Clients may only use the accessor function to manipulate the Singleton.

## Rules

* Abstract Factory, Builder, and Prototype can use Singleton in their implementation.
* Facade objects are often Singletons because only one Facade object is required.
* State objects are often Singletons.
* The advantage of Singleton over global variables is that you are absolutely sure of the number of instances when you use Singleton, and, you can change your mind and manage any number of instances.
* The Singleton design pattern is one of the most inappropriately used patterns. Singletons are intended to be used when a class must have exactly one instance, no more, no less. Designers frequently use Singletons in a misguided attempt to replace global variables. A Singleton is, for intents and purposes, a global variable. The Singleton does not do away with the global; it merely renames it.
* When is Singleton unnecessary? Short answer: most of the time. Long answer: when it's simpler to pass an object resource as a reference to the objects that need it, rather than letting objects access the resource globally. The real problem with Singletons is that they give you such a good excuse not to think carefully about the appropriate visibility of an object. Finding the right balance of exposure and protection for an object is critical for maintaining flexibility.
* Our group had a bad habit of using global data, so I did a study group on Singleton. The next thing I know Singletons appeared everywhere and none of the problems related to global data went away. The answer to the global data question is not, "Make it a Singleton." The answer is, "Why in the hell are you using global data?" Changing the name doesn't change the problem. In fact, it may make it worse because it gives you the opportunity to say, "Well I'm not doing that, I'm doing this" – even though this and that are the same thing.

## Code

In the singleton pattern a class can distribute one instance of itself to other classes.

```php
/*
 *   Singleton classes
 */
class BookSingleton {
    private $author = 'peterkokot, samundra,aaryadev and others';
    private $title  = 'Design Patterns';
    private static $book = NULL;
    private static $isLoanedOut = FALSE;

    private function __construct() {
    }

    static function borrowBook() {
      if (FALSE == self::$isLoanedOut) {
        if (NULL == self::$book) {
           self::$book = new BookSingleton();
        }
        self::$isLoanedOut = TRUE;
        return self::$book;
      } else {
        return NULL;
      }
    }

    function returnBook(BookSingleton $bookReturned) {
        self::$isLoanedOut = FALSE;
    }

    function getAuthor() {return $this->author;}

    function getTitle() {return $this->title;}

    function getAuthorAndTitle() {
      return $this->getTitle() . ' by ' . $this->getAuthor();
    }
  }
 
class BookBorrower {
    private $borrowedBook;
    private $haveBook = FALSE;

    function __construct() {
    }

    function getAuthorAndTitle() {
      if (TRUE == $this->haveBook) {
        return $this->borrowedBook->getAuthorAndTitle();
      } else {
        return "I don't have the book";
      }
    }

    function borrowBook() {
      $this->borrowedBook = BookSingleton::borrowBook();
      if ($this->borrowedBook == NULL) {
        $this->haveBook = FALSE;
      } else {
        $this->haveBook = TRUE;
      }
    }

    function returnBook() {
      $this->borrowedBook->returnBook($this->borrowedBook);
    }
  }
```

## Testing/Working

```php
/*
 *   Initialization
 */

  writeln('BEGIN TESTING SINGLETON PATTERN');
  writeln('');

  $bookBorrower1 = new BookBorrower();
  $bookBorrower2 = new BookBorrower();

  $bookBorrower1->borrowBook();
  writeln('BookBorrower1 asked to borrow the book');
  writeln('BookBorrower1 Author and Title: ');
  writeln($bookBorrower1->getAuthorAndTitle());
  writeln('');

  $bookBorrower2->borrowBook();
  writeln('BookBorrower2 asked to borrow the book');
  writeln('BookBorrower2 Author and Title: ');
  writeln($bookBorrower2->getAuthorAndTitle());
  writeln('');

  $bookBorrower1->returnBook();
  writeln('BookBorrower1 returned the book');
  writeln('');

  $bookBorrower2->borrowBook();
  writeln('BookBorrower2 Author and Title: ');
  writeln($bookBorrower1->getAuthorAndTitle());
  writeln('');

  writeln('END TESTING SINGLETON PATTERN');

  function writeln($line_in) {
    echo $line_in.'<br/>';
  }
```

## Output

```
BEGIN TESTING SINGLETON PATTERN


BookBorrower1 asked to borrow the book
BookBorrower1 Author and Title: 
Design Patterns by peterkokot, samundra,aaryadev and others


BookBorrower2 asked to borrow the book
BookBorrower2 Author and Title: 
I don't have the book


BookBorrower1 returned the book


BookBorrower2 Author and Title: 
Design Patterns by peterkokot, samundra,aaryadev and others


END TESTING SINGLETON PATTERN
```
