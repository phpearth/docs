---
title: "What is Composer?"
read_time: "3 min"
updated: "March 28, 2016"
group: "packages"
permalink: "/faq/packages/what-is-composer/"

compass:
  prev: "/faq/object-oriented-programming/anti-patterns/"
  next: "/faq/packages/php-libraries-scripts-and-code/"
---

To not reinvent the wheel you can reuse code in different projects with plugins,
packages, frameworks and similar libraries. Developing and managing release
versions of dependencies in projects on your own can quickly become cumbersome.

[Composer](https://getcomposer.org) is de-facto standard command line tool for
managing dependencies in PHP.

Packages can be located and developed separately in any public open source or
private proprietary location. Main repository for open source packages is
[Packagist.org](https://packagist.org).

## Installation

Download and install `composer.phar` Phar (PHP Archive) file according to the
[documentation](https://getcomposer.org/doc/00-intro.md). Recommended is to
install it globally so you can call `composer` from any folder:

```bash
$ composer command [options] [arguments]
```

## Usage

Let's check some basic Composer usage.

### Files and folders in PHP project

Composer will add and use the following files in your project:

* `composer.json` - Metadata file with information about dependant packages
  versions autoloading your PHP classes and more.
* `composer.lock` - After adding dependencies Composer creates this metadata
  file with locked dependency versions for project. If you're working on package,
  don't include it in the code repository. If you're working on application,
  add it to code repository.
* `vendor/` - Automatically managed folder with installed libraries. Don't include
  it in the code repository.
* `vendor/autoload.php` - Automatically managed PHP classes autoload mapping file.

### composer.json

When starting a new project you can use the interactive `init` command to create
`composer.json` file:

```bash
$ composer init
```

`composer.json` is located in the root folder of your project:

```json
{
    "name": "vendor/project-name",
    "description": "Demo application",
    "type": "project",
    "require": {
        "php": ">=5.6.0",
        "nesbot/carbon": "~1.14"
    },
    "require-dev": {
        "phpunit/phpunit": "5.2.*"
    },
    "license": "MIT",
    "authors": [
        {
            "name": "John Doe",
            "email": "john.doe@domain.tld"
        }
    ],
    "minimum-stability": "dev"
}
```

### Managing dependencies

To add a new dependency to your project without editing `composer.json` use the
`require` command in project folder. As an example, below command adds
[Swift Mailer](https://github.com/swiftmailer/swiftmailer) - library for sending
emails:

```bash
$ composer require swiftmailer/swiftmailer
```

For updating project dependencies, use `update` command:

```bash
$ composer update
```

To install project from scratch when you start working on a project:

```bash
$ composer install
```

## Tips

To improve performance in production optimize the autoloader:

```bash
$ composer dump-autoload --optimize
```

To test if `update` or `install` command will have issues use the `--dry-run`
option. No changes will be made to the project dependencies.

```bash
$ composer update --dry-run --profile --verbose
```

## See also

Make sure to read the [official documentation](https://getcomposer.org/doc) to
learn Composer in details. Other useful links to check:

* [Climb](https://github.com/vinkla/climb) - Tool that finds newer versions of
  project dependencies.
* [Composer as a service](http://composer.borreli.com/) - Give your composer.json,
  get the corresponding vendor.zip, fast.
* [Melody](http://melody.sensiolabs.org/) - One-file Composer scripts.
