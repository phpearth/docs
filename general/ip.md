# How to Get Client's IP Address in PHP?

When client connects to a webserver the IP address can get assigned by using one
of the HTTP headers. [RFC 7239](https://tools.ietf.org/html/rfc7239) standard
specifies the `Forwarded` headers. Many proxy servers and caching engines use
also non standard but adopted by practice the [X-Forwarded-For](https://en.wikipedia.org/wiki/X-Forwarded-For)
HTTP header field to assign a comma and space separated values of IP addresses
(first one is the originating client).

The web server than assigns multiple possible global variables for client's IP
address based on these headers and other information from the connecting client:

* `$_SERVER['REMOTE_ADDR']`

  The global PHP variable which can contain the client's IP address. This might
  not be the real IP address from the client because it can be an internal IP
  address from the LAN behind the proxy. In this case other variables might
  contain the IP address.

* `$_SERVER['X_FORWARDED_FOR']` or `$_SERVER['HTTP_X_FORWARDED_FOR']`

  If a client is behind a proxy then the proxy might set the `X_FORWARDED_FOR`
  HTTP header field, which can differ from the one in `$_SERVER['REMOTE_ADDR']`.
  If you are saving the IP address to the database, saving both values is a good
  idea. In some cases checking for presence of both `X_FORWARDED_FOR` and
  `HTTP_X_FORWARDED_FOR` is important.

* Other non standard headers: In some cases some other non standard headers might
  also get set by some proxy servers and similar devices. Examples of PHP global
  variables in such cases include: `$_SERVER['HTTP_CLIENT_IP']` and similar.

Relying on any of these to be the client's real IP address is not certain.

If you are going to save the IP address to a database as a string, make sure you
have space for at least 45 characters. IPv4 is being replaced by a newer IPv6,
which has maximum length of 39 characters and IPv4-mapped IPv6 address has maximum
length of 45 characters. More and more servers are now getting the IPv6 and those
addresses are larger than the older IPv4 addresses.

A very simplified example of getting IP address from the client in PHP - beware
that validating the IP address is important in the last step since the HTTP headers
can be set to any arbitrary value:

```php
<?php

// Get client's IP address
if (isset($_SERVER['HTTP_CLIENT_IP']) && array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $ips = array_map('trim', $ips);
    $ip = $ips[0];
} else {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
}

$ip = filter_var($ip, FILTER_VALIDATE_IP);
$ip = ($ip === false) ? '0.0.0.0' : $ip;
```

Above example is very simplified and is shown here only as an introduction into
more usable components such as Symfony Http Foundation, Zend Http Component and
others.

## See Also

* [The PHP IP Guide](https://gist.github.com/Golpha/1a79868b6598f2c6a531)
* [Symfony Http Foundation component](http://api.symfony.com/3.1/Symfony/Component/HttpFoundation/Request.html#method_getClientIp) - Implementation
  of getting user's IP in Symfony framework
* [Wikipedia: X-Forwarded-For](https://en.wikipedia.org/wiki/X-Forwarded-For)
* [Zend Http Component](https://framework.zend.com/apidoc/2.4/classes/Zend.Http.PhpEnvironment.RemoteAddress.html) - Implementation
  of getting user's IP in Zend Framework
