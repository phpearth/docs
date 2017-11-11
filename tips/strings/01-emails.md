# Validating emails

You can use PHP filters to validate emails with PHP - `FILTER_VALIDATE_EMAIL`.

```php
$email = $_POST['email'] ?? null;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email';
}
```
