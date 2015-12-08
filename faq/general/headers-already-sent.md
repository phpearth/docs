---
title: "How to fix \"Cannot modify header information - headers already sent by...\" warning?"
read_time: "1 min"
updated: "august 29, 2015"
group: "general"
permalink: "/faq/headers-already-sent-by-warning/"

compass:
  prev: "/faq/git-introduction/"
  next: "/faq/how-to-detect-browser-in-php/"
---

Common warning when working with PHP can be:

```
Warning: Cannot modify header information - headers already sent by (output started at /var/www/site/public_html/index.php:60)
```


## Which functions usually produce this?

Functions that send or modify HTTP headers must be called before any output is made:

* [header](http://php.net/manual/en/function.header.php)
* [header_remove](http://php.net/manual/en/function.header-remove.php)
* [session_regenerate_id](http://php.net/manual/en/function.session-regenerate-id.php)
* [session_start](http://php.net/manual/en/function.session-regenerate-id.php)
* [setcookie](http://php.net/manual/en/function.setcookie.php)
* [setrawcookie](http://php.net/manual/en/function.setrawcookie.php)


## Why this happens?

[HTTP specification][http-specification] defines that HTTP headers must always be sent before the output. PHP scripts
mainly generate HTML content, but also pass a set of HTTP/CGI headers to the webserver.

Usual HTTP response looks like this:

```http
HTTP/1.1 200 OK
Vary: Accept-Encoding
Content-Type: text/html; charset=utf-8

<html>
  <head>
    <title>Example</title>
  </head>
  <body>
    <h1>Page title</h1>
    <p>After the two linebreaks HTTP response output is defined.</p>
```

In above case first three lines are HTTP headers and after two line breaks output is defined. When PHP script receives the first
output (html, output from `echo` function etc) it will also flush all collected headers so far in the script procedure. Afterwards
it can send all the output it wants however adding other HTTP headers will be impossible from there on.


## Checklist of possible causes and how to fix it

* Whitespace or other ouput before the starting `<?php` tag or after closing `?>` tag.

```php
 <?php

session_start();
```

* File where PHP code is used has `UTF-8 Byte Order Mark`. PHP files should be encoded with `UTF without BOM`.
* Some previous error messages or notices are sent to the output.
* `echo`, `print`, `printf` or other printing functions produce output.
* Raw `<html>` sections prior to `<?php` code are written.


[http-specification]: https://tools.ietf.org/html/rfc2616
