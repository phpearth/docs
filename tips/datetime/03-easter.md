# How to get the date of Easter in PHP?

If PHP is compiled with `--enable-calendar`, you can use `easter_date()`:
http://php.net/manual/en/function.easter-date.php

```php
if (time() <= easter_date(2017)) {
    echo 'HaPHPy Easter!';
}
```

and `easter_days()`:
http://php.net/manual/en/function.easter-days.php

The computation of the date of Easter can also be done [manually](https://en.wikipedia.org/wiki/Computus).
