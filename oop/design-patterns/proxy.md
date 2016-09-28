---
title: "Proxy Design Pattern in PHP"
updated: "September 21, 2016"
permalink: "/articles/object-oriented-programming/design-patterns/proxy/"
redirect_from: "/faq/object-oriented-programming/design-patterns/proxy/"
---

Provide a surrogate or placeholder for another object to control access to it.
Use an extra level of indirection to support distributed, controlled, or intelligent
access. Add a wrapper and delegation to protect the real component from undue
complexity.

By defining a Subject interface, the presence of the Proxy object standing in
place of the RealSubject is transparent to the client.

![Proxy Design Pattern UML Diagram](/images/oop/design-patterns/proxy.png "Proxy Design Pattern UML Diagram")

## Problem

You need to support resource-hungry objects, and you do not want to instantiate such objects unless and until they are actually requested by the client.

## Discussion

Design a surrogate, or proxy, object that: instantiates the real object the first time the client makes a request of the proxy, remembers the identity of this real object, and forwards the instigating request to this real object. Then all subsequent requests are simply forwarded directly to the encapsulated real object.

There are four common situations in which the Proxy pattern is applicable.

A virtual proxy is a placeholder for "expensive to create" objects. The real object is only created when a client first requests/accesses the object.
A remote proxy provides a local representative for an object that resides in a different address space. This is what the "stub" code in RPC and CORBA provides.
A protective proxy controls access to a sensitive master object. The "surrogate" object checks that the caller has the access permissions required prior to forwarding the request.
A smart proxy interposes additional actions when an object is accessed. Typical uses include:
Counting the number of references to the real object so that it can be freed automatically when there are no more references (aka smart pointer),
Loading a persistent object into memory when it's first referenced,
Checking that the real object is locked before it is accessed to ensure that no other object can change it.

## Example

The Proxy provides a surrogate or place holder to provide access to an object. A check or bank draft is a proxy for funds in an account. A check can be used in place of cash for making purchases and ultimately controls access to cash in the issuer's account.

<img src="https://lh6.googleusercontent.com/-mg2hOQqzzgs/VPb29EgkMgI/AAAAAAAACKI/w3dtUvKkYhU/w920-h593-no/Proxy_example1-2x.png">

## Check list

1. Identify the leverage or "aspect" that is best implemented as a wrapper or surrogate.
2. Define an interface that will make the proxy and the original component interchangeable.
3. Consider defining a Factory that can encapsulate the decision of whether a proxy or original object is desirable.
4. The wrapper class holds a pointer to the real class and implements the interface.
5. The pointer may be initialized at construction, or on first use.
6. Each wrapper method contributes its leverage, and delegates to the wrappee object.

## Rules of thumb

* Adapter provides a different interface to its subject. Proxy provides the same interface. Decorator provides an enhanced interface.
* Decorator and Proxy have different purposes but similar structures. Both describe how to provide a level of indirection to another object, and the implementations keep a reference to the object to which they forward requests.

## Code

In the proxy pattern one class stands in for and handles all access to another class.

This can be because the real subject is in a different location (server, platform, etc), the real subject is CPU or memory intensive to create and is only created if necessary, or to control access to the real subject. A proxy can also be used to add additional access functionality, such as recording the number of times the real subject is actually called.

In this example, the ProxyBookList is created in place of the more resource intensive BookList. ProxyBookList will only instantiate BookList the first time a method in BookList is called.

```php
<?php

class ProxyBookList
{
    private $bookList = null;

    public function getBookCount()
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }

        return $this->bookList->getBookCount();
    }

    public function addBook($book)
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }

        return $this->bookList->addBook($book);
    }

    public function getBook($bookNum)
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }

        return $this->bookList->getBook($bookNum);
    }

    public function removeBook($book)
    {
        if (NULL == $this->bookList) {
            $this->makeBookList();
        }

        return $this->bookList->removeBook($book);
    }

    public function makeBookList()
    {
        $this->bookList = new bookList();
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
        if ( (is_numeric($bookNumberToGet)) && ($bookNumberToGet <= $this->getBookCount())) {
            return $this->books[$bookNumberToGet];
        } else {
           return NULL;
        }
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
            if ($book->getAuthorAndTitle() == $this->books[$counter]->getAuthorAndTitle()) {
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
    private $author;
    private $title;

    public function __construct($title, $author)
    {
        $this->author = $author;
        $this->title  = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorAndTitle(
    {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

$proxyBookList = new ProxyBookList();
$book = new Book('PHP for Cats','Aaryadev');
$proxyBookList->addBook($book);

// Show the book count after a book is added
echo $proxyBookList->getBookCount();

// Show the book
$book = $proxyBookList->getBook(1);
echo $book->getAuthorAndTitle();

$proxyBookList->removeBook($book);

// Show the book count after a book is removed
echo $proxyBookList->getBookCount();
```

## See Also

* [Wikipedia: Proxy pattern](https://en.wikipedia.org/wiki/Proxy_pattern)
* [DesignPatternsPHP: Proxy](http://designpatternsphp.readthedocs.io/en/latest/Structural/Proxy/README.html)
