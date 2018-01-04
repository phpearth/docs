## Install PHP on Alpine Linux

First, let's install PHP. Alpine Linux official repositories contain slightly
outdated PHP versions. You can install PHP on Alpine Linux using `apk` tool:

```bash
apk add --no-cache php7
```

### 3rd party repository

PHP.earth Alpine repository provides the latest PHP versions.

Adding PHP.earth repository to your Alpine:

```bash
apk add --no-cache wget ca-certificates \
&& wget -O /etc/apk/keys/phpearth.rsa.pub https://repos.php.earth/alpine/phpearth.rsa.pub \
&& echo "https://repos.php.earth/alpine/v3.7" >> /etc/apk/repositories
```

PHP.earth PHP packages are prefixed with `php7.2`, `php7.1` and `php7.0`.
Installing latest PHP is as simple as:

```bash
apk add --no-cache php7.2
```
