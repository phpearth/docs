---
updated: 2017-03-29
---

# Validating Emails

To validate email with PHP you can use PHP filters - `FILTER_VALIDATE_EMAIL`.

```php
$email = $_POST['email'] ?? null;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email';
}
```
