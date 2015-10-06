---
title: "How to work with dates and time?"
read_time: "1 min"
updated: "october 6, 2015"
group: "general"
permalink: "/faq/php-date-and-time/"
---

Until PHP 5.5 the preferred and recommended way to operate with date and time in PHP was to use [DateTime][datetime] class.

```php
<?php

$date = \DateTime::createFromFormat();
$date;

```

PHP 5.5 introduced [DateTimeImmutable][datetimeimmutable] class which works in the same way as [DateTime] but it
never changes itself instead returns a new object.

```php
<?php
$format = "Y-m-d";
$dateString = "2015-01-25";
$date = DateTimeImmutable::createFromFormat($format,$dateString);

// A new datetimeimmutable returned
var_dump($date);

// DateTimeImmutable object can be used similar to DateTime object
echo $date->format("Y/m/d");

```

## Resources:

* [Date and Time PHP manual][datetime-manual]
* [Carbon](http://carbon.nesbot.com/docs/)

[datetime]: http://php.net/manual/en/class.datetime.php
[datetimeimmutable]: http://php.net/manual/en/class.datetimeimmutable.php
[datetime-manual]: http://php.net/manual/en/book.datetime.php
