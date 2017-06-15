# What is object oriented programming (OOP)?

Object oriented programming (OOP) is a programming paradigm with objects and
classes. Objects are usually instances of classes which have methods (functions
defined inside a class) and properties (variables defined in class as
descriptions of that class).

PHP has always been an object oriented programming language. PHP 5 introduced a
full object model. As newer versions emerged over time, PHP reached the point of
being almost a fully object oriented language. Many still consider PHP
object oriented capabilities as not fully object oriented, but it's a matter of
a perspective and coding style as well.

Many developers don't find the concept of the object oriented paradigm to be
useful, because it seems scary, or because they don't yet understand the
practical benefits of it, but for more advanced scripts, OOP is essential part
of PHP development.

## Object oriented concepts

Before we get into details, let's define some important OOP terms.

* **Class**: This is a programmer-defined datatype, which includes local
  functions and local data. You can think of a class as a template for making
  many instances of the same kind (or class) of object.

* **Object**: An individual instance of the data structure defined by a class.
  You define a class once and then make many objects that belong to it. Objects
  are also known as instances.

* **Member variable**: These are the variables defined inside a class. This
  data will be invisible to the outside of the class and can be accessed via
  member functions. These variables are called attributes of the object once
  it's created.

* **Member function**: These are the functions defined inside a class and are
  used to access object data.

* **Inheritance**: When a class is defined by inheriting existing function of a
  parent class, it is called inheritance. Here, a child class inherits some or
  all member functions and variables of its parent class.

* **Parent class**: A class that is inherited from by another class, also
  referred to as a base class or super class.

* **Child class**: A class inherits from another class (the parent class), also
  referred to as a subclass or derived class.

* **Polymorphism**: This is an object oriented concept where the same function
  can be used for different purposes. For example, the name of a function
  remaining the same but taking a different number of arguments and performing
  a different task.

* **Overloading**: A type of polymorphism in which some or all operators have
  different implementations depending on the types of their arguments.
  Similarly, functions can also be overloaded with different implementations.

* **Data abstraction**: Any representation of data in which the implementation
  details are hidden (abstracted).

* **Encapsulation**: Refers to a concept whereby data is encapsulated together
  with member functions to form an object.

* **Constructor**: Refers to a special type of function to be called
  automatically whenever an object is formed from a class.

* **Destructor**: Refers to a special type of function to be called
  automatically whenever an object is deleted or goes out of scope.

## Defining classes

General form for defining a new class in PHP:

```php
<?php

class PhpClass
{
    public $var1;
    public $var2 = 'string value';

    public function myfunction($arg1, $arg2)
    {
        // ...
    }

    // ...
}
```

Explanations of keywords used in the above class definition:

* Keyword `class`, followed by the name of the class, `PhpClass`.
* Opening and closing braces `{}`, which include any number of properties and
  methods.
* Property declaration can start with the keyword `public`, which is then
  followed by a conventional $variableName. It may also have an initial
  assignment of values.
* Method definitions look much like stand-alone PHP functions but are local to
  the class and can used to set and access object data.

## Example

Here is an example which defines a class `Book`:

```php
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
```

Special variable `$this` refers to the current object (i.e. itself).

## Creating class instances

Once you define your class, you can create as many objects as you like of that
class type. With the `new` keyword, you create an object (a class instance):

```php
$physics = new Book();
$maths = new Book();
$chemistry = new Book();
```

Here we have created three new objects which are independent of each other.

## Calling class methods

Let's check how to call methods and process class properties. After creating
your objects, you will be able to call class methods related to that object.
One class method will be able to process class properties of the related object
only.

The following example shows how to set titles and prices for these three books
by calling class methods.

```php
$physics->setTitle('Physics for High School');
$physics->setPrice(10);

$maths->setTitle('Algebra');
$maths->setPrice(7);

$chemistry->setTitle('Advanced Chemistry');
$chemistry->setPrice(15);
```

Now you call another methods to get the values from above example:

```php
echo $physics->getTitle();
echo $physics->getPrice();

echo $maths->getTitle();
echo $maths->getPrice();

echo $chemistry->getTitle();
echo $chemistry->getPrice();
```

This will produce the following result:

```php
Physics for High School
10
Algebra
7
Advanced Chemistry
15
```

## Constructor methods

Constructor method `__construct()` is a special type of method which is called
automatically whenever an object is created.

Constructor methods accept as many arguments as you define in the class
definition.

The following example will create one constructor for `Books` class and it will
initialize the price and title for the book at the time of object creation.

```php
public function __construct($title, $price)
{
    $this->price = $price;
    $this->title = $title;
}
```

With the above `__construct()` we don't need to call set methods separately to
set the price and title. We can initialize these two member variables at the
time of object creation only:

```php
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
```

The above will produce the same result as in the previous example.

## Destructor

Like with the constructor method, you can also define a destructor by using the
special method `__destruct()`. A destructor is called automatically as soon as
there are no more references to a particular object or during the shutdown
sequence. Within a destructor you can release all resources.

From the `Books` class example above, let's add the following destructor.

```php
public function __destruct()
{
    echo "A book ({$this->title}) is destroyed.\n";
}
```

```php
$physics = new Book('Physics for High School', 10);
$maths = new Book('Advanced Chemistry', 15);
$chemistry = new Book('Algebra', 7);
$mathsCopy = $maths;

unset($physics, $maths, $chemistry);

echo "Program is about to exit.\n";
```

### Output

```
A book (Physics for High School) is destroyed.
A book (Algebra) is destroyed.
Program is about to exit.
A book (Advanced Chemistry) is destroyed.
```

You can see that `Advanced Chemistry` was shown after the text
`Program is about to exit.`, even though `$maths` was previously unset. That
was because there was still another reference to the object (`$mathsCopy`).

## Inheritance

PHP class definitions can optionally inherit from a parent class definition by
using the `extends` keyword:

```php
class Child extends Parent
{
     // Definition body
}
```

The effect of inheritance is that the child class (or subclass, or derived
class) has the following characteristics:

* It automatically has all the member variable declarations of the parent
  class.
* It automatically has all the same member functions as the parent, which will
  work the same way as those functions do in the parent by default.

The following example inherits the `Book` class and adds additional
functionality compared to the parent class.

```php
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
```

Class `Novel` adds two additional methods to the parent class.

## Methods overriding

Methods defined in child classes override methods with the same name in parent
classes. In a child class, we can modify the definition of a method inherited
from parent class.

In the following example, the `getPrice()` method is overriden to return a
price number with currency.

```php
public function getPrice()
{
    return $this->price . " EUR";
}
```

## Public members

Unless you specify otherwise, properties and methods of a class are public by
default. This means that they may be accessed in three possible situations:

* From outside the class in which it is declared.
* From within the class in which it is declared.
* From within another class that implements the class in which it is declared.

Until now, we have seen all members as public members. If you wish to limit the
accessibility of the members of a class, you define class members as private or
protected.

## Private members

By setting a member as private, you limit its accessibility to only the class
where it is defined. The private member can not be used in inherited classes nor
outside the class.

A class member can be made private by using the `private` keyword in front of
the member.

```php
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
```

When the class `Car` is inherited by another class with the `extends` keyword,
the method `myPublicFunction()` and the property `$driver` will be visible. The
extended class will not have any awareness of nor access to
`myPrivateFunction()` or `$model`, because they are declared as private.

## Protected members

A protected property or method is accessible in the class in which it is
declared and in inherited classes. Protected members are not available outside
of those two contexts. A class member can be made protected by using the
`protected` keyword in front of the member.

Here is a different version of the class `Car`:

```php
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
```

## Interfaces

Interfaces provide common method names to implementors. Different implementors
can implement those interfaces according to their requirements. You could say
that interfaces are skeletons which are implemented by developers.

Let's define an interface:

```php
interface Mail
{
    public function sendMail();
}
```

The class then implements the above interface like this:

```php
class Report implements Mail
{
    public function sendMail()
    {
        // Code that sends an email.
    }
}
```

## Class constants

A class constant is an immutable value. Once you declare a constant, it can not
be changed:

```php
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
```

In this class, `MARGIN` is a constant. It is declared with the keyword `const`
and it can not be changed under any circumstances to anything other than the
default value `1.7`. Unlike variable names, constant names doesn't have a
leading `$`.


## The static keyword

Declaring class members or methods as static makes them accessible without the
need for class instantiation. A member declared as static can not be accessed
with an instantiated class object (although a static method can).

Try out the following example:

```php
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
```

## The final keyword

The `final` keyword prevents child classes from overriding a method by adding
`final` to the definition. If the class itself is being defined final then it
can not be extended.

The following example results in
"Fatal error: can not override final method BaseClass::moreTesting()"

```php
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
```

## Calling parent constructors

Instead of writing a new constructor for the subclass, you can call the
parent's constructor explicitly and then do whatever is necessary in
addition for instantiation of the subclass. Here's a simple example:

```php
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
        return $this->firstName.' '.$this->lastName;
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
        return $this->title.' '.parent::getFullName();
    }
}
```

In this example, we have a parent class `Person`, which has a constructor with
two arguments, and a subclass `Student`, which has a constructor with three
arguments. The constructor of `Student` calls the parent constructor with
`parent::__construct()` and then sets an additional field. Class `Student` also
overrides the `getFullName()` method.

## See also

* [PHP.net: Classes and Objects](http://php.net/manual/en/language.oop5.php) -
  A must read PHP OOP manual chapter.
* [Learn OOP in PHP](https://github.com/marcelgsantos/learning-oop-in-php) -
  A collection of resources to learn object-oriented programming and related
  concepts for PHP developers.
* [When to declare classes final](http://ocramius.github.io/blog/when-to-declare-classes-final/)
