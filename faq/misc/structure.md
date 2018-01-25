---
stage: drafting
---

# How to create a good PHP project directory structure?

This guide will show you some ways how to structure files and directories in your
PHP project.

PHP is very liberal and adjustable when it comes to structuring project directories.

If you're planning to create a custom vanilla PHP application, you will need to
invent the structure yourself. You will want a logical and understandable
directory structure.

Open source PHP applications and frameworks have their own ways of structuring
directories and files. If you're using a framework or a CMS, you already have a
directory structure defined. See links for more inspiration at the bottom of this
guide.

Different types of applications will have different directory structures. Web
application needs additional publicly accessible directory compared to a command
line application. Project complexity and nature also affect the required
directories.

Structure your project in a way, you find most logical and useful development
experience.

## Directory structure example

Let's take a look the following example.

```bash
<project root>
  ├─ .git/            # Configuration and source files when using Git
  ├─ assets/          # CSS, JavaScript, images sources
  ├─ config/          # Application configuration
  ├─ bin/             # Command line scripts
  ├─ node_modules/    # Node.js modules
  ├─ src/             # PHP source code files
    ├─ Controllers/   # Controllers
      └─ DefaultController.php
    ├─ Entity/        # Example directory with entity classes
    └─ Services/      # Example directory with service classes
├─ public/            # Publicly accessible files at http://example.com/
  └─ index.php        # Main front controller
├─ templates/         # Template files
├─ tests/             # Unit and functional tests
├─ var/               # Application temporary files
  ├─ cache/           # Cache files
  ├─ log/             # Application specific log files
  └─ session/         # Session files
├─ vendor/            # 3rd party packages and components with Composer
└─ translations/      # Translation files
  └─ en_US.yaml
├─ composer.json      # Composer dependency file
├─ phpunit.xml.dist   # PHPUnit configuration file
└─ .gitignore         # Ignored files and folders for Git (for example, vendor)
```

## Public directory

Web applications need a publicly accessible directory. Above example uses name
`public`. You can easily use `pub`, `web`, `public_html` or your preferred name.

This directory will be accessible by the outside world when using web server.
For security reasons you should put only minimal set of files required for your
application to work. This includes a single front controller, for example,
`index.php` and static front end files (CSS, JavaScript, images...).

## Composer

Composer helps you simplify and improve many aspects of your PHP application.
From autoloading PHP classes, running scripts, automating the installation,
managing 3rd party dependencies, and more.

The default special `composer.json` file is located in the top root directory of
the project. In this file all Composer configuration and dependencies are
defined.

Composer creates a `vendor` directory in the project root where the 3rd party
dependencies reside.

When it comes to PHP classes many projects, add them to a directory `src` or
similar.

## Front end

Depending on the complexity of the project a good practice is to also split
front end files (CSS, JavaScript, images...) and PHP backend files (PHP,
template views, backend configuration, unit tests... ) into two separate
repositories.

## Configuration

In case you have multiple configuration files, a good practice is to put
configuration files in their separate directory. Few examples:
`config` or `etc` or `app/config`... Avoid putting configuration files in
publicly accessible directory.

## PHP source code files

Above example includes all PHP files in the `src` directory. These mainly include
the classes. Composer also includes a very neat feature - PSR-4 autoloading.
Adding the `autoload` and `autoload-dev` parts in the `composer.json` will
autoload all classes for you:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "App\\Tests\\": "tests/"
        }
    }
}
```

## Tests

Your application should ideally also include tests. Above example uses the `tests`
directory.

## How to change the default Composer vendor directory?

Composer by default creates a `vendor` directory. Changing its name is not
common nor practical, because it's an established name around the PHP ecosystem.
However, customization can be done by setting a special environment variable
`COMPOSER_VENDOR_DIR`:

```bash
COMPOSER_VENDOR_DIR=lib composer require phpunit/phpunit
```

or by manually adding a `vendor-dir` configuration into `composer.json`:

```json
{
    "require": {
        "phpunit/phpunit": "^6.5"
    },
    "config": {
        "vendor-dir": "lib"
    }
}
```

## See also

* [Configuration chapter](/security/configuration.md) - read more about PHP
  application configuration approaches.
* [CakePHP structure](https://book.cakephp.org/3.0/en/intro/cakephp-folder-structure.html)
* [Laravel structure](https://laravel.com/docs/5.5/structure)
* [Symfony structure](http://symfony.com/doc/current/configuration/override_dir_structure.html)
* [Zend Framework skeleton application](https://github.com/zendframework/ZendSkeletonApplication)
