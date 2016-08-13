---
title: "How to write standardized PHP code?"
read_time: "1 min"
updated: "March 14, 2016"
group: "general"
permalink: "/faq/coding-standards/"

compass:
  prev: "/faq/certification/"
  next: "/faq/configuration-in-php-applications/"
---

For PHP there are many standards or coding style recommendations that you should
look into when writing code. It simplifies collaboration on the code and makes
it more readable once you get used to one style.

One of the most adopted standards recommendation in PHP is [PHP FIG](http://php.fig.org)
which recommends coding style via two PSRs (PHP Standard Recommendation):
* [PSR-1](http://www.php-fig.org/psr/psr-1/) - Basic Coding Standard
* and [PSR-2](http://www.php-fig.org/psr/psr-2/) - Coding Style Guide

Many open source projects also extend above PSRs with their own coding style guides:

* [Symfony](http://symfony.com/doc/current/contributing/code/standards.html)

Many advanced PHP IDEs and editors offer also code refactoring with their plugins
and extensions.

## See also

* [Core PHP language specification](https://github.com/php/php-langspec)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) - Tokenizes PHP,
  JavaScript and CSS files and detects violations of a defined set of coding
  standards.
* [PHP Coding Standards Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) - Tool
  that fixes coding standards in your code.
* [phpfmt](https://github.com/phpfmt/fmt) - Tooling for PHP - testing, code
  coverage and formatting.
