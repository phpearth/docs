---
title: "How to increase upload size in PHP?"
read_time: "1 min"
updated: "september 27, 2015"
group: "general"
permalink: "/faq/how-to-increase-upload-size-in-php/"
---

Upload file size are determined by your PHP settings. Default PHP configuration values are restricted to a maximum of 2 MB upload file size.

You can increase this limit in your `php.ini` file:

```ini
upload_max_filesize = 10M
post_max_size = 10M
```

Changing ini directives can also be done by using PHP's [ini_set()](http://php.net/manual/en/function.ini-set.php) function. However this will not work for `upload_max_filesize` directive because it is `PHP_INI_PERDIR` changable. More about this is described in the [manual](http://www.php.net/manual/en/ini.list.php).

Keep in mind also that there are multiple `php.ini` files per PHP installation. You can find out which ini files are loaded by executing `php --ini` in your command line or going to a PHP information page that is using [`phpinfo()`](http://php.net/phpinfo) function.