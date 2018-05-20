---
image: https://raw.githubusercontent.com/phpearth/PHP.earth/master/assets/images/faq/misc/structure.png
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

Complexity and nature of the project affect the required directories. For example,
a web application will have additional publicly accessible directory compared to
a command line application.

Structure your project the way you find it most logical and useful.

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

Above example has a longer list of directories in the root directory and less
depth to browse for a particular file and locate them faster. You can merge
certain types of files together or refactor that differently to suit your project
needs. Find some balance for your use case between the too long list of items
and too many subfolders to browse. When possible, apply separation of concerns.

## Public directory

Web applications need a publicly accessible directory. Above example uses name
`public`. You can easily use `pub`, `web`, `public_html` or your preferred name.

This directory will be accessible by the outside world when using a web server.
For security reasons, you should put only a minimal set of files required for
your application to work. This includes a single front controller, for example,
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
the project. In this file, all Composer configuration and dependencies are
defined.

The Composer creates a `vendor` directory in the project root directory which
contains 3rd party dependencies (libraries, components, plugins...).

## PHP source code files

When it comes to PHP classes many projects, add them to a directory named `src`
or `app`.

Above example includes all PHP files in the `src` directory. These mainly include
the classes. The composer also includes a very neat feature - PSR-4 autoloading.
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

In modern PHP applications, structuring PHP files in the `src` directory is part
of object oriented programming and design patterns. Each namespace is presented
with a subdirectory in the `src` directory.

For example:

```bash
project-root/
  ...
  src/
      Controller/ # Classes for managing request and response by displaying
                  # templates with logic from services and or data from DB
      Model/      # Classes for holding values from the database
      Utils/      # Application services - business logic
      ...
  ...
```

Follow the OOP design patterns principles when adding classes into namespaces.

## Tests

Your application should ideally also include tests. The above example uses the
`tests` directory.

## Front end

Depending on the complexity of the project a good practice is to split front end
files (CSS, Sass, LESS, JavaScript, images...) and PHP backend files (PHP source
code, templates, application configuration, unit tests... ) into two separate
repositories.

In the above example the `node_modules` directory is a standard directory (similar
to Composer's `vendor`) managed by Node.js tooling system - npm or yarn.

Instead of separating project into two repositories, the directory `assets` is
used for storing uncompiled raw one or more of JavaScript, CSS, SaSS, LESS, images
and similar asset files which are compiled and processed to a `public` directory.

In case you will not need more advanced and complex front end handling, you can
put these web assets directly into a `public` directory.

## How to change the default Composer vendor directory?

By default, Composer creates a `vendor` directory. Changing its name is not
a common approach because it's a standard name used in the PHP ecosystem.
However, renaming can be done by setting a special environment variable
`COMPOSER_VENDOR_DIR`:

```bash
COMPOSER_VENDOR_DIR=lib composer require phpunit/phpunit
```

or by manually adding a `vendor-dir` configuration into `composer.json`:

```json
{
    ...
    "config": {
        "vendor-dir": "lib"
    }
    ...
}
```

## How to adjust directory structure when using shared hosting?

In case you will be deploying your PHP application to shared hostings with
existing and predefined directory locations where you can upload private and
public files, you will need to adjust the project directory structure
accordingly.

Always avoid putting anything except the application's public files into a
document root directory, such as `public_html`, `htdocs` or similar.

Some control panels might allow you to define the document root different than
the default one:

```bash
public_html/     # Control panel's default document root directory
  your-project/  # Your project with your preferred directory structure
    ...
    config/
    ...
    public/      # Set this directory as a new document root
    src/
    ...
```

## See also

* [Configuration chapter](/security/configuration.md) - read more about PHP
  application configuration approaches.
* [CakePHP structure](https://book.cakephp.org/3.0/en/intro/cakephp-folder-structure.html)
* [Laravel structure](https://laravel.com/docs/5.5/structure)
* [Symfony structure](http://symfony.com/doc/current/configuration/override_dir_structure.html)
* [Zend Framework skeleton application](https://github.com/zendframework/ZendSkeletonApplication)
