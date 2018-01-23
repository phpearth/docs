# PHP extensions

## Pre-installed extensions

By default these images come with some pre-installed PHP extensions that are
required to run some every day PHP applications. These include the following:

* [bcmath](http://php.net/manual/en/book.bc.php)
* [bz2](http://php.net/manual/en/book.bzip2.php)
* [calendar](http://php.net/manual/en/book.calendar.php)
* [ctype](http://php.net/manual/en/book.ctype.php)
* [curl](http://php.net/manual/en/book.curl.php)
* [dom](http://php.net/manual/en/book.dom.php)
* [exif](http://php.net/manual/en/book.exif.php)
* [fileinfo](http://php.net/manual/en/book.fileinfo.php)
* [filter](http://php.net/manual/en/book.filter.php)
* [ftp](http://php.net/manual/en/book.ftp.php)
* [hash](http://php.net/manual/en/book.hash.php)
* [iconv](http://php.net/manual/en/book.iconv.php)
* [json](http://php.net/manual/en/book.json.php)
* [xml](http://php.net/manual/en/book.libxml.php)
* [mbstring](http://php.net/manual/en/book.mbstring.php)
* [PCRE](http://php.net/manual/en/book.pcre.php)
* [POSIX](http://php.net/manual/en/book.posix.php)
* [Mhash](http://php.net/manual/en/book.mhash.php)
* [openssl](http://php.net/manual/en/book.openssl.php)
* [readline](http://php.net/manual/en/book.readline.php)
* [SimpleXML](http://php.net/manual/en/book.simplexml.php)
* [Semaphore](http://php.net/manual/en/book.sem.php)
* [shmop](http://php.net/manual/en/book.shmop.php)
* [sockets](http://php.net/manual/en/book.sockets.php)
* [tokenizer](http://php.net/manual/en/book.tokenizer.php)
* [XML Parser](http://php.net/manual/en/book.xml.php)
* [XMLReader](http://php.net/manual/en/book.xmlreader.php)
* [XMLWriter](http://php.net/manual/en/book.xmlwriter.php)
* [Zip](http://php.net/manual/en/book.zip.php)
* [Zlib](http://php.net/manual/en/book.zlib.php)

## Supported extensions

PHP extensions:

* [dba](http://php.net/manual/en/book.dba.php)
* [enchant](http://php.net/manual/en/book.enchant.php)
* [gettext](http://php.net/manual/en/book.gettext.php)
* [gd](http://php.net/manual/en/book.image.php)
* [gmp](http://php.net/manual/en/book.gmp.php)
* [imap](http://php.net/manual/en/book.imap.php)
* [intl](http://php.net/manual/en/book.intl.php)
* [ldap](http://php.net/manual/en/book.ldap.php)
* [mcrypt](http://php.net/manual/en/book.mcrypt.php)
* [mysqli](http://php.net/manual/en/book.mysqli.php)
* [mysqlnd](http://php.net/manual/en/book.mysqlnd.php)
* [pcntl](http://php.net/manual/en/book.pcntl.php)
* [pdo](http://php.net/manual/en/book.pdo.php)
* [pdo_sqlite](http://php.net/manual/en/ref.pdo-sqlite.php)
* [pdo_mysql](http://php.net/manual/en/ref.pdo-mysql.php)
* [pdo_pgsql](http://php.net/manual/en/ref.pdo-pgsql.php)
* [PostgreSQL](http://php.net/manual/en/book.pgsql.php)
* [pspell](http://php.net/manual/en/book.pspell.php)
* [recode](http://php.net/manual/en/book.recode.php)
* [snmp](http://php.net/manual/en/book.snmp.php)
* [soap](http://php.net/manual/en/extensions.php)
* [sqlite3](http://php.net/manual/en/book.sqlite3.php)
* [tidy](http://php.net/manual/en/book.tidy.php)
* [wddx](http://php.net/manual/en/book.wddx.php)
* [xmlrpc](http://php.net/manual/en/book.xmlrpc.php)
* [xsl](http://php.net/manual/en/book.xsl.php)

PECL extensions:

* [apcu](https://pecl.php.net/package/APCu)
* [imagick](https://pecl.php.net/package/imagick)
* [libsodium](https://pecl.php.net/package/libsodium)
* [memcached](https://pecl.php.net/package/memcached)
* [mongodb](https://pecl.php.net/package/mongodb)
* [redis](https://pecl.php.net/package/redis)
* [swoole](https://pecl.php.net/package/swoole)
* [xdebug](https://pecl.php.net/package/xdebug)

## Installing extensions

These Docker images include a PHP.earth Alpine repository that comes with many
pecl extensions and all PHP extensions.

```bash
apk add --no-cache php72-{extension-name}
```

With `Dockerfile`, this can be used in the following way:

```Dockerfile
FROM phpearth/php

RUN apk add --no-cache php7.2-xdebug
```

However many times you'll want to install some other pecl extension as well. For
that you'll need to build it from source using the provided `php72-dev` package,
which includes `phpize`, `php-config` and PHP header files required to build
particular extension from source.

Here's a more generic way how to install such PHP extension. Replace names in
curly brackets with extension you're installing:

```Dockerfile
FROM phpearth/php

RUN apk add --no-cache --virtual .build-deps php7.2-dev git gcc g++ linux-headers make \
    && mkdir -p /usr/src \
    && cd /usr/src \
    # Download the extension source code from Git repository or pecl.php.net
    && git clone git://github.com/{vendor}/{php-extension} \
    && cd {php-extension} \
    && phpize \
    && ./configure \
    # Build the extension with number of CPU cores
    && make -j "$(getconf _NPROCESSORS_ONLN)" \
    && make install \
    # Enable the extension for PHP to load it as shared one
    && echo "extension={php-extension}.so" | tee /etc/php/conf.d/{php-extension}.ini \
    # Clean build dependencies and source code
    && apk del --no-cache --purge .build-deps \
    && rm -rf /usr/src/*
```

## See also

* [PHP Extensions List/Categorization](http://php.net/manual/en/extensions.php)
