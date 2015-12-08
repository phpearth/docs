---
title: "What are PHP and web security issues? How to prevent attacks and secure web application?"
read_time: "5 min"
updated: "October 28, 2015"
group: "security"
redirect_from: "/faq/security/security/"
permalink: "/faq/security/php-security-issues/"

compass:
  prev: "/faq/packages/what-is-composer/"
  next: "/faq/security/passwords/"
---

As a developer you must know how to build a secure and bulletproof application. Your duty is to prevent security attacks
and secure your application.

## Checklist of PHP and web security issues

Make sure you have these items sorted out when deploying your application into production environment:

1. ✔ [Cross Site Scripting (XSS)](#cross-site-scripting-xss)
2. ✔ [Injections](#injections)
    * ✔ [SQL Injection](#sql-injection)
    * ✔ [Directory Traversal (Path Injection)](#directory-traversal-path-injection)
    * ✔ [Command Injection](#command-injection)
    * ✔ [Code Injection](#code-injection)
3. ✔ [Cross Site Request Forgery (XSRF/CSRF)](#cross-site-request-forgery-xsrf-csrf)
4. ✔ [Public Files](#public-files)
5. ✔ [Passwords](#passwords)
6. ✔ [Uploading Files](#uploading-files)
7. ✔ [Session Hijacking](#session-hijacking)
8. ✔ [Remote file inclusion](#remote-file-inclusion)
10. ✔ [PHP configuration](#php-configuration)
    * ✔ [Error Reporting](#error-reporting)
    * ✔ [Exposing PHP Version](#exposing-php-version)
    * ✔ [Remote Files](#remote-files)
    * ✔ [open_basedir](#open_basedir)
    * ✔ [Session Settings](#session-settings)
11. ✔ [Things not Listed Above](#what-is-next)


## Cross Site Scripting (XSS)

XSS attack happens where client side code (usually JavaScript) gets injected into the output of your PHP script.

```php
$_GET['search'] = '<script>alert('test')</script>';
echo 'Search results for '.$_GET['search'];

// This can be solved with htmlspecialchars
$search = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
echo 'Search results for '.$search;
```

* `ENT_QUOTES` is used to escape single and double quotes beside HTML entities
* UTF-8 is used for pre PHP 5.4 environments (now it is default). In some browsers some characters might get pass the htmlspecialchars.

## Injections

### SQL Injection

When dealing with databases in your application SQL injection attack can happen by injecting malicious SQL parts into your existing SQL statement.

* More details available in "[What is SQL injection and how to prevent it?](/faq/security/sql-injection/)" FAQ.

### Directory Traversal (Path Injection)

Also known as ../ (dot, dot, slash) attack, happens where user supplies input file names and can traverse to parent directory. Data can be set as `index.php?page=../secret` or `/var/www/secret` or something more catastrophical:

```php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

require $page;
// or something like this
echo file_get_contents('../pages/'.$page.'.php');
```

In such cases you must do some checking if there are attempts to access parent or some remote folder:

```php
// Checking if the string contains parent directory
if (strstr($_GET['page'], '../') !== false) {
    throw new \Exception("Directory traversal attempt!");
}

// Checking remote file inclusions
if (strstr($_GET['page'], 'file://') !== false) {
    throw new \Exception("Remote file inclusion attempt!");
}

// Using whitelists of pages that are allowed to be included in the first place
$allowed = ['home', 'blog', 'gallery', 'catalog'];
$page = (in_array($page, $allowed)) ? $page : 'home';
echo file_get_contents('../pages/'.$page.'.php');
```


### Command Injection

Be careful when dealing with commands executing functions and data you don't trust.

```php
exec('rm -rf '.$GET['path']);
```

### Code Injection

Code injection happens when malicious code can be injected in `eval()` function, so sanitize your data when using it:

```php
eval('include '.$_GET['path']);
```


## Cross Site Request Forgery (XSRF/CSRF)

Cross site request forgery or one click attack or session riding is an exploit where user executes unwanted actions on web applications.

## Public Files

Make sure to move all your application files, configuration files and similar parts of your web application in a folder that is not publicly accessible when you visit URL of web application. Some file types (for example `.yml` files) might not be processed by your web server and user can view them online.

Example of good folder structure:

```text
app/
  config/
    parameters.yml
  src/
public/
  index.php
  style.css
  javascript.js
  logo.png
```

Configure webserver to serve files from `public` folder instead of root of your web application where your front controller (index.php) is. In case web server gets misconfigured and fails to serve PHP files properly only souce code of index.php will be visible to public.

## Passwords

When working with user's passwords hash them properly with `password_hash()` function:

* More details is available in "[How to work with users' passwords and how to securely hash passwords in PHP?](/faq/security/passwords/)" FAQ.

## Uploading Files

A lot of security breaches can happen where user can upload a file on server. Make sure you go through all the vulnerabilities of uploading files such as renaming uploaded file, moving it to publicly unaccesible folder and similar. Since there are a lot of issues to check here, more information is located in the separate FAQ:

* [How to securely upload files with PHP?](/faq/security/uploading-files/) FAQ.

## Session Hijacking

Session hijacking is an attack where attacker steals session ID of a user. Session ID is sent to server where $_SESSION array gets populated based on it. Session hijacking is possible through an XSS attack or if someone gains access to folder on server where session data is stored.

## Remote file inclusion

Remote file inclusion attack (RFI) means that attacker can include custom scripts:

```php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

require $page . '.php';
```

In above code $_GET can be set to a remote file `http://yourdomain.tld/index.php?page=http://example.com/evilscript`

Make sure you disable this in your `php.ini` unless you know what you're doing:

```ini
; Disable including remote files
allow_url_fopen = off
; Disable opening remote files for include(), require() and include_once() functions.
; If above allow_url_fopen is disabled, allow_url_include is also disabled.
allow_url_include = off
```

## PHP configuration

Always keep installed PHP version updated. You can use [versionscan](https://github.com/psecio/versionscan) to check for possible vulnerabilities of your PHP version. Update open source libraries and applications and maintain web server.

Here are some of the important settings from `php.ini` that you should check out. You can also use [iniscan](https://github.com/psecio/iniscan) to scan your `php.ini` files for best security practices.

### Error Reporting

In your production environment you must always turn off displaying errors to screen. If errors occur in your application and it is visible to the outside world
attacker can get valuable data for attacking your application. `display_errors` and `log_errors` directives in `php.ini` file:

```ini
; Disable displaying errors to screen
display_errors = off
; Enable writing errors to server logs
log_errors = on
```

* More information in the [How to show errors in PHP](/faq/how-to-show-errors/) FAQ.

### Exposing PHP Version

PHP version is visible in HTML headers. You might want to consider hiding PHP version by turning off `expose_php` directive and prevent web server sending back that `X-Powered-By`X-Powered-By` header

```ini
expose_php = off
```

### Remote Files

In most cases it is important to disable access to remote files:

```ini
; disabled opening remote files for fopen, fsockopen, file_get_contents and similar functions
allow_url_fopen =  0
; disabled including remote files for require, include ans similar functions
allow_url_include = 0
```

### open_basedir

This settings defines one or more directories (subdirectories included) where PHP has access to read and write files. This includes file handling (fopen, file_get_contents) and also including files (include, require)

```ini
open_basedir = "/var/www/test/uploads"
```

### Session Settings

* **session.use_cookies** and **session.use_only_cookies**

    PHP is by default configured to store session data on the server and a tracking cookie on client side (usually called PHPSESSID) with unique ID for the session.

    ```ini
; in most cases you'll want to enable cookies for storing session
session.use_cookies = 1
; disabled changing session id through PHPSESSID parameter (e.g foo.php?PHPSESSID=<session id>)
session.use_only_cookies = 1
session.use_trans_sid = 0
; rejects any session ID from user that doesn't match current one and creates new one
session.use_strict_mode = 0
```

* **session.cookie_httponly**

    If the attacker somehow manages to inject Javascript code for stealing user's current cookies (the
document.cookie string), the `HttpOnly` cookie you’ve set won’t show up in the list.

    ```ini
session.cookie_httponly = 1
```

* **session.cookie_domain**

    This sets the domain for which cookies apply. For wildcard domains you can use `.example.com` or set this to the domain it should be applied. By default it is not enabled, so it is highly recommended for you to enable it:

    ```ini
session.cookie_domain = example.com
```

* **session.cookie_secure**

    For HTTPS sites this accepts only cookies sent over HTTPS. If you're still not using HTTPS, you should consider it.

    ```ini
session.cookie_secure = 1
```

## What is next?

Above we've introduced many security issues. Security, attacks and vulnerabilities are continuously evolving. Take time and check some good resources to learn more about security and turn this check list into a habit:

* General:
    * [Awesome AppSec](https://github.com/paragonie/awesome-appsec) - A curated list of resources for learning about application security.
    * [OWASP](https://www.owasp.org) - The Open Web Application Security Project, organization focused on improving security of software.
* PHP focused:
    * [PHP Manual](http://php.net/manual/en/security.php) - A must read security chapter in official documentation.
    * [Codecourse videos](https://www.youtube.com/playlist?list=PLfdtiltiRHWFsPxAGO-SVPGhCbCwKWF_N) - Demos and advice on the most common PHP security areas.
    * [DVWA, Damn Vulnerable Web Application](https://github.com/RandomStorm/DVWA) - Example of unsecure web application to test your skills and tools.
    * [OWASP PHP Security Cheat Sheet](https://www.owasp.org/index.php/PHP_Security_Cheat_Sheet) - Basic PHP security tips for developers and administrators.
    * [Securing PHP](http://securingphp.com) - Website and books with basic topics and specific cases in authentication/authorization and exploit prevention.
    * [SensioLabs Security](https://security.sensiolabs.org/) - SensioLabs Security Advisories Checker for checking your PHP project for known security issues
    * [websec.io](http://websec.io) - Dedicated to educating developers about security with topics relating to general security fundamentals, emerging technologies and PHP-specific information.
* Tools:
    * [iniscan](https://github.com/psecio/iniscan) - A php.ini scanner for best security practices.
    * [versionscan](https://github.com/psecio/versionscan) - PHP version scanner for reporting possible vulnerabilities.
    * [Roave Security Advisories](https://github.com/Roave/SecurityAdvisories) - This package ensures that your application doesn't have installed dependencies with known security vulnerabilities.
