---
updated: 2017-03-29
---

# Year in the Footer

Many websites include current year and copyright info in the footer. Neat way
to stay current is to output year dynamically.

Instead of this:

```php
echo '2016 © Acme';
```

You can use the current year dynamically:

```php
echo date('Y').' © Acme';
```
