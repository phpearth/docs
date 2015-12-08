---
title: "How to get client's IP address in PHP?"
read_time: "1 min"
updated: "october 26, 2014"
group: "general"
permalink: "/faq/how-to-get-clientsip-in-php/"

compass:
  prev: "/faq/how-to-detect-isp-via-php/"
  next: "/faq/image-manipulation-libraries-php/"
---

Though global PHP variable `$_SERVER['REMOTE_ADDR']` contains client's IP address in practice there are cases that this IP is not the
real IP address from the client. IP can be an internal IP from the LAN behind the proxy.

If you are going to save the IP to a database as a string, make sure you have space for at least 45 characters. More and more servers are
now getting the IPv6 and those addresses are larger than the older IPv4 addresses.

If a client is behind a proxy than the proxy might set the `X_FORWARDED_FOR` HTTP header and in PHP you can get it with `$_SERVER['HTTP_X_FORWARDED_FOR']`,
which can differ from `$_SERVER['REMOTE_ADDR']`. If you are saving the addresses to the database saving both values is a good idea.

Example of getting IP address from the client in PHP - beware that validating the IP is important in the last step since the variable since
the client can set HTTP header to any arbitrary value:

```php
<?php

// Get user IP address
if ( isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
}

$ip = filter_var($ip, FILTER_VALIDATE_IP);
$ip = ($ip === false) ? '0.0.0.0' : $ip;
```
