# Year in the Footer

Many websites include current year and copyright info in the footer. A neat way
to stay current is to output the year dynamically.

Instead of this:

```php
echo '2016 © Acme';
```

You can output the current year dynamically:

```php
echo date('Y').' © Acme';
```
