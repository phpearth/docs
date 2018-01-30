# PHP coding style

PHP allows a lot of code styles, which is good and very friendly to start with.
However, as soon as you write more PHP code or when collaborating on PHP code
with others, different coding styles will get in a way very soon and code will
be less readable.

For PHP, there are already existing standards and coding style recommendations
that you should look into when writing code. Adopting a consistent coding style
will simplify collaboration on code and make it more readable.

One of the most adopted standards recommendations in PHP is
[PHP FIG](http://php-fig.org), which recommends coding style via two of its so
called PSRs (**P**HP **S**tandard **R**ecommendation):

* [PSR-1](http://www.php-fig.org/psr/psr-1/) - Basic Coding Standard
* [PSR-2](http://www.php-fig.org/psr/psr-2/) - Coding Style Guide

Many open source projects also extend above PSRs with their own coding style
guides. For example:

* [Symfony](http://symfony.com/doc/current/contributing/code/standards.html)

Many advanced PHP IDEs and editors also offer code refactoring via plugins and
extensions. With predefined common coding styles such as PSR-1 and PSR-2, with
refactoring code, automatic code generation, autocomplete and similar things,
consistently writing standardized PHP code can be done with ease.

The more you write code, the more you will understand the importance in using
common style guides. Especially when working with source code control (eg, Git,
coworkers), or just to be consistent in general.

## Additional coding style guidelines

These are some further best practices that are either not defined in the PSR
coding style yet, or are recommended by the PHP documentation.

### Constants

Constants should be defined with uppercase letters and underscore separators:

```php
<?php

const FOO = 'value';
const FOO_BAR = 'value';
```

* Omit constant names such as `__FOO__`, because PHP might one day use such
  contant name internally.
* Use only letters and underscores. Omit all other characters, such as numbers,
  for simplicity and readability.

## See also

* [Core PHP language specification](https://github.com/php/php-langspec)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) - Tokenizes
  PHP, JavaScript and CSS files, and detects violations of a defined set of
  coding standards.
* [PHP Coding Standards Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) -
  A tool that fixes coding standards in your code.
* [PHP-FIG: Extended Coding Style Guide proposal](https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md)
