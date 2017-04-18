# How to get Easter date in PHP?

If PHP is compiled with `--enable-calendar`, you can use `easter_date()`:
http://php.net/manual/en/function.easter-date.php

```php
if (time() <= easter_date(2017)) {
    echo 'HaPHPy Easter!';
}
```

and `easter_days()`:
http://php.net/manual/en/function.easter-days.php

The computation of Easter date can be also [manual](https://en.wikipedia.org/wiki/Computus).
