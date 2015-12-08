---
title: "How to create Phar (PHP Archive)?"
read_time: "1 min"
updated: "Sep 27, 2015"
group: "general"
permalink: "/faq/how-to-create-phar/"

compass:
  prev: "/faq/pdf/"
  next: "/faq/php-cli/"
---

## Packed php application archive

```
Note
"This action needs the php.ini setting phar.readonly to be set to 0 in order to work for Phar objects. Otherwise, a PharException will be thrown."
```

PHAR (“Php ARchive”) is analogous to the JAR file concept but for PHP. If you have PHP 5.3 or greater, the Phar extension is built-in and enabled; you can start using it without any additional requirements.
PHAR files are treated as read-only by default, and you can use any PHAR file without any special configuration. This is great for deployment. But as you'll be creating your own PHARs you'll need to allow write-access which is done through the php.ini file.
Open `php.ini`, find the `phar.readonly` directive, and modify it accordingly:

```ini
phar.readonly = 0
```

Now you're ready to package your libraries and applications as PHARs.

Below simple code can create phar from folder `project` or change it to your project name.

```php
<?php
// create with alias "project.phar"
$phar = new Phar('project.phar', 0, 'project.phar');
// add all files in the project
$phar->buildFromDirectory(dirname(__FILE__) . '/project');
$phar->setStub($phar->createDefaultStub('cli/index.php', 'www/index.php'));

$phar2 = new Phar('project2.phar', 0, 'project2.phar');
// add all files in the project, only include php files
$phar2->buildFromDirectory(dirname(__FILE__) . '/project', '/\.php$/');
$phar2->setStub($phar->createDefaultStub('cli/index.php', 'www/index.php'));
```
