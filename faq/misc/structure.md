---
stage: revising
---

# How to choose a PHP project directory structure?

This guide will show you some optional and smart ways how to structure files and
directories in your PHP project.

PHP is very liberal and customizable when it comes to structuring project
directories. If you're planning to create a custom vanilla PHP application, you
will need to invent the structure for your project. You will want a logical and
understandable directory structure.

Open source PHP applications and frameworks have their own ways of structuring
directories and files. If you're using a framework or a CMS, you already have a
directory structure defined. See links at the bottom for some common open source
examples.

Different types of applications will have different directory structures. Web
application will have additional publicly accessible directory as a command
line application. Project complexity and nature also affect the required
directories.

Structure your project in a way, which you find most logical and useful.

## Directory structure example

Let's take a look the following example.

```bash
project-root/
  .git/            # Git configuration and source directory
  assets/          # Uncompiled/raw CSS, LESS, Sass, JavaScript, images
  bin/             # Command line scripts
  config/          # Application configuration
  node_modules/    # Node.js modules for managing front end
  public/          # Publicly accessible files at http://example.com/
      index.php    # Main entry point - front controller
      ...
  src/             # PHP source code files
      Controller/  # Controllers
      ...
  templates/       # Template files
  tests/           # Unit and functional tests
  translations/    # Translation files
      en_US.yaml
  var/             # Temporary application files
      cache/       # Cache files
      log/         # Application specific log files
  vendor/          # 3rd party packages and components with Composer
  .gitignore       # Ignored files and dirs in Git (node_modules, var, vendor...)
  composer.json    # Composer dependencies file
  phpunit.xml.dist # PHPUnit configuration file
```

Above example has longer list of directories in the root project directory and
less depth to browse for particular file. You can merge certain types of files
together or refactor that differently to suit your project needs. When possible,
apply separation of concerns.

## Public directory

Web applications need a publicly accessible directory. Above example uses name
`public`. You can easily use `pub`, `web`, `public_html` or your preferred name.

This directory will be accessible by the outside world when using web server.
For security reasons you should put only minimal set of files required for your
application to work. This includes a single front controller, for example,
`index.php` and static front end files (CSS, JavaScript, images...).

## Configuration

In case you have multiple configuration files, a good practice is to put
configuration files in their separate directory. Few examples:
`config` or `etc` or `app/config`... Avoid putting configuration files in
a publicly accessible directory.

## Composer

Composer helps you simplify and improve many aspects of your PHP application.
For example, autoloading PHP classes, running scripts, automating the
installation, managing 3rd party dependencies, and more.

The default special `composer.json` file is located in the top root directory of
the project. In this file all Composer configuration and dependencies are
defined.

Composer creates a `vendor` directory in the project root directory which contain
3rd party dependencies (libraries, components, plugins...).

## PHP source code files


When it comes to PHP classes many projects, add them to a directory named `src`
or `app`.

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

## Front end

Depending on the complexity of the project a good practice is to split front end
files (CSS, Sass, LESS, JavaScript, images...) and PHP backend files (PHP source
code, templates, application configuration, unit tests... ) into two separate
repositories.

In above example the `node_modules` directory is a standard directory (similar to
Composer's `vendor`) managed by Node.js tooling system - npm or yarn.

## How to change the default Composer vendor directory?

By default, Composer creates a `vendor` directory. Changing its name is not
a common approach, because it's a standard name used around the PHP ecosystem.
However, renaming can be done by setting a special environment variable
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
