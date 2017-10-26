# Docker for PHP developers

Docker provides a way to run applications isolated in containers. Working with docker is a really easy and useful habbit, as a developer you should always aim for the best practices and tools. A portable and flexible virtual environment is a powerful tool to encapsulate your application or quickly start an other experiment without overcomlicated development/production server architecture.

## What is docker?

Docker is the company driving the container movement and the only container platform provider to address every application across the hybrid cloud. Today’s businesses are under pressure to digitally transform but are constrained by existing applications and infrastructure while rationalizing and increasingly diverse portfolio of clouds, datacenters and application architectures. Docker enables true independence between applications and infrastructure and developers and IT ops to unlock their potential and creates a model for better collaboration and innovation.

What to know more about it? Check out [https://www.docker.com/what-container](https://www.docker.com/what-container) page for more information.

## Installing the service

No mather what is your host system, you can install docker and you can run any container in your environment, you can run
a linux container on a windows and inside there you can run multiple services for your development. For installing follow
the instructions on the following pages:

* Mac: https://www.docker.com/docker-mac
* Windows Desktop: https://www.docker.com/docker-windows
* Windows Server: https://www.docker.com/docker-windows-server
* Ubuntu: https://www.docker.com/docker-ubuntu
* Debian: https://www.docker.com/docker-debian
* Centos: https://www.docker.com/docker-centos-distribution
* Fedora: https://www.docker.com/docker-fedora

Documentation about installation: https://docs.docker.com/engine/installation

## Docker chapters

* [Composer with Docker development](/docker/composer.md)
* [Certbot](/docker/certbot.md)
* [Building PHP From Source](/docker/php.md)
* [PHP extensions](/docker/permissions.md)
* [Permissions](/docker/permissions.md)
* [Usage](/docker/usage.md)
* [Builing images](/docker/build.md)
* [Alpine Linux](/docker/alpine.md)
* [Alpine PHP.earth repository](/docker/alpine-php-earth.md)
* [Docker recipes](/docker/recipes.md)

## Quickstart

After you installed docker you should able to run `docker` and `docker-compose` in your terminal/command line tool. For quickly boot up a project you will need to create one file in your project root folder: `docker-compose.yml` with this basic configuration:
```yaml
version: "2"
services:
  web:
    image: phpearth/php:7.1-apache
    volumes:
      - ./:/var/www/localhost/htdocs
    ports:
      - 8080:80
```

For running it open your project folder in command line and call: `docker-compose up`

It will download the group image and start your server, it will link your project folder with the default server root and it will bound the server http output to your machine :8080 port.

After it's started check your http://localhost:8080 url and you should able to start develop your project.
> Note: You should bound a `src` folder into the container instead the whole project by replacing the ./ to ./src

For more options check the documentation: https://docs.docker.com/compose/compose-file

## See also

Recommended additional resources when learning Docker for PHP development:

* [Official Docker Documentation](https://docs.docker.com/)
* [Official Docker PHP images](https://hub.docker.com/_/php/)
* [Awesome Docker](https://github.com/veggiemonk/awesome-docker) - A curated list
  of Docker resources and projects
* [Shipping Docker](https://shippingdocker.com/) - Docker video tutorials
