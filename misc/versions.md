# PHP versions usage

[Supported PHP versions](http://php.net/supported-versions.php) provides some
insights on which version you should pick for your project.

Currently, the recommended version of PHP to use is the latest PHP 7, but the
statistic of PHP version usage on servers is kind of **shocking**.

Thanks to the [research](http://blog.pascal-martin.fr/post/php-versions-stats-2014-10-en)
of PHP version usage, we have some data to work with. The majority of PHP servers
still have PHP 5.3 installed, and old versions of PHP 5.2, although less so,
are still also used.

![PHP version usage, october 2014](https://raw.githubusercontent.com/phpearth/PHP.earth/master/assets/images/intro/php-version-usage.png "PHP version usage, october 2014")

PHP 5.3 reached EoL (End of Life) in [August 2014](http://php.net/archive/2014.php#id2014-08-14-1),
and PHP 5.5 reached EoL (End of Life) in [July 2016](http://php.net/archive/2016.php#id2016-07-21-2).
For more information about unsupported EoL PHP versions, visit [PHP.net unsupported branches](http://php.net/eol.php).

PHP 5.6.0 currently has active support, but that will expire in December 2017.

## PHP version requirements in open source

Having wide availability of the software is important for open source projects.
Increasing minimum version requirement is in many cases a delicate issue, but
more and more projects are requiring more or less the latest versions already.
Enforcing later versions is a good thing to encourage users to upgrade the PHP
used on their servers.

## Why is upgrading PHP important?

* New great features.
* Better performance (PHP 7 has huge performance improvements over previous
  versions).
* Better coding possibilities.
* Future preparation for less painful upgrades of your application.
* Security.
* Without upgrading, open source libraries are forced to support older versions
  due to there being many older versions still in use (wide availability of
  developer's code is important).

## What to do?

* Ask for better environment: A server with the latest stable PHP version
  installed and operable.
* Upgrade to the latest PHP version and refactor old code.
* Push the miniminum version of PHP in `composer.json` files to newer PHP
  versions.
* Create a maintainability strategy for your projects to upgrade server
  software together with PHP on a regular basis.

## See also

* [PHP minimal version in Symfony 3.0](http://symfony.com/blog/symfony-3-0-the-roadmap) -
  Symfony 3.0 roadmap and minimal PHP version.
* [Jordi Boggiano](https://seld.be/notes/php-versions-stats-2016-1-edition) -
  PHP versions stats on packagist.org.
* [schmengler-se.de](http://www.schmengler-se.de/en/2014/11/why-i-am-actively-going-to-drop-php-5-3-compatibility/) -
  Dropping PHP 5.3 support.
* [ircmaxell's blog post on install statistics](http://blog.ircmaxell.com/2014/12/php-install-statistics.html) -
  PHP install statistics.
