# Alpine Linux

Alpine images are frequently used with Docker because they provide a very small
final Docker image size. This has an advantage when pulling base images from
Docker registry, and when pushing them to the registry or production.

Alpine Linux provides `apk` tool for managing packages.

* [Alpine Linux package management](https://wiki.alpinelinux.org/wiki/Alpine_Linux_package_management)

## Alpine PHP packages

Alpine already offers a very good [PHP packages](https://pkgs.alpinelinux.org/packages?name=php7*)
in their official repository.

In Docker, you can install the PHP very easily with `apk`:

```Dockerfile
FROM alpine:3.7

RUN apk add --no-cache php7
```

Keep in mind that there is a separate repository for each PHP extension. For example,
if you'll need `session` extension, you'll need to add the `php7-session` package:

```Dockerfile
FROM alpine:3.7

RUN apk add --no-cache php7 php7-session
```

## PHP.earth Alpine repository

PHP.earth Docker images provide a custom Alpine repository located at
[https://repos.php.earth](https://repos.php.earth) to provide the latest PHP
versions and most customizations required for the elegant PHP development with
Docker.

The PHP.earth Alpine repository can be used in the following way:

Add the PHP.earth repository to your Dockerfile:

```Dockerfile
FROM alpine:3.7

ADD https://repos.php.earth/alpine/phpearth.rsa.pub /etc/apk/keys/phpearth.rsa.pub
RUN echo "https://repos.php.earth/alpine/v3.7" >> /etc/apk/repositories \
    && apk add --no-cache php7.2
```

Going line by line:

1. First line made the PHP.earth 3rd party repository trusted, and is similar to
   this:

  ```bash
  wget -O /etc/apk/keys/phpearth.rsa.pub https://repos.php.earth/alpine/phpearth.rsa.pub
  ```

2. Then you can register the repository on APK, by adding a new line with
  repository link in `/etc/apk/repositories`:

  ```bash
  echo "https://repos.php.earth/alpine/v3.7" >> /etc/apk/repositories
  ```

3. To install PHP:

  ```bash
  apk add --no-cache php7.2
  ```

### PHP.earth packages

PHP.earth Alpine Linux repository includes the following packages:

* PHP 7.2
* PHP 7.1
* PHP 7.0
* OpenLiteSpeed
* Composer
* PHPUnit
* Some most commonly used PECL extensions

PHP packages in PHP.earth repository are prefixed with `php7.2`, `php7.1`, and
`php7.0`.

```bash
apk search --no-cache php7.2
```

For more information about what is included in the PHP.earth Alpine repository,
visit [repos.php.earth](https://repos.php.earth).
