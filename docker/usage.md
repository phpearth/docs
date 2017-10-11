# Usage

For using these images you'll usually want to create a `Dockerfile` or go further
and use Docker Compose to simplify usage of multiple containers for your application.

## Dockerfile

Create a `Dockerfile` for your setup:

### Alpine Nginx

For images that use Alpine Linux as a base, you can create a simple Nginx container
with PHP FPM in the following way:

```Dockerfile
FROM phpearth/php:7.1-nginx
```

### Alpine OpenLiteSpeed

```Dockerfile
FROM phpearth/php:7.1-litespeed
```

### PHP CLI script

To run a CLI PHP script:

```bash
docker run -it --rm --name my-cli-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp phpearth/php php script.php
```

### PHP 7.2

To use PHP 7.2 images just prepend the tag name with `7.2`:

* `phpearth/php:7.2`
* `phpearth/php:7.2-nginx`
* `phpearth/php:7.2-litespeed`
* `phpearth/php:7.2-apache`
* `phpearth/php:7.2-cgi`

## Install PHP extensions

To install additional PHP extensions, you can use our packages from the PHP.earth
Alpine repository:

```Dockerfile
FROM phpearth/php:7.1-nginx

RUN apk add --no-cache php7.1-libsodium php7.1-mcrypt php7.1-soap
```

## Services

Best practice with Docker is to use one process per container. However sometimes
you want to package multiple services into a single container for various reasons:
simpler deployment, simpler usage, and similar cases.

To run multiple services in a single container there are multiple ways:

* Supervisord

  A solid solution to run and customize services. It requires Python.

* runit

  These images use runit because for smaller usage resources and image sizes.
