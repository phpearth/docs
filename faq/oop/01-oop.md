---
title: "What is object oriented programming (OOP)?"
read_time: "5 min"
updated: "March 14, 2016"
group: "oop"
permalink: "/faq/object-oriented-programming/"

compass:
  prev: "/faq/intro/which-hosting-service-should-i-use/"
  next: "/faq/object-oriented-programming/php-abstract-classes/"
---

Object oriented programming (OOP) is a programming paradigm with objects and
classes. Objects are usually instances of classes which have methods (functions
defined inside a class) and properties (variables defined in class as descriptions
of that class).

We can imagine our universe made of different objects like sun, earth, moon etc.
Similarly we can imagine our car made of different objects like wheel, steering,
gear etc. Same way there are OOP concepts which assume everything as an object
and implement a software using different objects.

PHP has always been object oriented programming language. PHP 5 introduced a
full object model. Over the version updates it got to an almost fully object
oriented language. Many still consider PHP object-oriented capabilities not fully
object oriented. But it is a matter of a perspective and coding style as well.

At the beginning many developers don't find the concept of object oriented paradigm
useful because it seems scary or they don't understand the practical benefits of
it yet. For more advanced scripts OOP is essential part of PHP development.

## Object oriented concepts

Before we get into details, let's define some important OOP terms.

* **Class**: This is a programmer-defined datatype, which includes local functions
  and local data. You can think of a class as a template for making many instances
  of the same kind (or class) of object.

* **Object**: An individual instance of the data structure defined by a class.
  You define a class once and then make many objects that belong to it. Objects
  are also known as instances.

* **Member variable**: These are the variables defined inside a class. This data
  will be invisible to the outside of the class and can be accessed via member
  functions. These variables are called attribute of the object once an object is
  created.

* **Member function**: These are the function defined inside a class and are used
  to access object data.

* **Inheritance**: When a class is defined by inheriting existing function of a
  parent class then it is called inheritance. Here child class inherits some or
  all member functions and variables of a parent class.

* **Parent class**: A class that is inherited from by another class. This is also
  called a base class or super class.

* **Child class**: A class that inherits from another class. This is also called
  a subclass or derived class.

* **Polymorphism**: This is an object oriented concept where same function can
  be used for different purposes. For example function name remains the same but
  it may take different number of arguments and can do different task.

* **Overloading**: a type of polymorphism in which some or all of operators have
  different implementations depending on the types of their arguments. Similarly
  functions can also be overloaded with different implementation.

* **Data abstraction**: Any representation of data in which the implementation
  details are hidden (abstracted).

* **Encapsulation**: Refers to a concept where we encapsulate all the data and
  member functions together to form an object.

* **Constructor**: Refers to a special type of function which is called
  automatically whenever there is an object formation from a class.

* **Destructor**: Refers to a special type of function which will be called
  automatically whenever an object is deleted or goes out of scope.

## Defining classes

General form for defining a new class in PHP:

~~~php
<?php

class PhpClass
{
    public $var1;
    public $var2 = 'string value';

    public function myfunction($arg1, $arg2)
    {
        [..]
    }
    [..]
}
~~~

Explanations of keywords used in above class definition:

* Keyword `class` followed by the name of the class `PhpClass`
* Opening and closing braces `{}` which include any number of properties and methods.
* Property declaration can start with the keyword `public`, which is followed by a
  conventional $variableName. They may also have an initial assignment of values.
* Method definitions look much like standalone PHP functions but are local to
  the class and can used to set and access object data.

## Example

Here is an example which defines a class `Book`:

~~~php
<?php

class Book
{
    public $price;
    public $title;

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
~~~

Special variable `$this` refers to the current object i.e. itself.

## Creating instances objects in PHP

Once you define your class, you can create as many objects as you like of that
class type. Following is an example of how to create object using the `new` keyword.

~~~php
$physics = new Book();
$maths = new Book();
$chemistry = new Book();
~~~

Here we have created three new objects which are independent of each other.

## Calling class methods

Let's check how to call methods and process class properties. After creating your
objects, you will be able to call class methods related to that object. One class
method will be able to process class property of only related object.

The following example shows how to set titles and prices for these three books
by calling class methods.

~~~php
$physics->setTitle('Physics for High School');
$physics->setPrice(10);

$maths->setTitle('Algebra');
$maths->setPrice(7);

$chemistry->setTitle('Advanced Chemistry');
$chemistry->setPrice(15);
~~~

Now you call another methods to get the values from above example:

~~~php
echo $physics->getTitle();
echo $physics->getPrice();

echo $maths->getTitle();
echo $maths->getPrice();

echo $chemistry->getTitle();
echo $chemistry->getPrice();
~~~

This will produce the following result:

~~~php
Physics for High School
10
Algebra
7
Advanced Chemistry
15
~~~

## Constructor methods

Constructor method `__construct()` is a special type of method which is called
automatically whenever an object is created.

Constructor methods accepts as many arguments as you define in the class definition.

Following example will create one constructor for Books class and it will
initialize price and title for the book at the time of object creation.

~~~php
public function __construct($price, $title)
{
    $this->price = $price;
    $this->title = $title;
}
~~~

With above `__construct()` we don't need to call set methods separately to set
price and title. We can initialize these two member variables at the time of
object creation only:

~~~php
$physics = new Book('Physics for High School', 10);
$maths = new Book('Advanced Chemistry', 15);
$chemistry = new Book('Algebra', 7);

/* Get those set values */
echo $physics->getTitle();
echo $physics->getPrice();

echo $maths->getTitle();
echo $maths->getPrice();

echo $chemistry->getTitle();
echo $chemistry->getPrice();
~~~

Above will produce the same result as in previous example.

## Destructor

Like a constructor method you can define also destructor with special method
`__destruct()`. Destructor is called automatically as soon as there are no more
references to a particular object or during the shutdown sequence. With-in a
destructor you can release all the resources.

## Inheritance

PHP class definitions can optionally inherit from a parent class definition by
using the `extends` keyword:

~~~php
<?php

class Child extends Parent
{
     // Definition body
}
~~~

The effect of inheritance is that the child class (or subclass or derived class)
has the following characteristics:

* Automatically has all the member variable declarations of the parent class.
* Automatically has all the same member functions as the parent, which (by default)
  will work the same way as those functions do in the parent.

Following example inherits `Book` class and adds additional functionality compared
the parent class.

~~~php
<?php

class Novel extends Book
{
    public $publisher;

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }
}
~~~

Class `Novel` adds two additional methods to parent class.

## Methods overriding

Methods defined in child classes override methods with the same name in parent
classes. In a child class, we can modify the definition of a method inherited
from parent class.

In the following example `getPrice()` method is overriden to return price number
with currency.

~~~php
public function getPrice()
{
    return $this->price . " EUR";
}
~~~

## Public members

Unless you specify otherwise, properties and methods of a class are by default
public. That means they may be accessed in three possible situations:

* From outside the class in which it is declared
* From within the class in which it is declared
* From within another class that implements the class in which it is declared

Till now we have seen all members as public members. If you wish to limit the
accessibility of the members of a class then you define class members as private
or protected.

## Private members

By setting a member private, you limit its accessibility only to the class where
it is defined. The private member cannot be used in inherited classes nor outside
the class.

A class member can be made private by using the `private` keyword in front of the
member.

~~~php
<?php

class Car
{
    private $model = 'skoda';
    $driver = 'SRK';

    public function __construct()
    {
        // Statements here run every time
        // an instance of the class
        // is created.
    }

    public function myPublicFunction()
    {
        return("I'm visible!");
    }

    private function myPrivateFunction()
    {
        return("I'm not visible outside!");
    }
}
~~~

When class `Car` is inherited by another class with `extends` keyword, method
`myPublicFunction()` and property `$driver` will be visible. The extending class
will not have any awareness of or access to `myPrivateFunction()` or `$model`,
because they are declared as private.

## Protected members

A protected property or method is accessible in the class in which it is declared
and in inherited classes. Protected members are not available outside of those
two. A class member can be made protected by using `protected` keyword in front
of the member.

Here is different version of class `Car`:

~~~php
<?php

class Car
{
    protected $car = 'skoda';
    $driver = 'SRK';

    public function __construct()
    {
        // Statements here run every time
        // an instance of the class
        // is created.
    }

    public function myPublicFunction()
    {
        return("I'm visible!");
    }

    protected function myPrivateFunction()
    {
        return("I'm visible in child class!");
    }
}
~~~

## Interfaces

Interfaces provide common method names to implementors. Different implementors
can implement those interfaces according to their requirements. You can say,
interfaces are skeletons which are implemented by developers.

Let's define an interface:

~~~php
<?php

interface Mail
{
    public function sendMail();
}
~~~

Class than implements above interface like this:

~~~php
<?php

class Report implements Mail
{
    public function sendMail()
    {
        // Code that sends an email.
    }
}
~~~

## Class constants

A class constant is an immutable value. Once you declare a constant, it cannot be
changed:

~~~php
<?php

class MyClass
{
    const MARGIN = 1.7;

    public function __construct($argument)
    {
        // Statements here run every time
        // an instance of the class
        // is created.
    }
}
~~~

In this class, `MARGIN` is a constant. It is declared with the keyword `const`
and it cannot be changed under any circumstances to anything other than the default
value `1.7`. Constant name doesn't have a leading `$` as variable names.


## Static keyword

Declaring class members or methods as static makes them accessible without the need
of class instantiation. A member declared as static can not be accessed with an
instantiated class object (though a static method can).

Try out following example:

~~~php
<?php

class Foo
{
    public static $myStatic = 'foo';

    public function staticValue()
    {
        return self::$myStatic;
    }
}

print Foo::$myStatic . "\n";
$foo = new Foo();
print $foo->staticValue() . "\n";
~~~

## Final keyword

The `final` keyword prevents child classes from overriding a method by adding
`final` to the definition. If the class itself is being defined final then it
cannot be extended.

Following example results in Fatal error: Cannot override final method BaseClass::moreTesting()

~~~php
<?php

class BaseClass
{
    public function test()
    {
        echo "BaseClass::test() called<br>";
    }

    final public function moreTesting()
    {
       echo "BaseClass::moreTesting() called<br>";
    }
}

class ChildClass extends BaseClass
{
    public function moreTesting()
    {
        echo "ChildClass::moreTesting() called<br>";
    }
}
~~~

## Calling parent constructors

Instead of writing a new constructor for the subclass, you can call the parent's
constructor explicitly and then doing whatever is necessary in addition for
instantiation of the subclass. Here's a simple example:

~~~php
<?php

class Person
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

class Student extends Person
{
    private $title;

    public function __construct($title, $firstName, $lastName)
    {
        parent::__construct($firstName, $lastName);
        $this->title = $title;
    }

    public function getFullName()
    {
        return $this->title . ' ' . parent::getFullName();
    }
}
~~~

In this example, we have a parent class `Person`, which has a constructor with
two arguments, and a subclass `Student`, which has constructor with three arguments.
The constructor of `Student` calls parent constructor with `parent::__construct()`
and than sets additional field. Class `Student` also overrides `getFullName()`
method.

## See also

* [PHP.net: Classes and Objects](http://php.net/manual/en/language.oop5.php) - A must read PHP OOP manual chapter.
