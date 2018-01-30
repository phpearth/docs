---
stage: revising
---

# PHP basics

This chapter will go through a simple PHP program and show you basic PHP syntax.

## Hello world

Let's create a *hello world* PHP program, and display the output in the
command line and in browser.

Create a new file called `hello.php` with the following contents:

```php
<?php

echo 'Hello world';
```

And run it in the command line with:

```bash
php hello.php
```

You should see output similar to this:

```txt
Hello world
```

<script src="https://asciinema.org/a/158693.js" id="asciicast-158693" async data-rows="20"></script>

## PHP tags

First line in above file is a so called *opening PHP tag* - `<?php`. PHP code
needs to be wrapped in PHP tags for PHP to be able to parse it. You can also
embed the PHP code directly in the HTML file. For example, let's create a file
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

Comments in code are language elements that indicate which parts of the code
should not be parsed and processed. PHP provides two types of comments:

* Single line comments:

```php
<?php

// This is a single line comment.
echo 'Hello world';
```

And multiline comments:

```php
<?php

/*
This is multiline comment.
*/
echo 'Hello world';
```

## Expressions

Expressions are basic building block of any language, including PHP.

## What's next?

After the introduction chapters, it is time to learn something more about PHP
language syntax. Proceed to the next [PHP language reference chapter](/php/ref).
