# How to show and handle errors in PHP?

When you develop you will definitely want to turn on error reporting in PHP. It
gives you valuable information as to why something has failed. Let's check some
of the most important error reporting directives in `php.ini`:

* **error_reporting**

    This sets which errors should be reported. Using `E_ALL` is a good practice.

* **display_errors**

    This handles displaying errors to the screen.

* **log_errors**

    This controls reporting errors to a log file. Recommended practice is to
    always have this enabled.

* **error_log**

    This defines error log file where errors should be written. It only applies
    if `log_errors` is enabled.

Showing errors should depend on the environment your application is present.

## Development environment

When developing your application locally, you want to show errors on screen and
in logs.

```ini
display_errors = on
log_errors = on
error_reporting = E_ALL
```

## Production environment

Be careful when deploying application code online. Disable showing errors on
screen for security purposes. You definitely don't want to expose error
messages which can contain delicate information about your application to the
outside world. However, having logging errors enabled is always useful for
information about what went wrong in case of errors.

```ini
display_errors = off
log_errors = on
error_reporting = E_ALL
```

Error reporting can also be changed with the
[error_reporting()](http://php.net/manual/en/function.error-reporting.php) function.

```php
error_reporting(0);
```

## See also

* [Error Handling and Logging](http://php.net/manual/en/book.errorfunc.php) - A
  must read PHP manual chapter about configuring the error reporting in PHP.
* [Error in PHP](http://php.net/manual/en/language.errors.php) - PHP manual errors
  chapter.
* [Monolog](https://github.com/Seldaek/monolog) - Logging library for PHP.
