# Permissions

Linux users and groups might seem a bit difficult to set up properly at the
beginning on Docker and the host system.

This guide will show some best practices how to deal with users, groups and
permissions when mounting volumes and adding folders from the host to Docker
images.

## What is the main issue?

User from a host is a different one compared to a user within a Docker container.
These two users have also different id.

You can get a user id by running the `id` command:

See that which process runs as which user:

```bash
ps aux
```

Check the id of specific user, for example, user `www-data`:

```bash
id www-data # will be "33" in Ubuntu containers/servers
```

## Solutions

### usermod

`usermod` command modifies a user account.

* [usermod](http://man7.org/linux/man-pages/man8/usermod.8.html)

### chown

```bash
chown -R 33 application/
```

### setfacl

* [setfacl](http://man7.org/linux/man-pages/man1/setfacl.1.html)

### gosu

* [gosu](https://github.com/tianon/gosu)

## See also

Recommended read and video tutorials:

* [Docker & File Permissions](https://shippingdocker.com/docker-in-development/docker-file-permissions/)
* [Servers for Hackers: Linux Permissions](https://serversforhackers.com/video/linux-permissions)
* [Servers for Hackers: Linux ACL](https://serversforhackers.com/video/linux-acls)
* [Symfony: Setting up or Fixing File Permissions](http://symfony.com/doc/current/setup/file_permissions.html)
