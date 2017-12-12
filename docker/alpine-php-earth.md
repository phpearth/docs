# PHP.earth Alpine repository

These images provide a custom Alpine repository located at
[https://repos.php.earth](https://repos.php.earth) to provide the latest PHP
versions and most customizations required for the elegant PHP development with
Docker.

The PHP.earth Alpine repository can be used in the following way:

1. First you need to make the PHP.earth 3rd party repository trusted:

  ```bash
  wget -O /etc/apk/keys/phpearth.rsa.pub https://repos.php.earth/alpine/phpearth.rsa.pub
  ```

2. Then you can register the repository on APK, by adding a new line with
  repository link in `/etc/apk/repositories`:

  ```bash
  echo "https://repos.php.earth/alpine/v3.7" >> /etc/apk/repositories
  ```

## PHP.earth repository usage

To use this repository with Docker, you can create a `Dockerfile`:

```Dockerfile
FROM alpine:3.7

ADD https://repos.php.earth/alpine/phpearth.rsa.pub /etc/apk/keys/phpearth.rsa.pub
RUN echo "https://repos.php.earth/alpine/v3.7" >> /etc/apk/repositories \
    && apk add --no-cache php7.2
```

## Packages

Repository includes the following packages:

* OpenLiteSpeed
* Composer
* PHPUnit
* PHP
* Pecl extensions

PHP packages in PHP.earth repository are prefixed with `php7.2`, `php7.1`, and
`php7.0`.

```bash
apk search --no-cache php7.2
```

For more information on what is included in the PHP.earth Alpine repository,
visit [repos.php.earth](https://repos.php.earth).
