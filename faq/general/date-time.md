---
title: "How to work with dates and time in PHP?"
read_time: "1 min"
updated: "october 21, 2015"
group: "general"
permalink: "/faq/php-date-and-time/"
---

PHP has [DateTime](http://php.net/manual/en/class.datetime.php) class which provides nice object oriented interface when working with date and time. It has all the functionality of date functions and more. Therefore use it and have consistency in parts of your code. Also [PHP Manual](http://php.net/manual/en/book.datetime.php) is a must read to know where to find more information.

```php
$date = \DateTime::createFromFormat('Y-m-d', '2015-10-21');
echo $date->format('d.m.Y');
```

## Examples

### Difference between two dates with DateTime

```php
$raw = '2015-10-21 07:28:00';
$start = DateTime::createFromFormat('Y-m-d H:i:s', $raw);
$end = clone $start;
$end->add(new DateInterval('P1M6D'));

$diff = $end->diff($start);
echo 'Difference: ' . $diff->format('%m month, %d days (total: %a days)') . "\n";
// Difference: 1 month, 6 days (total: 37 days)
```

### Difference with Carbon

[Carbon](https://github.com/briannesbitt/Carbon) is simple PHP API extension for DateTime. You will find it extremely useful.

```php
echo Carbon::now()->subMinutes(2)->diffForHumans();
```

### Comparing dates

```php
$now = DateTime::createFromFormat('Y-m-d', '2015-10-21');
$arrival = clone $now;

if ($now == $arrival) {
    echo "Welcome, Marty McFly!";
} else if ($now < $arrival) {
    echo "Welcome to the future.";
} else {
    echo "Welcome to the past.";
}
```

### TimeZone

Default time zone of DateTime::__construct() is the one from the system PHP is currently running on. Good practice to avoid issues later on (when for instance storing them in database and having users from different time zones) is to specify the UTC time zone when creating new dates:

```php
// Construct a new UTC date
$date = new DateTime('2015-10-21 07:28:00', new DateTimeZone('UTC'));
 
// Add 5 days to our initial date
$date->add(new DateInterval('P5D'));

// Check current time in different time zones
$date = new DateTime('now', new DateTimeZone('Europe/London'));
echo $date->format('Y-m-d H:i:sP') . "\n";

$date->setTimezone(new DateTimeZone('Pacific/Chatham'));
echo $date->format('Y-m-d H:i:sP') . "\n";
```

Also don't forget to set wanted timezone in `php.ini` files:

```ini
date.timezone = "UTC"
```

### Quirks

#### Zeroed dates

Some strange quirks you might want to know and beware when dealing with these issues:

* Zeroed dates (`0000-00-00`, `0000-00-00 00:00:00`) can happen in MySQL for example as the default value in columns with DateTime types. If you add zeroed date to `DateTime::__construct()` they will result in nonsensical date:

    ```php
    $d = new DateTime("0000-00-00");
    $d->format("Y-m-d"); // "-0001-11-30"
    ```

#### 32-bit systems

* On 32-bit systems [DateTime::getTimestamp()](http://php.net/manual/en/datetime.gettimestamp.php) will return false on dates beyond 2038.


#### DateTimeImmutable

When using `setTimezone`, `setTimestamp`, `setDate`, `setTime`, `modify` and some other of a DateTime object be careful because they will modify DateTime  and return `$this`. In below example you might expect that two objects below aren **not** the same:

```php
function formatNextMondayFromNow(DateTime $dt) {
    return $dt->modify( 'next monday' )->format( 'Y-m-d' );
}

$d = new DateTime();
echo formatNextMondayFromNow($d) . "\n"; // 2015-10-21
echo $d->format( 'Y-m-d' ) . "\n";       // 2015-10-21
```

But they are not, since DateTime is mutable.

PHP 5.5 introduced [DateTimeImmutable](http://php.net/manual/en/class.datetimeimmutable.php) class which works the same way as [DateTime] but it
never changes itself instead returns a new object.

```php
$format = "Y-m-d";
$dateString = "2015-01-25";
$date = DateTimeImmutable::createFromFormat($format,$dateString);

// A new datetimeimmutable returned
var_dump($date);

// DateTimeImmutable object can be used similar to DateTime object
echo $date->format("Y/m/d");
```

## Other Resources

* [Derrick Rethan's DateTimeImmutable blog post](http://derickrethans.nl/immutable-datetime.html)
