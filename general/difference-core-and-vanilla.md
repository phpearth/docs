# What is the difference between a core PHP and a vanilla/plain PHP?

While developing, there's often a confusion between a `core PHP` and a
`vanilla/plain PHP`. This article will explain a difference between these terms
to avoid further confusion.

## Core PHP

A `core PHP` describes the main engine of the PHP language itself and doesn't mean
developing something with the PHP language directly. So a core PHP
developer writes C code and extends the [PHP core](https://github.com/php/php-src)
or develops [PHP extensions](http://php.net/manual/en/internals2.structure.php),
which are written in C programming language. Often times, core PHP is referred to
as `PHP internals` also.

## Vanilla or plain PHP

A `vanilla PHP` or `plain PHP` is developing an application using the PHP language
without any 3rd party libraries or frameworks. So the vanilla developer actually
uses the language used in the name.

## Conclusion

As long as you are writing PHP code, you are a `vanilla PHP developer` if you are
however writing on the PHP core itself, you can be considered a `core PHP developer`.

## See also

* [PHP Internals Book](http://www.phpinternalsbook.com/)
* [What is the difference between a developer and programmer?](/general/professions.md)
