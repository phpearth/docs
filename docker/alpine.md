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
