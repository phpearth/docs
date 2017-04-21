# <?php tips and tricks

Simple and stand alone PHP tips and tricks.

Tips and tricks are very easy to remember for busy or learning dedicated minds.

Each tip is prepared in advance. New tips are being added on its regular basis
and are updated for the latest PHP versions.

## Tips Categories

Tips are stored in contextual categories:

* [arrays](arrays) - Tips about PHP arrays
* [datetime](datetime) - Date and time tips
* [composer](composer) - Composer tips
* [oop](oop) - Object oriented programming tips
* [strings](strings) - Tips dealing with strings
* [style](style) - Coding style
* [unicorns](unicorns) - Other PHP tips

Prefix is a special [stardate](https://prime.singularity.name/stardate/stardate-standard.pdf)
format for date and time using the following conversion:

```php
#!/usr/bin/env php
<?php

/**
 * Converts date from format YYYY-MM-DD HH:mm:ss to stardate.
 * stardate = days since 2016-10-12 divided by 25
 */

$base = '2016-10-12 00:00:00';
$date = $argv[1] ?? $base;
$stardate = (intval((strtotime($date) - strtotime($base)) / (60 * 60 * 24)))/25;

echo $stardate;
```
