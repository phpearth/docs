---
title: "How to detect browser in PHP?"
read_time: "1 min"
updated: "october 26, 2014"
group: "general"
permalink: "/faq/how-to-detect-browser-in-php/"

compass:
  prev: "/faq/headers-already-sent-by-warning/"
  next: "/faq/how-to-detect-isp-via-php/"
---

Sometimes you need to detect a user's browser from PHP for the purposes of displaying browser specific content or adjusting CSS & HTML.

PHP's `$_SERVER` global variable holds browser's ID information in HTTP_USER_AGENT key: `$_SERVER['HTTP_USER_AGENT']`.

```php
<?php
$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/MSIE/i', $user_agent)) {
    echo "Internet Explorer";
} else {
    echo "Non-IE Browser";
}
```

Better alternative would be also to use PHP function get_browser:

```php
<?php
$browser = get_browser(null, true);
print_r($browser);
```

Libraries to check out when you need some advanced functionalities:

* [PHPBrowser](https://github.com/gabrielbull/php-browser)
