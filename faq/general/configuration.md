---
title: "How to use configuration in PHP applications?"
read_time: "10 min"
updated: "August 13, 2016"
group: "general"
permalink: "/faq/configuration-in-php-applications/"

compass:
  prev: "/faq/coding-standards/"
  next: "/faq/web-crawling/"
---

Application configuration can be defined in all sorts of formats and places. From
the regular PHP files:

```php
<?php
// config/config.php

$configuration = [
    'database_name'     => 'db_name',
    'database_username' => 'db_username',
    'database_password' => 'db_secret_password',
];
```

YAML files:

```yaml
# config/config.yml
database:
    database_name:     'db_name'
    database_username: 'db_username'
    database_password: 'db_secret_password'
```

And other file formats such as INI, XML, JSON, or it can be defined even in the
database. Whatever is suitable for your project case and also readability.

## Environments

Applications are used in different environments (development, production, staging,
testing, beta, etc.). When developing an application, the configuration is
different from the configuration defined on the production server. To approach this
effectively, best practice is to have different configuration files for each
environment and add/upload them to the project separately from the secure location
or by using one of the deployment tools which can do that.

You can also define default values for all environments that get overwritten when
deploying or installing application locally.

```yml
// config/config.yml.dist
database:
    database_name:     project
    database_username: root
    database_password: ~
```

Many projects use the practice of adding `dist` to the filename which means the
default configuration that comes with the distribution.

## Types of configuration

Types of application configuration can be structured into the following types:

* **Infrastructure configuration**

    These depend on the environment where the application is running and don't
    define the behavior of the application directly. This includes security
    credentials, such as database passwords, API access keys and similar.

* **Application configuration**

    These define the behavior of the application and depend on the environment
    where the application is running. For example the debugging turned on or off,
    database type (you can use different database type in testing for example),
    locale settings and similar.

    * Fixed application configuration

        These don't change very often during the certain application version. For
        example database type, number of items shown per page etc.

    * Variable application configuration

        These change more frequently in certain application version. For example
        user settings (showing/hiding signature in forum topics, default currency
        used in e-store for signed in users), settings meant to be changed by
        non-developers (contact emails, Google sitemap settings) etc.

## Bad practices

Many projects use PHP constants to define configuration values:

```php
<?php
// config/config.php

define('DATABASE_NAME', 'db_name');
define('DATABASE_USERNAME', 'db_username');
define('DATABASE_PASSWORD', 'db_password');
```

This is not very good practice for the following reasons:

* You are polluting the global namespace and can have compatibility issues from
  other libraries or code that might define same constant.
* Their value cannot be changed in the code, which might have issues when testing
  code.
* Difficult code refactoring in case they were used in multiple places
* Limited set of types available (only boolean, integer, float, string, array and
  resource).

Some of the limitations mentioned above can be avoided by using class constants:

```php
<?php

class Config
{
    const DATABASE_NAME     = 'db_name';
    const DATABASE_USERNAME = 'db_username';
    const DATABASE_PASSWORD = 'db_password';
}

// ...
$dbUsername = Config::DATABASE_USERNAME;
```

But this should be used only for configuration values that never change in the
certain application version or change very rarely. For example maximum number of
elements shown per page and similar:

```php
<?php

class Article
{
    const MAX_ITEMS_PER_PAGE = 10;

    //...
}
```

Limitation is still difficult changing of these values in testing environment.

Often times the [Singleton pattern](https://en.wikipedia.org/wiki/Singleton_pattern)
is also used for storing configuration values because it introduces global state
and simple access to the configuration values in the application. However using
singleton pattern reduces testability. Currently the best practice instead is to
use the dependency injection.

## Security

When working with application configuration, never expose sensitive configuration
files in public. To avoid that, place the configuration files outside the publicly
accessible document root on the server, so they are not accessible over web
`https://example.com/config/config.yml`.

Folder structure could be in this case the following:

```text
project/
    public/
        index.php
        css/
        js/
        images/
    config/
        config.yml
    src/
    vendor/
```

The `public` folder in this case is the document root folder which is accessible
over web `https://example.com`.

### Environment variables

A good practice is to use
[environment variables](https://en.wikipedia.org/wiki/Environment_variable)
for configuration such as security credentials (database access, API keys, etc.).
Environment variables are special system variables defined on the system level.

First a bit of an introduction into
[PHP environment variables](http://php.net/manual/en/reserved.variables.environment.php)
and some caveats when working with them.

On Apache servers environment variables can be defined in the `VirtualHost`
configuration with the special `SetEnv` directive of
[mod_env](http://httpd.apache.org/docs/current/mod/mod_env.html):

```
<VirtualHost *:80>
    ServerName      example.com
    DocumentRoot    "/var/www/project/public"
    DirectoryIndex  index.php index.html
    SetEnv          APP_DATABASE_USERNAME db_username
    SetEnv          APP_DATABASE_PASSWORD db_secret_password

    <Directory "/var/www/project/public">
        AllowOverride All
        Allow from All
    </Directory>
</VirtualHost>
```

On Nginx servers environment variables can be set with `fastcgi_param` directive
in configuration file where the `fastcgi_params` is being included:

```
# /etc/nginx/sites-available/example.com

location ~ \.php$ {
   #...
   include fastcgi_params;
   fastcgi_param   APP_DATABASE_USERNAME db_username;
   fastcgi_param   APP_DATABASE_PASSWORD db_secret_password;
   #...
}
```

When your application is running in PHP CLI (which does not use web server),
environment variables must be set also with `export` (for Linux servers):

```bash
export APP_DATABASE_USERNAME="db_username"
export APP_DATABASE_PASSWORD="db_secret_password"
```

In PHP environment variables can be than accessed with
[getenv()](http://php.net/manual/en/function.getenv.php):

```php
$configuration = [
    'database_username' => getenv('APP_DATABASE_USERNAME'),
    'database_password' => getenv('APP_DATABASE_PASSWORD'),
];
```

#### PHP dotenv

A very useful PHP library that adds best practices to your application when
working with environment variables for configuration is
[PHP dotenv](https://github.com/vlucas/phpdotenv).

After installation with Composer:

```bash
composer require vlucas/phpdotenv
```

Add the `.env` file to the root of your project:

```text
APP_DATABASE_USERNAME="db_username"
APP_DATABASE_PASSWORD="db_secret_password"
```

In PHP the configuration values can be than accessed like environment variables
explained above:

```php
<?php

require __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$dbUsername = getenv('APP_DATABASE_USERNAME');
```

Worth noting is that environment variables are still exposed on the system level.
Be careful to not output them for example with `phpinfo()`. Important to
understand is, when the environment variables are useful for your case scenario
and when to use other tools like [Vault](https://www.vaultproject.io/),
[Chef](https://www.chef.io/chef/) or similar.

### Git repositories

When committing code to the source control (Git), avoid adding configuration files
to the commits. In case of Git, ignore the configuration files containing sensitive
configuration values with `.gitignore`:

```
#.gitignore file which omits committing config.php file to the Git repository
/config/config.php
```

## Encapsulation

The infrastructure configuration don't change during the running of the application.
In case you don't have simple access to the production environment infrastructure
configuration values (database credentials) but still need to develop application
independently and frequently add more infrastructure related configuration in the
next version of the application, you can use encapsulation:

```php
<?php
// config/database.php

return [
    'database_name'     => 'db_name',
    'database_username' => 'db_username',
    'database_password' => 'db_secret_password',
];
```

And use it in your application configuration with the rest of the infrastructure
configuration:

```php
<?php
// config/config.php

return array_merge([
        'fb_app_id'     => 123456,
        'fb_app_secret' => 'facebook_app_secret',
    ],
    require(__DIR__.'/database.php')
);
```

## Configuration stored in the database

Some configuration values that often change or are meant to be changed by
non-developers, can be defined in the database so they can be easily changed over
the UI.

There are multiple different approaches you can look into. From using key-value
storages to designing the database schema for these tables accordingly for the
current project:

* Key-value table (column types can be json, array or similar for different
  configuration types)
* [EAV (entity-attribute-value)](https://en.wikipedia.org/wiki/Entity%E2%80%93attribute%E2%80%93value_model)
* Configuration in the same table as the other entities (for example user settings)
* ... and many other ideas

## How to use configuration in your application?

Many times you might be tempted to access the configuration values in the
application code directly:

```php
<?php

class Database
{
    private $name, $username, $password;

    public function __construct()
    {
        $this->name     = getenv('APP_DATABASE_NAME');
        $this->username = getenv('APP_DATABASE_USERNAME');
        $this->password = getenv('APP_DATABASE_PASSWORD');
    }

    //...
}
```

Issue with such approach is difficult maintaining of the code when scaling and
testing. The other not good enough step is injecting the configuration handler
directly in the needed class:

```php
<?php

class Config
{
    private $values;

    public function __construct($values)
    {
        $this->values = $values;
    }

    public function get($key)
    {
        return $this->values[$key];
    }
}

class Database
{
    private $name, $username, $password;

    public function __construct($config)
    {
        $this->name      = $config->get('database_name');
        $this->username  = $config->get('database_username');
        $this->password  = $config->get('database_password');
    }
}

// ...

$config = new Config(require(__DIR__.'/../config/config.php'));

$database = new Database($config);
```

Instead, you should inject the needed configurations separately to the separate
adapter class:

```php
<?php

class DatabaseAdapater
{
    protected $inhibitor = null;
    protected $instance = null;

    private $name;
    private $username;
    private $password;
    private $host = '127.0.0.1';

    public function __construct()
    {
        $this->inhibitor = Closure::bind(
            function ($name = null, $username = null, $password = null, $host = null): PDO {
                return new PDO(
                    'mysql:dbname='.($name ?? $this->name).';host='.($host ?? $this->host),
                    $username ?? $this->username,
                    $password ?? $this->password
                );
            },
            $this,
            DatabaseAdapter::class
        );
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setHost(string $host)
    {
        $this->host = $host;
    }

    public function getInstance(): PDO
    {
        if ($this->instance instanceof PDO) {
            return $this->instance;
        }

        return $this->instance = call_user_func($this->inhibitor);
    }
}

class Database
{
    private $adapter;

    public function __construct(DatabaseAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}

$adapter = new DatabaseAdapter();
$adapter->setName($config->get('database_name'));
$adapter->setUsername($config->get('database_username'));
$adapter->setPassword($config->get('database_password'));
$db = $adapter->getInstance();
```

## See also

More resources you should look into:

* [Nette Bootstrap](https://github.com/nette/bootstrap) - Configuration component from Nette Framework.
* [PHP dotenv](https://github.com/vlucas/phpdotenv) - PHP library which loads environment variables.
* [Symfony Config component](http://symfony.com/doc/current/components/config/index.html)
* [Twelve Factor App](http://12factor.net/config) - Configuration chapter of the Twelve Factor App book.
* [Zend Config](https://zendframework.github.io/zend-config/)
