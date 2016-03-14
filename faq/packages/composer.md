---
title: "What is Composer?"
read_time: "1 min"
updated: "March 14, 2016"
group: "packages"
permalink: "/faq/packages/what-is-composer/"

compass:
  prev: "/faq/object-oriented-programming/"
  next: "/faq/packages/php-libraries-scripts-and-code/"
---

[Composer](https://getcomposer.org) is a tool for managing the dependencies of PHP
project. Using the command line you can add, update or remove dependant packages
of your project. Package can be located in any separate public or private repository.
Main repository for open source packages is [packagist.org](https://packagist.org).
Composer is preferred way for managing your PHP project. It can be used for open
source dependencies and for your proprietary code.

A `composer.json` file in your PHP project includes the definitions of all the
dependent packages (libraries, components, frameworks), their release versions,
and current project information.

Example of `composer.json` file:

```javascript
{
    "name": "vendor/package-name",
    "description": "Example package for this tutorial",
    "keywords": ["package", "dependency", "autoload"],
    "homepage": "http://wwphp-fb.github.io/",
    "type": "library",
    "license": "MIT",
    "authors": [
        {
            "name": "John Doe",
            "email": "john.doe@domain.tld",
            "homepage": "http://www.domain.tld"
        }
    ],
    "support": {
        "irc": "irc://irc.freenode.org/phpc",
        "issues": "https://github.com/wwphp-fb/php-resources/issues"
    },
    "require": {
        "php": ">=5.3.2",
        "justinrainbow/json-schema": "~1.3",
        "seld/jsonlint": "~1.0",
    },
    "require-dev": {
        "phpunit/phpunit": "~4.5"
    },
    "suggest": {
        "ext-zip": "Enabling the zip extension allows you to unzip archives, and allows gzip compression of all internet traffic",
        "ext-openssl": "Enabling the openssl extension allows you to access https URLs for repositories and packages"
    },
    "autoload": {
        "psr-0": { "Acme": "src/" }
    },
    "autoload-dev": {
        "psr-0": { "Acme\\Test": "tests/" }
    },
    "bin": ["bin/tool"],
    "extra": {
        "branch-alias": {
            "dev-master": "1.0-dev"
        }
    },
    "scripts": {
        "test": "phpunit"
    }
}
```

## Installation

Composer is a phar file - PHP Archive file that can be downloaded with curl (on
most systems):

```bash
$ curl -sS https://getcomposer.org/installer | php
```

or on Windows using the PHP CLI:

```bash
$ php -r "readfile('https://getcomposer.org/installer');" | php
```

## Usage

In your project folder you can than use it through command line to manages project
dependencies:

```bash
$ php composer.phar require "phpunit/phpunit=4.5.*"
```

For updating your project's dependencies:

```bash
$ php composer.phar update
```

Or to install project from scratch when you start working on a project:

```bash
$ composer install
```

## See also

* [Composer as a service](http://composer.borreli.com/) - Give your composer.json, get the corresponding vendor.zip, fast.
* [Melody](http://melody.sensiolabs.org/) - One-file Composer scripts.
* [Climb](https://github.com/vinkla/climb) - Tool that finds
