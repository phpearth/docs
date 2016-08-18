---
title: "PHP versions usage"
read_time: "2 min"
updated: "August 18, 2016"
group: "articles"
redirect_from: "/articles/php-version-usage-october-2014/"
permalink: "/articles/php-versions-usage/"
---

[Supported PHP versions](http://php.net/supported-versions.php) provides some
insights on which version you should pick for your project.

Currently the recommended version to use in PHP is the latest PHP 7, however the
statistic of PHP version usage on servers is kind of **shocking**.

Thanks to the [research](http://blog.pascal-martin.fr/post/php-versions-stats-2014-10-en)
of PHP versions usage we have some data to work with. The majority of PHP servers
still has PHP 5.3 installed and also old versions of PHP 5.2 and less are still
used.

![PHP version usage, october 2014](/images/articles/php-version-usage.png "PHP version usage, october 2014")

PHP 5.3 version has reached EOL (end of life) in
[august, 2014](http://php.net/archive/2014.php#id2014-08-14-1), PHP version 5.5
has reached EOL (end of life) in
[july, 2016](http://php.net/archive/2016.php#id2016-07-21-2). For more information
about unsupported EOL PHP versions visit
[PHP.net unsupported branches](http://php.net/eol.php).

PHP 5.6.0 currently has active support, but that will expire in december 2017.

## PHP version requirements in open source

Having wide availability of the software is important for open source projects.
Increasing minimum version requirement is many times a delicate thing, but more
and more projects are requiring more or less the latest versions already. Enforcing
later versions is a good thing to encourage users to upgrade their PHP on servers.

## Why is upgrading PHP important?

* New great features
* Better performance (PHP 7 has gained huge performance improvement)
* Better coding possibilities
* Future preparation for less painful upgrades of your application
* Security
* Open source libraries must now support old versions because there are still
  many old versions used (wide availability of developer's code is important)

## What to do?

* Ask for better environment - server with latest stable PHP version
* Upgrade to the latest PHP version and refactor old code
* Push the miniminum version of PHP in composer.json files to newer PHP versions
* Make maintainability strategy for your projects to upgrade server software
  together with PHP on its regular basis.

## See also

* [PHP minimal version in Symfony 3.0](http://symfony.com/blog/symfony-3-0-the-roadmap) - Symfony 3.0 roadmap and minimal PHP version
* [Jordi Boggiano](https://seld.be/notes/php-versions-stats-2016-1-edition) - PHP Versions Stats on packagist.org
* [schmengler-se.de](http://www.schmengler-se.de/en/2014/11/why-i-am-actively-going-to-drop-php-5-3-compatibility/) - Dropping PHP 5.3 support
* [ircmaxell's blog post on install statistics](http://blog.ircmaxell.com/2014/12/php-install-statistics.html) - PHP Install Statistics
