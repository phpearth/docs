## Building PHP from source

Building PHP from source includes 3 main steps:

* `./configure` - this step creates so called Makefiles required to compile PHP
  source code based on the given configure options (`--with-foo`, `--enable-bar`,
  etc).
* `make` - this step starts the actual compilation of the C files.
* `make install` - this step copies built files to system folders.

To build PHP from source code you will need the following prerequisites first:

* autoconf
* gcc
* g++
* make
* rc2

First let's get the PHP sources. You have multiple options here. You can download
prepaired archive from the php.net downloads section or you can download source
code from the Git repository. Difference between the two options is that the
prepared downloads come with the `configure` script.

PHP from the Git repository requires to create a `configure` script before
proceeding. In the root folder there is a `buildconf` script which does that:

```bash
./buildconf
```

After that you can start with configuring your build with the `configure` script.

```bash
cd /usr/src/php
./configure
make
make install
```

### See also

* [PHP Internals](http://www.phpinternalsbook.com)
