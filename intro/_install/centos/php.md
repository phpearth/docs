# Install PHP on CentOS

Official PHP packages on CentOS Linux distribution are slightly behind the
current latest PHP stable versions. To get latest stable PHP, use
[Remi's RPM repository](https://rpms.remirepo.net/wizard/):

```bash
yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum install yum-utils
yum-config-manager --enable remi-php72
yum update
yum install php
```
