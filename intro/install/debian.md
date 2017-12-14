# Installing PHP on Debian

To install latest stable PHP on Debian Stretch (Debian 9) or Jessie (Debian 8),
you should look into Ondřej Surý's Debian packages at [deb.sury.org](https://deb.sury.org/).

Here are a quick and simple instructions to get up and running fast:

```bash
sudo apt-get install apt-transport-https lsb-release ca-certificates
sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list
sudo apt-get update
sudo apt-get install php7.2-cli
```
