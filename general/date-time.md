---
title: "How to work with dates and time?"
read_time: "1 min"
updated: "november 11, 2014"
group: "general"
permalink: "/faq/php-date-and-time/"
---

Until PHP 5.5 the preferred and recommended way to operate with date and time in PHP was to use [DateTime][datetime] class.

```php
<?php

$date = \DateTime::createFromFormat();
$date;

```

In PHP 5.5 there was introduced [DateTimeImmutable][datetimeimmutable] class which works in the same way as DateTime but it
never changes itself.

```php
<?php

$text = '29.10.2014';
$date = \DateTime::createFromFormat('d.m.y', $text);
```

## Resources:

* [Date and Time PHP manual][datetime-manual]

[datetime]: http://php.net/manual/en/class.datetime.php
[datetimeimmutable]: http://php.net/manual/en/class.datetimeimmutable.php
[datetime-manual]: http://php.net/manual/en/book.datetime.php
