---
title: "What is Composer?"
read_time: "1 min"
updated: "february 10, 2015"
group: "packages"
permalink: "/faq/packages/what-is-composer/"

compass:
  prev: "/faq/object-oriented-programming/"
  next: "/faq/security/php-security-issues/"
---

Composer is a tool for managing your dependencies in a PHP project. Using the terminal/command line you can add, update or remove dependant packages from [packagist.org][packagist]. It is a preferred way for managing your project these days. It can be used for open source dependencies and for your proprietary code as well of course.

It uses `composer.json` file where all the dependant packages, libraries, components are defined with their release versions, and holds some other information regarding the package or a project.

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

Composer is a phar file - PHP Archive file that can be downloaded with curl (on most systems):

```bash
$ curl -sS https://getcomposer.org/installer | php
```

or on windows using the php cli:

```bash
$ php -r "readfile('https://getcomposer.org/installer');" | php
```

## Usage

In your project you can than use it through terminal to require packages:

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

## Resources

* [Composer's homepage](https://getcomposer.org) - Composer's main homepage
* [packagist.org][packagist] - repository of open source PHP packages, components, frameworks etc that are installable with Composer
* [Composer as a service](http://composer.borreli.com/) - Give your composer.json, get the corresponding vendor.zip, fast.

[packagist]: https://packagist.org
