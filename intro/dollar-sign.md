# Why does PHP use a dollar sign $ to prefix variables?

Rasmus Lerdorf, the father of the PHP language, explains the `$` sign as an
ability to insert variables inside literal string values (interpolation), so
that the variables are distinguished from the rest of the string. A dollar sign
in front of variables in PHP is inspired by Perl which greatly influenced PHP
during its early years.

Many other [programming languages](https://en.wikipedia.org/wiki/Dollar_sign#Use_in_computer_software)
also use a dollar sign in their syntax. This symbol is called "[sigil](https://en.wikipedia.org/wiki/Sigil_(computer_programming))"
and simplifies interpolation.

Names not prefixed by `$` are considered constants, functions, class names, etc.

Sigil usage simplifies the variable interpolation into strings:

```php
<?php

$name = "World";
echo "Hello, $name";
```

Where as in languages without sigil usage (for example, Python), you must
either concatenate strings:

```python
name = "World"
print "Hello, " + name
```

or use special interpolation syntax if the language provides it. For example, Ruby:

```ruby
name = "World"
puts "Hello #{name}"
```

Many people used to other languages might find the sigil usage odd, but you can
get used to it in no time and discover the its benefits.

## See also

* [PHP Manual: Strings](http://php.net/manual/en/language.types.string.php)
