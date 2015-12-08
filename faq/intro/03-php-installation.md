---
title: "How to install PHP? Which version of PHP to use?"
read_time: "4 min"
updated: "july 2, 2015"
group: "intro"
permalink: "/faq/intro/php-installation/"

compass:
  prev: "/faq/intro/who-developed-php/"
  next: "/faq/intro/php-vs-other-languages/"
---

Local installation of PHP is usually a breeze. But for new users starting with PHP this might not be so obvious.

In most cases you can use the latest stable version of **PHP 5.6** for writing new code. On your publicly accessible server the PHP version might be a few versions behind the latest stable from [php.net][php.net] because of operating system compatibilities and hosting company
policies, but don't get this to stop you. PHP is in most cases very stable when it comes out.

## Windows installation

For Windows operating systems you can download PHP binaries and sources from [windows.php.net][windows-php-net]. There are also many all-in-one
packages that contain PHP, MySQL and web server like Apache or Nginx available. Packages worth checking out:

* [Xampp][xampp]
* [Wamp][wamp]
* [WPN XM][wpn-xm]
* [Zend Server CE][zend-server]

## Linux/Unix installation

PHP Installation on Linux or any other Unix based operating system depends mostly on the distribution you're using. There
are many Linux distributions available but mostly you get PHP installed by using your installation package manager.

### Debian based distributions

Debian based Linux distributions include Debian, Ubuntu. Debian based distributions use apt package manager for installing
packages.

```bash
> apt-get install php5
```

### Fedora based distributions

These include distributions like Fedora, CentOS, RedHat and others. Fedora based distributions use yum package manager for
installing packages.

```bash
> yum install php5
```

Besides the all-in-one packages such as [XAMPP] and [AMPPS] you can also install LAMP server with Apache, MySQL and PHP by checking
`lamp-server` package for your distribution. In many cases PHP version in packages on Linux distributions is few versions behind
the latest stable source on PHP.net downloads. Instead of compiling and building PHP from source you can use many 3rd party alternate
package repositories such as [dotdeb] for Debian, [Ondřej Surý's repository] for Ubuntu and [REMI repository] for Fedora based
distributions.

For compiling from source check the [PHP manual] for common Unix based operating system installation instructions.

## Mac

PHP Installation on Mac is already included in the OS X.

All in one packages for Mac OS X:

* [MAMP][mamp]

Other all-in-one packages that are operating system independent:

* [ammps][ammps]

## Other ways of PHP installation

Recommended and more advanced way of PHP development is to use virtualization software such as [Virtual Box][virtual-box] and [Vagrant][vagrant].

[php.net]: http://php.net
[windows-php-net]: http://windows.php.net
[xampp]: http://apachefriends.org
[wamp]: http://www.wampserver.com/en/
[wpn-xm]: http://wpn-xm.org/
[zend-server]: http://www.zend.com/en/products/server-ce/
[mamp]: http://www.mamp.info/en/downloads/
[ammps]: http://www.ampps.com/
[XAMPP]: http://www.apachefriends.org/en/xampp.html
[AMPPS]: http://www.ampps.com/
[dotdeb]: https://www.dotdeb.org/
[Ondřej Surý's repository]: https://launchpad.net/~ondrej
[REMI repository]: http://blog.famillecollet.com/
[PHP manual]: http://php.net/manual/en/install.unix.php
[virtual-box]: https://www.virtualbox.org
[vagrant]: http://vagrantup.com
