---
stage: drafting
---

# PHP installation

Use the [PHP installation wizard](https://php.earth/install) to get the installation
instructions for your system.

## Which version of PHP to use?

Make sure to use the latest stable version **PHP 7.2**. Versions on some online
production servers can be few versions behind the [latest PHP releases][php-downloads]
because of hosting policies and backwards compatibility. Don't let this stop
you from using the latest PHP with all its shiny new features.

## PHP installation

You can download and use PHP binaries and sources for [Windows][windows-php-net]
and [other systems][php-downloads] from the official site. Building PHP from
source on your own has its benefits in that you can configure your build
according to your specific requirements. Refer to the [PHP manual][php-manual]
for learning how to build PHP from source.

PHP has a useful [built-in web server][built-in-server] for local development.
Inside your project folder you can run it from the command line:

```bash
php -S localhost:8000
```

Visit `http://localhost:8000/index.php` in your browser to access it.

To successfully develop and run PHP applications you will eventually need a
more advanced web server such as Apache or Nginx, a database such as MySQL or
MariaDB, and other useful tools such as [Xdebug](https://xdebug.org/),
[Adminer](https://www.adminer.org/), [phpMyAdmin](https://www.phpmyadmin.net/),
etc. Whether you're using Windows, OS X or Linux, you can simplify installation
by using one of these all-in-one packages:

* [AMPPS][ampps]
* [XAMPP][xampp]
* [Zend Server][zend-server]

## Windows installation

Aside from the above, on Windows, you can also use one of the following useful
all-in-one packages:

* [Easy PHP](http://www.easyphp.org/)
* [WPN XM](http://wpn-xm.org/)

## OS X

By default, OS X includes a slightly outdated PHP. To install and use the
latest PHP on OS X, aside from by using one of the aforementioned packages, you
can also use one of the following solutions:

* [Homebrew PHP repository](https://github.com/Homebrew/homebrew-php) for
  [Homebrew](http://brew.sh/) package manager.
* [Liip's PHP binary package](http://php-osx.liip.ch/).
* [MacPorts](https://www.macports.org/) - Package management system provided by
  an open source community initiative.
* [MAMP][mamp] - All-in-one package for OS X (and Windows).

## Linux installation

Linux and Unix based operating systems are a bit more complex and diverse.
Learning to use these environments is recommended for developers. After all,
there's a high chance that your web application will be hosted on such servers.
PHP installation can be done with package managers, that distribution uses
(`apt-get`, `pacman`, `zypper` or `yum`, with its successor `dnf`).

A simplified example of `apt` usage for Debian based distributions (Debian, Ubuntu...):

```bash
sudo apt-get install php
```

and yum (or newer dnf) for Fedora based distributions (Fedora, RHEL, CentOS...):

```bash
sudo dnf install php
```

Keep in mind that there are many other packages such as `php-curl`,
`lamp-server`, `php-mysql` and others, to be explored with your distribution.

### Third-party Linux repositories

Most of the time the default PHP version provided by the distribution will be
a few versions behind the latest stable release from PHP.net. This is where
some useful third-party repositories can come in handy:

* [deb.sury.org][deb-sury-org] - For Debian and Ubuntu.
* [REMI repository][remi] - For Fedora, CentOS and RHEL.
* [Webtatic][webtatic] - For Fedora, CentOS and RHEL.

## Virtualization and containers

A more advanced and recommended way of professional PHP development nowadays is
by using virtualization software such as [Virtual Box][virtual-box], [Vagrant][vagrant-homepage],
and [Docker][docker-homepage]. These help you reduce friction between development and production
environments. With virtual environments, you can make your development (software
versions, configuration...) the same as what your production is.

### Docker

[Docker chapter](/docker) includes more information how to use PHP with Docker.

After you successfully install PHP, proceed to the
[PHP editors and IDEs chapter](/php/intro/editors.md).

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
[vagrant-homepage]: http://vagrantup.com
[docker-homepage]: https://www.docker.com/
