---
title: "PHP version usage for october, 2014"
read_time: "2 min"
updated: "february 3, 2015"
group: "articles"
permalink: "/articles/php-version-usage-october-2014/"
---

PHP 5.3 version has reached EOL (end of life) in [august, 2014][php-53], PHP 5.4
is already at the phase of receiving security fixes only and will reach EOL
next year (2015). Next major version of PHP 7 is already in development and is planned
to be released in november, 2015. But the statistics of PHP version usage on servers is
kind of **shocking**.

Thanks to the [research][pascal-martin] of PHP versions usage we have some data
to work with. The majority of PHP servers has PHP 5.3 installed and also
old versions of PHP 5.2 and less are still very widely used.

![PHP version usage, october 2014](/images/articles/php-version-usage.png "PHP version usage, october 2014")

## Why is upgrading PHP important?

* New great features
* Performance
* Better coding possibilities
* Future preparation for less painful upgrades of your app
* Security
* Open source libraries must now support old versions because there are still many old versions used
  (wide availability of developer's code is important)

## What to do?

* Ask for better environment - server with newer PHP versions
* Let's upgrade to PHP 5.6 or 5.5 and refactor old code
* Push the miniminum version of PHP in composer.json files to newer PHP versions

## Resources

* [Pascal Martin's blog][pascal-martin] - PHP Usage statistics october 2014
* [PHP minimal version in Symfony 3.0][symfony] - Symfony 3.0 roadmap and minimal PHP version
* [Jordi Boggiano][composer] - PHP version adoption
* [PHP supported versions][versions-timeline] - timeline of PHP versions support
* [schmengler-se.de][dropping-53] - Dropping PHP 5.3 support
* [ircmaxell's blog post on install statistics][ircmaxell] - PHP Install Statistics

[php-53]: http://php.net/archive/2014.php#id2014-08-14-1
[pascal-martin]: http://blog.pascal-martin.fr/post/php-versions-stats-2014-10-en
[symfony]: http://symfony.com/blog/symfony-3-0-the-roadmap
[composer]: http://seld.be/notes/my-view-of-php-version-adoption
[versions-timeline]: http://php.net/supported-versions.php
[dropping-53]: http://www.schmengler-se.de/en/2014/11/why-i-am-actively-going-to-drop-php-5-3-compatibility/
[ircmaxell]: http://blog.ircmaxell.com/2014/12/php-install-statistics.html
