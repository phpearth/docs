---
title: "Vagrant Tutorial"
read_time: "1 min"
updated: "february 4, 2015"
group: "tutorials"
permalink: "/tutorials/vagrant/index.html"
layout: "article"
---

In this tutorial you will learn how to quickly use [Vagrant] for PHP development.

## What is Vagrant?

[Vagrant] is a wrapper around the virtualization software such as VirtualBox for configuring and creating virtual development environments. Perfect for PHP development. You can have a development environment that is identical to your production environment. So far you've probably used setup like Xampp, Wampserver or similar all-in-one package that contained PHP, MySQL and Apache on your development machine. That is all fine but with Vagrant you will become more flexible and you can share your development environment with your teammates.

## Installation

Before installing Vagrant install a virtualization software such as VirtualBox. Installation of Vagrant is very simple and works on all popular operating systems - Windows, Mac and Linux. [Download Vagrant][download] or install it with package manager for your Linux distribution.

## Project setup

All the commands in this tutorial must be typed in your terminal:

```bash
$ mkdir vagrant-project
$ cd vagrant-project
```

## Boxes

Boxes in Vagrant are base images of virtual machines.

With command `vagrant init` you get a Vagrant configuration file called `Vagrantfile` with instructions for Vagrant to set up your development environment and a so called `base` box.


Next step after creating `Vagrantfile` is adding a box. In this tutorial we'll use Puphpet's Debian box. Don't let the name confuse you - it is the latest Debian box.

```bash
$ vagrant box add puphpet/debian75-x64
```

This downloads base image you can use in your development environment.

To ssh into your newly added box you use the following commands:

- `vagrant up` starts your vagrant box, it's equivalent to hitting "Power ON" button on your physical machine.

```bash
$ vagrant up
```

- Once box is up, it can accept SSH connections. By default SSH will be passwordless and is configured to key pairs. 

```bash
$ vagrant ssh
```

## What is PuPHPet?

PuPHPet is a simple GUI to set up virtual machines for Web development.

## Resources

* [Vagrantup](http://vagrantup.com) - Vagrant's official homepage
* [Vagrant Boxes](http://vagrantbox.es/) - list of base boxes for Vagrant
* [Vagrant Cloud](https://vagrantcloud.com/) - hosting and discovery of Vagrant Boxes, as well as other features like Vagrant Share
* [Puphpet homepage](https://puphpet.com/) - GUI for setting up virtual machines for web development

[Vagrant]: http://vagrantup.com
[download]: http://www.vagrantup.com/downloads