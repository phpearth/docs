---
title: "How to make application configuration?"
read_time: "5 min"
updated: "August 11, 2016"
group: "general"
permalink: "/faq/how-to-make-configuration-in-php"

compass:
  prev: "/faq/php-frameworks/what-is-zend-framework/"
  next: "/faq/certification/"
---

Application configuration can be defined in all sorts of formats and places. From
normal PHP files:

~~~php?start_inline=1
$configuation = [
    'database_name'     => 'db_name',
    'database_user'     => 'db_user',
    'database_password' => 'db_secret_password',
];
~~~

YAML files:

~~~yaml
# app/config/config.yml
database:
    database_name:     'db_name'
    database_user:     'db_user'
    database_password: 'db_secret_password'
~~~

And other file formats such as INI, XML, JSON, or even database itself. Whatever
is suitable for your project case and also readability.

## Environments

Applications are used in different environments. When you develop your application,
you define development configuration which is different from the one, defined later
on production server. To approach this effectively, best practice is to have
different configuration sets for each environment and add/upload them to the
project separately from the secure location or by using one of the deployment
tools which can do that.

## Types of configuration

Generally we could structure configuration types into the following categories:

* Application configuration - database access, API access data...

## Bad practices

Many projects use PHP constants to define configuration values:

```php?start_inline=1
// app/config/config.php
define('DATABASE_USER', 'db_user');
define('DATABASE_NAME', 'db_name');
define('DATABASE_PASSWORD', 'db_password');
```

This is not good for the following reasons:
* You are polluting the global namespace and can have compatibility issues from
other libraries or code that might define same constant.
* Their value cannot change be changed in the code - issues when testing code.
* Difficult code refactoring in case they were used in multiple places
* Limited set of types available (only boolean, integer, float, string, array and resource).

Some of the limitations mentioned above can be avoided by using class constants:

```php?start_inline=1
class Config
{
    const MAX_ITEMS_ON_HOMEPAGE = 10;
}
```

But this should still be used only for configuration values that never change in
the application context. For example maximum number of elements shown on homepage
and similar.


## How to use configuration in your application

You can use dependency injection container and add configuration handler to it:

```php?start_inline=1
$container->set('config', $config);
```

Than in your application classes instead of injecting the configuration directly,
you can inject container or its values instead:

```php?start_inline=1
class Database
{
    private $container, $user, $password;

    public function __construct($container)
    {
        $this->container = $container;
        $this->user = $contanier->get('config')->databaseUser;
        $this->password = $contanier->get('config')->databasePassword;
    }
}

$database = new Database($container);
```

## Security

Important things to take care when working with configuration is to never expose
sensitive configuration files in public. To avoid that, place the configuration
files outside the publicly accessible document root on server, so they are not
accessible over application `https://example.com/config/config.yml`.

Sometimes a good practice is to use [environment variables](https://en.wikipedia.org/wiki/Environment_variable)
for configuration such as database, API keys and similar access information.

On Apache servers you can `VirtualHost` configuration:

```apache
<VirtualHost *:80>
    ServerName      Example
    DocumentRoot    "/var/www/project/public"
    DirectoryIndex  index.php index.html
    SetEnv          APP_DATABASE_USER db_user
    SetEnv          APP_DATABASE_PASSWORD db_secret_password

    <Directory "/var/www/project/public">
        AllowOverride All
        Allow from All
    </Directory>
</VirtualHost>
```

On Nginx servers:


## Git repositories

Code that is commited to the source control, such as Git should in most cases
avoid having configuration values. In case of Git, ignore the configuration
files containing password, API tokens and similar sensitive information with
`.gitignore`:

```
#.gitignore file which omits commiting config.php file to the Git repository
/app/config/config.php
```

## See also

More resources you should look into:

* [phpdotenv](https://github.com/vlucas/phpdotenv) - PHP library which loads environment variables.
* [Symfony Config component](http://symfony.com/doc/current/components/config/index.html)
* [Zend Config](https://zendframework.github.io/zend-config/)
