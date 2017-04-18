# Ternary Operator

Most times the same action can be done with the ternary operator. The following
lines of code show same conditional usages.

```php
if ($i === 2) {
    $j = 0;
} else {
    ++$j;
}
```

With ternary operator you can do a one-liner:

```php
$j = ($i === 2) ? 0 : ++$j;
```
