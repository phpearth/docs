# PHP.earth Alpine Linux repository

This repository includes the latest PHP versions and packages for the elegant PHP
development experience on [Alpine Linux](https://alpinelinux.org/).

## Quick usage

On Alpine Linux add a PHP.earth repository and make it trusted:

```bash
apk add --no-cache wget ca-certificates \
&& wget -O /etc/apk/keys/phpearth.rsa.pub https://repos.php.earth/alpine/phpearth.rsa.pub \
&& echo "https://repos.php.earth/alpine" >> /etc/apk/repositories
```

PHP.earth packages are prefixed with `php7.0`, `php7.1`, and `php7.2`:

```bash
apk search --no-cache php7.1*
```

## Docker

Most common use case of Alpine Linux is Docker. Add the PHP.earth repository to
your Dockerfile:

```Dockerfile
FROM alpine:3.6

ADD https://repos.php.earth/alpine/phpearth.rsa.pub /etc/apk/keys/phpearth.rsa.pub
RUN echo "https://repos.php.earth/alpine" >> /etc/apk/repositories \
    && apk add --no-cache php7.1
```

## Requirements

* Alpine Linux `3.6`

## Detailed instructions

### Repository installation

Let's go through repository installation step by step. Before adding the repository,
add wget and common CA certificates PEM files in case they haven't been added
yet. This will enable downloading files from HTTPS locations.

```bash
apk add --no-cache wget ca-certificates
```

Making the repository trusted is done by downloading the public key:

```bash
wget -O /etc/apk/keys/phpearth.rsa.pub https://repos.php.earth/alpine/phpearth.rsa.pub
```

Last step is registering the repository on APK by appending a new line in
`/etc/apk/repositories`:

```bash
echo "https://repos.php.earth/alpine" >> /etc/apk/repositories
```

### PHP 7.1

Current recommended branch of PHP is `7.1`.

## Contributing

PHP.earth Alpine Linux repository is located on [GitHub](https://github.com/php-earth/alpine).
