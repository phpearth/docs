---
title: "How to install PHP? Which version of PHP to use?"
author: "Peter Kokot"
---

### {{ page.title }}

Local instalation of PHP is usually a breeze. But for new users starting with PHP this might not be so obvious.

In most cases for writing new code using the latest stable version of **PHP 5.6** is a good start. On your publicly accessible server
PHP version might be few versions behind the latest stable from php.net because of operating system compatibilities and hosting company
policies but don't get this stop you. PHP is in most cases very stable when it comes out.

#### Windows installation

For Windows operating systems you can download PHP binaries and sources from [windows.php.net][windows-php-net]. There are also many all-in-one
packages that contain PHP, MySQL and web server like Apache or Nginx available. Packages worth checking out:

* [Xampp][xampp]
* [Wamp][wamp]
* [WPN XM][wpn-xm]
* [Zend Server CE][zend-server]

#### Linux installation

PHP Installation on Linux depends mostly on the distribution you're using. There are many Linux distributions available but mostly you get PHP
installed by using your installation package manager.

Debian based distributions

apt-get install php5

Fedora based distributions

yum install php5

#### Mac

PHP Installation on Mac is already included in the OS X.

All in one packages for Mac OS X:

* [MAMP][mamp]

[windows-php-net]: http://windows.php.net
[xampp]: http://apachefriends.org
[wamp]: http://www.wampserver.com/en/
[wpn-xm]: http://wpn-xm.org/
[zend-server]: http://www.zend.com/en/products/server-ce/
[mamp]: http://www.mamp.info/en/downloads/
