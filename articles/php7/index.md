---
title: "PHP 7"
read_time: "1 min"
updated: "December 7, 2015"
group: "articles"
permalink: "/articles/php-7/"
og_image: "/images/articles/php7/php7.png"
---

1. [Introduction](#introduction)
2. [Major changes](#major-changes)
    1. [Exceptions in the engine](#exceptions-in-the-engine)
3. [Resources](#resources)

## Introduction

<img src="/images/articles/php7/php7.png" align="right" alt="PHP 7" width="450">
PHP 7 is the next major version of PHP language. This is a living document and will be updated when new features are added to PHP 7 or more good other resources are available elsewhere.

Choosing the version 7 (instead of 6) was chosen because of lots of existing books that was mentioning PHP 6 long before the next version even existed
and to avoid confusion PHP 7 was chosen. Gutman said "We're going to skip version 6 because years ago, we had plans for a 6 but
those plans were very different from what we're doing now", so name PHP 7 was chosen.

## Major changes

The most important changes from PHP 5 you should know:

### Exceptions in the engine

In previous versions you couldn't catch fatal errors. Now you can do this:

```php
function doSomething($obj) {
    $obj->nope();
}

try {
    doSomething(null)
} catch (\Error $e) {
    echo "Error: {$e->getMessage()}\n";
}

// Error: Call to a member function method() on a non-object
```


## Resources

* [PHP 7 migration manual](http://php.net/manual/en/migration70.php) - Official migration manual.
* [Rasmus Lerdorf's PHP 7 development box](https://github.com/rlerdorf/php7dev) - Debian Vagrant box with PHP 7 installed.
* [PHP 7 Docker container](https://github.com/dave1010/php7-docker) - Docker container with PHP 7x
* [PHP 7 logo](http://www.cowburn.info/2015/06/18/php7-logo/) - PHP 7 logo by Vincent Pontier and Peter Cowburn with improvements after the initial [proposal](https://twitter.com/Elroubio/status/598826206503514112).
* [PHP 7 builds](http://php7.zend.com/) - installation packages
* [PHP 7 benchmarks](https://docs.google.com/spreadsheets/d/1qW0avj2eRvPVxj_5V4BBNrOP1ULK7AaXTFsxcffFxT8/edit#gid=1334306309) -
* Reading:
    * [Getting ready for PHP 7](http://php7start.tk/)
    * [PHP 7 Reference](https://github.com/tpunt/PHP7-Reference) - An overview of the features, changes, and backward compatibility breakages in PHP 7.
    * [PHP 7 tutorial](http://php7-tutorial.com/) - Interactive simple and efficient tutorial presenting all the important changes and backwards incompatibilities.
