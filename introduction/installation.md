---
title: "How to Install PHP? Which Version of PHP to Use?"
updated: "February 10, 2017"
permalink: "/faq/intro/php-installation/"
---

PHP installation might not be so obvious at first. Here is a quick overview of
how to get up and running fast.


## PHP Versions

Make sure to use the latest stable version **PHP 7.1**. Versions on some online
production servers can be few versions behind the [latest PHP releases][php-downloads]
because of hosting policies and backwards compatibility. Don't let this stop you
from using the latest PHP with all the shiny new features.


## PHP Installation

You can download and use PHP binaries and sources for
[Windows][windows-php-net]
and [other systems][php-downloads] from the official site. Building PHP from
source on your own has its benefits to configure your build according to your
specific requirements. Refer to the [PHP manual][php-manual], how to build PHP
from source.

PHP has useful [built-in web server][built-in-server] for local development.
Inside your project folder you can run it from the command line:

```bash
$ php -S localhost:8000
```

and visit `http://localhost:8000/index.php` in your browser.

To successfully develop and run PHP applications you will eventually need more
advanced web server such as Apache or Nginx, database such as MySQL or MariaDB,
and other useful tools - [Xdebug](https://xdebug.org/), [Adminer](https://www.adminer.org/),
[phpMyAdmin](https://www.phpmyadmin.net/) etc. Whether you're using Windows, OS X
or Linux you can simplify mentioned installations by using one of the all-in-one
packages:

* [AMPPS][ampps]
* [XAMPP][xampp]
* [Zend Server][zend-server]


## Windows Installation

Beside above, on Windows you can also use one of the following useful all-in-one
packages:

* [Easy PHP](http://www.easyphp.org/)
* [WPN XM](http://wpn-xm.org/)


## OS X

By default OS X includes slightly outdated PHP. To install and use the latest
PHP on OS X, you can also use one of the following OS X native options beside
already mentioned packages above:

* [Homebrew PHP repository](https://github.com/Homebrew/homebrew-php) for
  [Homebrew](http://brew.sh/) package manager.
* [Liip's PHP binary package](http://php-osx.liip.ch/)
* [MacPorts](https://www.macports.org/) - Package management system provided by
  an open-source community initiative.
* [MAMP][mamp] - All in one package for OS X (and Windows).


## Linux Installation

Linux and Unix based operating systems are a bit more complex and diverse.
Learning to use these environments is recommended for developers. After all,
there is a high chance that your web application will be hosted on one of such
servers. PHP installation can be done with package managers, that distribution uses
(`apt-get`, `pacman`, `zypper` or `yum` with its successor `dnf`).

Simplified example of apt usage for Debian based distributions (Debian, Ubuntu...):

```bash
$ sudo apt-get install php
```

and yum (or newer dnf) for Fedora based distributions (Fedora, RHEL, CentOS...):

```bash
$ sudo dnf install php
```

Keep in mind that there are many other packages such as `php-curl`, `lamp-server`,
`php-mysql`, to be explored with your distribution.


### 3rd Party Linux Repositories

Most of the time the default PHP version provided by the distribution will be
few versions behind the latest stable release from PHP.net. This is where some
useful 3rd party repositories come in:

* [deb.sury.org][deb-sury-org] - For Debian and Ubuntu
* [REMI repository][remi] - For Fedora, CentOS and RHEL
* [Webtatic][webtatic] - For Fedora, CentOS and RHEL


## Virtualization

More advanced and recommended way of professional PHP development these days is
by using virtualization software such as [Virtual Box][virtual-box],
[Vagrant][vagrant] and [Docker][docker]. These help you reduce the frictions
between development and production environments. With virtual environments you
can make your development (software versions, configuration...) the same as your
production is.

### Docker

When using Docker check the PHP images at [Docker Hub](https://hub.docker.com/_/php/).


[php-downloads]: http://php.net/downloads.php
[windows-php-net]: http://windows.php.net
[built-in-server]: http://php.net/manual/en/features.commandline.webserver.php
[ampps]: http://www.ampps.com/
[xampp]: http://apachefriends.org
[zend-server]: http://www.zend.com/en/products/server-ce/
[php-manual]: http://php.net/manual/en/install.php
[mamp]: http://www.mamp.info/en/downloads/
[deb-sury-org]: https://deb.sury.org/
[remi]: http://blog.famillecollet.com/
[webtatic]: https://webtatic.com/
[virtual-box]: https://www.virtualbox.org
[vagrant]: http://vagrantup.com
[docker]: https://www.docker.com/
