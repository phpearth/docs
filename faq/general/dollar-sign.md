---
title: "Why is PHP using dollar sign $ to prefix variables?"
updated: "August 17, 2016"
permalink: "/faq/dollar-sign-in-php/"
---

Rasmus Lerdorf - the father of the PHP language, explains the `$` sign as
an ability to insert variables inside literal string values (interpolation), so
the variables are distinguished from the rest of the string. Dollar sign in
front of the variable has been inspired by Perl which influenced PHP a lot in the
beginning.

Also many other [programming languages](https://en.wikipedia.org/wiki/Dollar_sign#Use_in_computer_software)
use the dollar character in their syntax. This symbol is called
[Sigil](https://en.wikipedia.org/wiki/Sigil_(computer_programming))
and simplifies interpolation among others.

Names not prefixed by `$` are considered constants, functions, class names...

Sigil usage simplifies the variable interpolation into strings:

```php
<?php

$name = "World";
echo "Hello, $name";
```

Where as in languages without sigil usage (for example Python), you must either
concatenate strings:

```python
name = "World"
print "Hello, " + name
```

or use special interpolation syntax if the language provides it. For example Ruby:

```ruby
name = "World"
puts "Hello #{name}"
```

Many people used to other languages might find the sigil usage odd, but you can
get used to it in no time and discover the benefits of this.

## See Also

* [PHP Manual: Strings](http://php.net/manual/en/language.types.string.php)
