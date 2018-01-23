---
stage: drafting
---

# PHP basics

This chapter will go through a simple PHP program and show you basic PHP syntax.

## Hello world

Let's create a very simple *hello world* PHP program, and display the output in
the command line and in browser.

Create a new file called `hello.php` with the following contents:

```php
<?php

echo 'Hello world';
```

And run it in command line with:

```bash
php hello.php
```

You should see output similar to this:

```txt
Hello world
```

<script src="https://asciinema.org/a/158693.js" id="asciicast-158693" async data-rows="20"></script>

## PHP tags

First line in above file is a so called *opening PHP tag*. PHP code needs to be
wrapped in PHP tags for PHP to be able to parse it. You can also embed the PHP
code directly in the HTML file. For example, let's create a file
`php-and-html.php`:

```php
<html>
    <body>
        <?php echo 'Hello world'; ?>
    <body>
</html>
```

* Opening PHP tag: `<?php`
* Closing PHP tag: `?>`

And display it in the browser:

```bash
php -S localhost:8000 php-and-html.php
```

Now, visit URL `http://localhost:8000` in your favourite browser, and you should
see output of `Hello world`.

## Comments

Comments in code are language elements that indicate what parts of the code
should not be parsed and processed. PHP provides two types of comments:

* Single line comments:

```php
<?php

// This is a single line comment
```

And multiline comments:

```php
/*
This is multiline comment
*/
```

### Declarations

* `$i = 1;` - assign value to variable
* `define('FOO', 'something');` - define a constant

### Functions

```php
// A simple function
function functionName() {}

// A function with parameters
function functionName($param1, $param2) {}
```

#### Anonymous functions (closures)

```php
<?php
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');
// outputs helloWorld

// Anonymous function variable assignment example
$greet = function($name) {
    printf("Hello %s\r\n", $name);
};
$greet('World');

// Inherit
$message = 'hello';

// Without "use" keyword
$example = function () {
    var_dump($message);
};
echo $example();

// Inherit $message
$example = function () use ($message) {
    var_dump($message);
};
echo $example();
```

#### Variadic functions

```php
<?php
function sum(...$nums)
{
    return array_sum($nums);
}
```

### Arrays

```php
$array = [
    "foo" => "bar",
    "bar" => "foo",
];
```

#### Operations on arrays

|Operator|Name|Result|
|--------|----|------|
|`$a + $b`|Union|Union of $a and $b.|
|`$a == $b`|Equality|TRUE if $a and $b have the same key/value pairs.|
|`$a === $b`|Identity|TRUE if $a and $b have the same key/value pairs in the same order and of the same types.|
|`$a != $b`|Inequality|TRUE if $a is not equal to $b.|
|`$a <> $b`|Inequality|TRUE if $a is not equal to $b.|
|`$a !== $b`|Non-identity|TRUE if $a is not identical to $b.|

### Built-in types

|Type|
|----|
|boolean|
|integer|
|float|
|string|
|array|
|object|
|resource|
|NULL|

## Errors

### PHP errors

```php
<?php
// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

```

## What's next?

After the introduction chapters, it is time to learn something more about PHP
language syntax. Proceed to the next [PHP language reference chapter](/php/ref).
