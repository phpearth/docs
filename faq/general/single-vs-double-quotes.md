---
title: "Single vs double quotes in PHP?"
read_time: "1 min"
updated: "august 24, 2015"
group: "general"
permalink: "/faq/single-vs-double-quotes-in-php/"

compass:
  prev: "/faq/how-to-take-screenshot-of-a-url-with-php/"
  next: "/faq/how-to-send-sms-with-php/"
---

# [PHP Strings](http://php.net/manual/en/language.types.string.php) #

###1. [Single quoted strings](http://php.net/manual/en/language.types.string.php#language.types.string.syntax.single)###

- Will display things almost completely **as is**.

- Variables and most escape sequences will not be interpreted.

- The exception is that to display a literal single quote, you can escape it with a back slash `\'`,and to display a back slash, you can escape it with another backslash `\\`.

**Example:**

```php
	echo '$variable';
```

**Output:**

```
	$variable
```

###2. [Double quote strings](http://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.double)###

- Will display a host of escaped characters (including some regexes), and variables in the strings **will be evaluated**.

- An important point here is that you can use curly braces to isolate the name of the variable you want evaluated.

**Example:**

```php
	$variable = 10;

	echo $variable;
```

**Output:**

```
	10
```


###3. [Heredoc](http://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc)###

- Works like double quoted strings.

- It starts with `<<<`.

- After this operator, an identifier is provided, then a newline. The string itself follows, and then the same identifier again to close the quotation.

- You don't need to escape quotes in this syntax.


###4. [Nowdoc](http://php.net/manual/en/language.types.string.php#language.types.string.syntax.nowdoc) (since PHP 5.3.0)###

- Works essentially like single quoted strings.

- The difference is that not even **single quotes** or **backslashes** have to be escaped.

- A nowdoc is identified with the same `<<<` sequence used for heredocs, but the identifier which follows is enclosed in single quotes, e.g. `<<<'EOT'`. **No parsing is done in nowdoc.**


#### Credit ####

- [Peter Ajtai](http://stackoverflow.com/users/186636/peter-ajtai) - [Stackoverflow Question](http://stackoverflow.com/a/3446286)
