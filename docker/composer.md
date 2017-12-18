# Composer with Docker development

Composer is a de-facto standard for managing PHP packages. Good practice however
is to not include it in the production Docker images.

Let's first take a look at how to use Composer with Docker in general. There are
some established best practices:

## 1. Official Docker Composer image

* [Docker Composer](https://hub.docker.com/_/composer/) - Official Docker image
  with Composer.

Pros:

* Official Composer Docker image
* Simple to use
* Separation of development and production

Cons:

* When your application requires additional PHP extensions, or is using the
  scripts defined in the `composer.json` file, you'll either need to install them
  in this additional Composer image or pass the `--ignore-platform-reqs` and
  `--no-scripts` options and run scripts separately.

Quick usage:

```bash
docker run -it --rm -v `pwd`:/app composer install
```

## 2. Custom installation

You can also simply install Composer per project basis on your own in your
`Dockerfile`:

```Dockerfile
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
```

If you'll need to install PHP packages from sources instead of zip archives you
will also need to install
[version control system](https://getcomposer.org/doc/00-intro.md#system-requirements)
such as Git.

Composer installation in general requires several PHP extensions installed:

* phar
* json
* iconv or mbstring
* openssl
* zip
* zlib

and few system packages, depending on what version system you will use:

* curl
* git
* subversion
* openssh
* openssl
* mercurial

```Dockerfile
RUN apt-get update && apt-get -y --no-install-recommends install git \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && rm -rf /var/lib/apt/lists/*
```

Composer can be then used in the following ways:

```bash
docker run -it --rm -v `pwd`:/usr/src/myapp -w /usr/src/myapp php-app composer
```

With Docker Compose

```bash
docker-compose run --rm -w /var/www/app app composer
```

Pros:

Advantage of custom installation per project is that Composer is running with the
same PHP installation as your application and can pass the PHP extensions checkings.

Cons:

* Composer is present also in production and to have separate production image
  you'll need to create more than one Dockerfile for application or use Docker
  build arguments

### Docker build arguments

When building production images, you can avoid adding Composer in your image with
build arguments. The following example uses Docker build arguments:

```Dockerfile
FROM php:7.2

ARG APP_ENV=prod

RUN if [ ${APP_ENV} = "dev" ]; then \
        php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer; \
    fi
```

You can set the build arguments in the Docker Compose files and manage how the
image is build for each of your environment:

```yaml
# docker-compose.dev.yaml
version: '3.4'

services:
  app:
    volumes:
      - ../:/var/www/app
    build:
      args:
        - APP_ENV=dev
    ports:
      - 80:80
```

## PHP.earth Docker images

[PHP.earth Docker images](https://github.com/php-earth/docker-php) come with
optional Composer package which also includes all required PHP extensions
dependencies.

For Alpine Linux there is a `composer` package available:

```Dockerfile
FROM phpearth/php:7.2-nginx

RUN apk add --no-cache composer
```

## Prestissimo Composer plugin

[Prestissimo](https://github.com/hirak/prestissimo) is a Composer plugin for faster
parallel downloading of PHP packages.

```Dockerfile
FROM phpearth/php:7.2-nginx

ARG APP_ENV=prod

RUN if [ ${APP_ENV} = "dev" ]; then \
        apk add --no-cache git openssh composer \
        && composer global require hirak/prestissimo; \
    fi
```
