---
title: "How to deploy PHP application?"
read_time: "5 min"
updated: "August 17, 2016"
group: "general"
permalink: "/faq/php-deployment/"

compass:
  prev: "/faq/php-date-and-time/"
  next: "/faq/php-for-desktop-applications/"
---

Deployment of web application is a process where application is uploaded from the
source code repository (Git) or development machine to a web server to make it
accessible over the HTTP.

During deployment, source code files are transfered, web assets (JavaScript, CSS,
images) are generated, minified and/or concatenated, database migrations are run,
cache is cleared, web server gets restarted and similar.

Deploying PHP application to production or staging environment might not be so
obvious task.

Ways of deploying PHP application:

* FTP
* GIT + SSH
* [Capistrano](http://capistranorb.com/) - Remote server automation and deployment
* [Deployer](http://deployer.org/) - Deployment tool in PHP.
* [Docker](https://www.docker.com/) - Virtualization with deployment capabilities.
* [Envoy](https://github.com/laravel/envoy) - A tool to run SSH tasks with PHP.
* [Fabric](http://www.fabfile.org/) - Deployment tool in Python.
* [Jenkins](https://jenkins.io/) - Continuous integration with deployment
* [Rocketeer](https://github.com/rocketeers/rocketeer) - Deployment tool in PHP.
    tool in Ruby.
* [TeamCity](https://www.jetbrains.com/teamcity/) - Proprietary deployment tool.


## FTP

The simplest way of uploading files to a web server is by using FTP with FTP
client such as [FileZilla](https://filezilla-project.org/). FTP is simple and
convenient, but doesn't provide much more options. Also security is very reduced.

# GIT + SSH

When working with Git and have SSH access available other more advanced approaches
are recommended.
