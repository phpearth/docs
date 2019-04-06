# Functions

A function is a language element that wraps a block of code between curly bracket
characters and provides reusable functionality throughout your program.

Let's take a look at a simple example:

```php
<?php

function sayHello($name)
{
    echo 'Hello, '.$name;
}

sayHello('John');
```

Functions can take zero or more arguments. Argument above is `$name`, which you
can pass when calling a function.

```php
// A simple function, without arguments
function functionName() {}

// A function with arguments
function functionName($param1, $param2) {}
```

Real world programs might contain many functions however for the best reusability
you will later on learn classes and objects which are more modern approach to
build complex programs.
