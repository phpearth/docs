---
stage: drafting
---

# PHP extensions introduction

PHP consists of extensions. PHP extension is a self containing module that
provides some particular functionality. They are written in C programming
language, however in the PHP ecosystem you might find extensions written also in
C++ or other languages.

## Categorization

To understand PHP extensioning system, there are two main types of PHP extensions.
PHP extensions included in the
[PHP source code repository](https://github.com/php/php-src/tree/master/ext) and
[PECL extensions](https://pecl.php.net) which are 3rd party extensions maintained
outside of the PHP source code repository by PHP community. They can be found in
a separate repository at pecl.php.net.

## PHP extensions

PHP extensions included in the PHP can be installed when you download and install
the PHP. These extensions can be categorized based on their installation type:

* Core extensions

  The so called core extensions are included in the PHP itself and cannot be left
  out of the PHP installation/binary with compilation options. They are always
  available on every PHP installation.

* Bundled PHP extensions

  Bundled extensions don't require additional libraries for compiling and can be
  left out of the PHP installation with compilation options.

* External PHP extensions

  The so called external extensions require additional libraries for compiling,
  and can be left out of the PHP installation with compilation options.

## Installation

Installation of PHP extensions is a process of downloading extension source code
and compilation:

```bash
# Let's say php source code is located in /usr/src/php
cd /usr/src/php/ext/extension-name
phpize
./configure
make -jN
make install
```

* `N` is the number of processor cores (sometimes a good number is also number
  of processor cores + 1).

To simplify the extension installation, usage of prebuilt packages is advised.


## Pecl extensions

Pecl extensions are either some of the PHP core extensions that got moved to PECL
or the community contributed ones. They are located at pecl.php.net repository.
Installation can done with a simple `pecl install` command:

```bash
pecl install {extension-name}
```

Since `pecl` command is part of the Pear system, sometimes you might want to omit
the Pear installation. You can install each pecl extension also by manually, by
downloading the `.tgz` TAR archive file compressed with gzip from the pecl.php.net
site and install it with the PHP development tools that come with the PHP
installation:

```bash
git clone https://github.com/{vendor}/{pecl-extension-src}.git
cd {pecl-extension-src}
phpize
./configure
make && make install
```

Some examples of PECL extensions:

* [apcu](https://pecl.php.net/package/APCu)
* [imagick](https://pecl.php.net/package/imagick)
* [memcached](https://pecl.php.net/package/memcached)
* [mongodb](https://pecl.php.net/package/mongodb)
* [redis](https://pecl.php.net/package/redis)
* [swoole](https://pecl.php.net/package/swoole)
* [xdebug](https://pecl.php.net/package/xdebug)
