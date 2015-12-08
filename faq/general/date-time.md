---
title: "How to work with date and time in PHP?"
read_time: "3 min"
updated: "October 23, 2015"
group: "general"
permalink: "/faq/php-date-and-time/"

compass:
  prev: "/faq/coding-standards/"
  next: "/faq/php-for-desktop-applications/"
---

[DateTime](http://php.net/manual/en/class.datetime.php) class provides a nice object oriented interface when working with date and time. It has all the functionality of date functions and more. Therefore use it and have consistency in parts of your code.

```php
$date = DateTime::createFromFormat('Y-m-d', '2015-10-21');
echo $date->format('d.m.Y'); // 21.10.2015
```

## Examples

### Difference between dates with DateTime

```php
$start = DateTime::createFromFormat('Y-m-d H:i:s', '2015-10-21 07:28:00');
$arrival = clone $start;
$arrival->add(new DateInterval('P1M6D')); // adds 1 month and 6 days

$diff = $arrival->diff($start);
echo $diff->format('%m month, %d days (total: %a days)'); // 1 month, 6 days (total: 37 days)
```

### Difference between dates with Carbon

[Carbon](https://github.com/briannesbitt/Carbon) is simple PHP API extension for DateTime. You will find it extremely useful.

```php
echo Carbon::now()->subMinutes(2)->diffForHumans(); // 2 minutes ago
```

### Comparing dates

```php
$now = new DateTime();
$arrival = DateTime::createFromFormat('Y-m-d', '2015-10-21');

if ($now == $arrival) {
    echo "Welcome, Marty McFly!";
} else if ($now < $arrival) {
    echo "Welcome to the future.";
} else {
    echo "Welcome to the past.";
}
```

### Time zone

Default time zone of DateTime::__construct() is the one from the system PHP is currently running on. Good practice to avoid issues later on (when for instance storing them in database and having users from different time zones) is to always specify the UTC time zone:

```php
// Construct a new UTC date
$date = new DateTime('now', new DateTimeZone('UTC'));

// Check current time in different time zones
$date = new DateTime('now', new DateTimeZone('Europe/London'));
echo $date->format('Y-m-d H:i:sP'); // 2015-10 07:28:00+01:00

$date->setTimezone(new DateTimeZone('Pacific/Chatham'));
echo $date->format('Y-m-d H:i:sP'); // 2015-10 07:28:00+13:45
```

Also don't forget to set wanted time zone in `php.ini` files:

```ini
date.timezone = "UTC"
```

### Localization

DateTime::format outputs everything only in English. Localization of date and time formats can be done in two ways. With [strftime()](http://php.net/manual/en/function.strftime.php) or [IntlDateFormatter](http://php.net/manual/en/class.intldateformatter.php) which requires [intl](http://php.net/manual/en/book.intl.php) extension.

Using strftime:

```php
setlocale(LC_TIME, "en_US");
$now = new DateTime('now');
echo strftime("%c", $now->getTimestamp()); // Wed Oct 21 07:28:00 2015

// change locale to Slovenian
setlocale(LC_TIME, "sl_SI");
echo strftime("%c", $now->getTimestamp()); // sre okt 21 07:28:00 2015 CEST
```

Using IntlDateFormatter:

```php
$now = new DateTime('now');
$fmt = new IntlDateFormatter('en_US', IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'America/New_York', IntlDateFormatter::GREGORIAN);
echo $fmt->format($now); // Wednesday, October 21, 2015 at 07:28:00 AM Eastern Daylight Time
```

### Quirks

Some strange quirks you might want to know and beware when dealing with these issues:

#### Zeroed dates

Zeroed dates (`0000-00-00`, `0000-00-00 00:00:00`) can happen in MySQL for example as the default value in columns with DateTime types. If you add zeroed date to `DateTime::__construct()` they will result in nonsensical date:

```php
$d = new DateTime("0000-00-00");
echo $d->format("Y-m-d"); // "-0001-11-30"
```

#### 32-bit systems

On 32-bit systems [DateTime::getTimestamp()](http://php.net/manual/en/datetime.gettimestamp.php) will return false on dates beyond 2038.

#### DateTimeImmutable

When using `setTimezone`, `setTimestamp`, `setDate`, `setTime`, `modify` and some other DateTime methods be careful because they will modify DateTime and return `$this`. In below example you might expect that two objects below are **not** the same:

```php
function formatNextMondayFromNow(DateTime $dt) {
    return $dt->modify('next monday')->format('Y-m-d');
}

$d = new DateTime();
echo formatNextMondayFromNow($d); // 2015-10-21
echo $d->format('Y-m-d');         // 2015-10-21
```

But they are because DateTime is mutable.

For that reason PHP 5.5 introduced [DateTimeImmutable](http://php.net/manual/en/class.datetimeimmutable.php) class which works the same way as [DateTime] but it
never changes itself. Instead it returns a new object.

```php
function formatNextMondayFromNow(DateTimeImmutable $dt) {
    return $dt->modify('next monday')->format('Y-m-d');
}

$d = new DateTimeImmutable();
echo formatNextMondayFromNow($d); // 2015-10-26
echo $d->format('Y-m-d');         // 2015-10-21
```

## Other Resources

* [Date and Time - PHP Manual](http://php.net/manual/en/book.datetime.php) - A must read to know more about date and time in PHP.
* [DateTimeImmutable blog post](http://derickrethans.nl/immutable-datetime.html) - Issue with some methods changing DateTime explained.
