# How to deploy PHP application?

![PHP Deployment](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/general/deployment.jpg "PHP Deployment")

Deployment of web applications is a process where application is uploaded from
your development machine or the source code repository (Git) to a web server and
is made accessible to users.

Deploying PHP application to production or staging environment might not be so
obvious task at first and requires some additional attention.

## What does the deployment include?

During deployment, the source code files are transferred with some of the
following additional steps:

* Checking out specific version of the application from the code repository
* Dependencies are installed with Composer
* Web assets (JavaScript, CSS, images) are generated, minified, concatenated...
* Database schema is migrated
* Cache is cleared
* Web server gets restarted

Modern deployments should be as simple, fast and be able to made often during the
application life time to meet the requirements. For example, if you change only
small portion of your code, only the changed files should be uploaded and not
all others. One of the modern deployment approaches is also atomic deployment. It
provides switching ability between different deployed versions and web server
uses symbolic link to the latest version location.

## Quality

When uploading application from the development to production you also want to
ensure that tests pass and that application works as expected. This step adds
deploying application to another step, for example, a stage.

## Application life cycle management (ALM)

Application life cycle generally consists of the following steps:

* Development

  This is where you locally write code, integrate functionality, fix bugs, run
  tests, commit and push code to a versioning system such as Git.

* Build
* Test
* Deploy

## How to choose the right deployment strategy?

Pick the tools that you and your team find comfortable to work with and inspect
the available infrastructure options. You will not be able to use a single
approach for all of your projects. Many projects have their own edge cases and
limits which you must take into account when picking the build and deployment
strategy.

## FTP

![FTP](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/general/deployment-ftp.png "FTP")

FTP is the most basic file transfer approach you might have started with. It is
the easiest way of transferring application files to a web server by using FTP
protocol with some FTP client such as [FileZilla](https://filezilla-project.org/)
or similar. FTP is simple and convenient, but has many weaknesses such as security
risks, lack of versioning options and also it can be slow with a lot of files.
Most shared hosting options provide FTP to upload files to production.

The [git-ftp](https://github.com/git-ftp/git-ftp) provides Git version control
system with FTP deployment.

## Moving on

Below are listed some more advanced and convenient deployment methods. You will
need some prerequisite knowledge to link the basic deployment such as FTP and
further explained methods:

* Be able to use command line a lot. There is a really nice introduction available
  in the [art-of-command-line](https://github.com/jlevy/the-art-of-command-line)
* Be familiar with some basic [DevOps](https://en.wikipedia.org/wiki/DevOps) skills.

System administration is often a very large chapter of its own and will not be
covered here in details.

## GIT + SSH

When working with Git, you can use it to deploy your application as well.

In short the deployment procedure is the following:

* Local application development with Git
* Via SSH access you `git pull` and checkout possible specific application version

If using GitHub, Bitbucket, GitLab or similar Git hosting service, you can add the
deployment SSH key in the repository.

## Deployer

[Deployer](http://deployer.org/) is a PHP cli application which can deploy your
PHP application over multiple protocols, SSH being widely used. After installation,
a separate project specific `deploy.php` file is used to deploy the application
from the Git repository to server via command line.

**Pros:**

* Completely customizable
* Fast
* Secure

## Fabric

* [Fabric](http://www.fabfile.org/) is a widely used deployment tool written in
Python. It works similar as above explained Deployer, it is completely customizable,
solid, fast and secure.

## Docker

[Docker](https://www.docker.com/)

**Pros:**

* Very modular
* Easier server management

**Cons:**

* Very high level DevOps knowledge is required to successfully deploy projects
  with Docker.

Docker deployment strategy can be used in two ways:

* By building custom images with application code in the images and deploying
  them to Docker Registry.

  This is probably the most convenient way to use Docker in production. However
  Docker Registry with custom images needs to be used.

* By using Git on the production server and using volumes for code. Images can be
  build on the server itself or downloaded from Docker Registry.

Some useful resources to run Docker in production:

* [Rancher](https://rancher.com)
* [Kubernetes](http://kubernetes.io/)

## Jenkins

[Jenkins](https://jenkins.io/) provides continuous integration and can be used to
deploy application into production. The Jenkins ecosystem provides a multitude of
plugins to adjust your application life cycle to your needs. It can be even used
together with Docker to build images and run tasks in containers.

## Other deployment options

* [Envoy](https://github.com/laravel/envoy) - A tool to run SSH tasks with PHP.
* [Rocketeer](https://github.com/rocketeers/rocketeer) - Deployment tool in PHP.
* [Capistrano](http://capistranorb.com/) - Remote server automation and deployment
  tool in Ruby.
* [Apache Ant](http://ant.apache.org/) - Java library and command line tool.
* [Phing](https://www.phing.info/) - PHP port of the Apache Ant.

## Paid services

Some limited free and paid options you might want to check out if you want to
have more elegant and less "hacky" solutions:

* [TeamCity](https://www.jetbrains.com/teamcity/) - Proprietary deployment tool.
* [DeployHQ](https://www.deployhq.com/) - Web based GUI deployment service.
* [Laravel Forge](https://forge.laravel.com/)
* [GitFTP-Deploy](https://gitftp-deploy.com/)

### PaaS

Platform as a Service include 3rd party services such as [Heroku](https://www.heroku.com),
[Zeit](https://zeit.co/), [Azure](https://azure.microsoft.com) and others.

## See also

To explore more about deployments, check also some of the following resources:

* [Leanpub: Deploying PHP Applications](https://leanpub.com/deploying-php-applications)
* [Rasmus Lerdorf: Deploying PHP 7](https://www.youtube.com/watch?v=MT4rRWKygq0)
* [Servers for Hackers: Deployment](https://serversforhackers.com/series/deployment)
* [Sitepoint: Easy Deployment of PHP Applications with Deployer](https://www.sitepoint.com/deploying-php-applications-with-deployer/)
* [Symfony deployment chapter](http://symfony.com/doc/current/deployment.html)
* [Wikipedia: Continuous integration](https://en.wikipedia.org/wiki/Continuous_integration)
* [Wikipedia: List of build automation software](https://en.wikipedia.org/wiki/List_of_build_automation_software)
