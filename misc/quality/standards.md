# How to write standardized PHP code?

For PHP, there are many standards and coding style recommendations that you
should look into when writing code. It simplifies collaboration on code and
makes it more readable once you get used to a particular style.

One of the most adopted standards recommendations in PHP is
[PHP FIG](http://php-fig.org), which recommends coding style via two of its
PSRs (PHP Standard Recommendation):

* [PSR-1](http://www.php-fig.org/psr/psr-1/) - Basic Coding Standard
* [PSR-2](http://www.php-fig.org/psr/psr-2/) - Coding Style Guide

Many open source projects also extend the above PSRs with their own coding
style guides, for example:

* [Symfony](http://symfony.com/doc/current/contributing/code/standards.html)

Many advanced PHP IDEs and editors also offer code refactoring via plugins and
extensions. With predefined common coding styles such as PSR-1 and PSR-2, with
refactoring code, automatic code generation, autocomplete and similar things,
consistently writing standardized PHP code can be done with ease.

The more you write code, the more you will understand the importance in using
common style guides. Especially when working with source code control (eg, Git,
coworkers), or just to be consistent in general.

## See also

* [Core PHP language specification](https://github.com/php/php-langspec)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) - Tokenizes
  PHP, JavaScript and CSS files, and detects violations of a defined set of
  coding standards.
* [PHP Coding Standards Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) -
  A tool that fixes coding standards in your code.
* [PHP-FIG: Extended Coding Style Guide proposal](https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md)
