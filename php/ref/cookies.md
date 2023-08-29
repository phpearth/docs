# Cookies

A cookie is a file that the server sets on user's computer to contain some information as key value pair.

It is sent with every request to the server.

The maximum size of a cookie must not exceed 4 Kilo Bytes.

You can access the cookie variables through the `$_COOKIE` global variable.

Warnings:
- The user can disable cookies on his browser.
- You must not use cookies to store sensitive information as it is not protected.

### Setting a cookie
Using `setcookie` function.
```php
setcookie(
    string $name,
    string $value = "",
    int $expires = 0,
    string $path = "",
    string $domain = "",
    bool $secure = false,
    bool $httponly = false
): bool

// Alternative signature available as of PHP 7.3.0 
setcookie(string $name, string $value = "", array $options = []): bool

```

### Cookie configuration

- `$expires` sets the time the cookie should expire.
- `$path` is the path on the server in which the cookie will be available on. Setting it to `/` makes it available to the entire domain.
- `$domain` is the subdomain that the cookie is available to.
- `$secure` if set to `true` make it available to `https` only.
- `$httponly` if set to true make it accessible only through the HTTP protocol. This means that the cookie won't be accessible by JavaScript.


### Deleting the cookie

You can do this by setting the `$expires` parameter to negative value.

```PHP
setcookie($cookie_name, '' ,time() - 3600);
```