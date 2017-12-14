You can download and use PHP binaries and sources for [Windows][windows-php-net]
and [other systems][php-downloads] from the official site. Building PHP from
source on your own has its benefits in that you can configure your build
according to your specific requirements. Refer to the [PHP manual][php-manual]
for learning how to build PHP from source.

PHP has a useful [built-in web server][built-in-server] for local development.
Inside your project folder you can run it from the command line:

```bash
$ php -S localhost:8000
```

Visit `http://localhost:8000/index.php` in your browser to access it.

To successfully develop and run PHP applications you will eventually need a
more advanced web server such as Apache or Nginx, a database such as MySQL or
MariaDB, and other useful tools such as [Xdebug](https://xdebug.org/),
[Adminer](https://www.adminer.org/), [phpMyAdmin](https://www.phpmyadmin.net/),
etc. Whether you're using Windows, OS X or Linux, you can simplify installation
by using one of these all-in-one packages:



## Windows installation

On Windows there are multiple ways to install latest stable PHP. Here we will
cover and recommend you most useful ways to get up and running fast.

### Official Windows binaries

PHP.net maintains Windows binaries available for download at
[windows.php.net](http://windows.php.net). This is what you want to get simple
and working latest PHP installation on Windows.

### Packages

* [Chocolatey](https://chocolatey.org/packages/php)

### All-in-one packages

If you want to have also web server, database and other tools installed in a simple
way together with PHP, check one of these all-in-one stacks:

* [Easy PHP](http://www.easyphp.org/)
* [WPN XM](http://wpn-xm.org/)
* [AMPPS](http://www.ampps.com/)
* [XAMPP](http://apachefriends.org)
* [Zend Server](http://www.zend.com/en/products/server-ce/)

[php-downloads]: http://php.net/downloads.php
[built-in-server]: http://php.net/manual/en/features.commandline.webserver.php

[php-manual]: http://php.net/manual/en/install.php
[mamp]: http://www.mamp.info/en/downloads/
