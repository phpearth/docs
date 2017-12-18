# PHP on Fedora

For Fedora Linux use the [Remi's RPM repository](https://rpms.remirepo.net/wizard/):

```bash
dnf install http://rpms.remirepo.net/fedora/remi-release-26.rpm
dnf config-manager --set-enabled remi-php72
dnf update
dnf install php
```
