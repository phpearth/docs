---
title: "What is dependency injection design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "october 11, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/dependency-injection/"
---

Dependency Injection is a design pattern which helps to reduce tight coupling.

How? Take a look at this code, where we link an author of a book to the book the author wrote.

```php
class Author 
{
    private $firstName;
    private $lastName;
    private $age;
    private $gender;
    
    public function __construct($firstName, $lastName, $age, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->gender = $gender;
    }
}

class Book
{
    private $name;
    private $author;
  
    public function __construct($firstName, $lastName, $age, $gender, $name)
    {
        $this->name = $name;
        $this->author = new Author($firstName, $lastName, $age, $gender);
    }
}
```

As you can see, we have an `Author` class with four properties: `$firstName`, `$lastName`, `$age` and `$gender`, and in the `Book` class' constructor, we pass in the properties of the `Author` class along with the `Book` class properties and create an object of the `Author` class and store it. You may think it is great code, but it is not!

Why?

* You are violating the Single Responsibility Principle. The `Book` class does more than representing a `Book`.
* You are tightly coupling the code. If you ever had to add a new property to the `Author` class constructor, then you will break the `Book` class.

Therefore, to solve this issue, we use dependency injection, and this is how you use it:

```php
class Author 
{
    private $firstName;
    private $lastName;
    private $age;
    private $gender;
    
    public function __construct($firstName, $lastName, $age, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->gender = $gender;
    }
}

class Book
{
    private $name;
    private $author;
  
    public function __construct($name, Author $author)
    {
        $this->name = $name;
        $this->author = $author;
    }
}

$author = new Author('John', 'Doe', 50, 'Male');
$book = new Book('Some legendary book', $author);
```

So, as you can see, we created an object of the `Author` class, and passed the variable referring to the object into the `Book` class. So basically, that is it about dependency injection.
