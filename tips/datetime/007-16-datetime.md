# DateTime::createFromFormat

Pipe and exclamation mark characters reset all fields (year, month, day, hour,
minute, second, fraction and timezone information) to the Unix Epoch.

http://php.net/manual/en/datetime.createfromformat.php

```php
$date = '2015-10-21';

$date_1 = DateTime::createFromFormat('Y-m-d', $date);

// Y-m-d| will set the year, month and day to the information found
// in the string to parse, and sets the hour, minute and second to 0.
$date_2 = DateTime::createFromFormat('Y-m-d|', $date);

var_dump($date_1->format('r'), $date_2->format('r'));
// string(31) "Wed, 21 Oct 2015 04:32:09 +0200"
// string(31) "Wed, 21 Oct 2015 00:00:00 +0200"
```
