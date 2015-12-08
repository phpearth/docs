---
title: "How to show errors in PHP?"
read_time: "1 min"
updated: "October 23, 2015"
group: "general"
permalink: "/faq/how-to-show-errors/"

compass:
  prev: "/faq/how-to-send-email-with-php/"
  next: "/faq/excel-and-php/"
---

When you develop you will definitely want to turn on error reporting in PHP. It gives you valuable information why something failed. Let's check error reporting directives in `php.ini`:

* **error_reporting**

    This sets which errors should be reported. Using `E_ALL` is a good practice.

* **display_errors**

    This handles displaying errors to the screen.

* **log_errors**

    This controls reporting errors to a log file. Recommended practice is to always have this enabled.

* **error_log**

    This defines error log file where errors should be written. It only applies if `log_errors` is enabled.

Showing errors should depend on the enviroment your application is present.

## Development environment

You want to show errors on screen and in logs.

```ini
display_errors = on
log_errors = on
error_reporting = E_ALL
```

## Production environment

Be carefull when you deploy your code online you must disable showing errors on screen for security purposes. You definitely don't
want to expose error messages which can contain delicate information about your application to the ouside world. However logging errors is useful for info what went wrong in case of errors.

```ini
display_errors = off
log_errors = on
error_reporting = E_ALL
```

Error reporting can be also changed with [error_reporting()](http://php.net/manual/en/function.error-reporting.php) function.

```php
error_reporting(0);
```
