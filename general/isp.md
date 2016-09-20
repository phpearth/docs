---
title: "How to detect ISP with PHP?"
updated: "October 26, 2014"
permalink: "/faq/how-to-detect-isp-via-php/"
---

Getting ISP (internet service provider) of a client is possible with using [gethostbyaddr](http://php.net/gethostbyaddr) function which
will attempt to retrieve clien't host by its IP address:

Simple example:

```php
<?php

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

echo $hostname;
```

But important for you to know is that relying on this is not always possible since the client may be logged in through VPN.
