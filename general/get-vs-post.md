# $\_GET vs $\_POST?

Users often ask what are the differences between the `$_GET` and `$_POST` variables in PHP and GET and POST HTTP methods in general.

First some background on the HTTP methods. GET and POST are two of many HTTP methods (GET, HEAD, POST, PUT, DELETE, TRACE, OPTIONS, CONNECT and PATCH)
used to indicate the desired action to be performed on the identified resourse.

*Pseudo-Security Note: GET variables are exposed in the URL. At first, you might think that this means nothing, as an attacker can easily get the POST values just easily. However, because of the default behavior of most browsers is to cache URLs, on shared computers, this could potentially give access to another user's account for instance, since it would be saved in the history. This is especially troublesome when a longterm session or JWT is used for instance.*

## GET method:

Query strings are sent in the URL of the GET request:

```text
/test/form.php?name1=value1&name2=value2&name3=value3
```

You can then get the query strings in PHP like this:

```php
<?php

$name1 = isset($_GET['name1']) ? $_GET['name1'] : null;
```

or

```php
<?php

$name1 = filter_has_var(INPUT_GET, 'name1') ? filter_input(INPUT_GET, 'name1', FILTER_SANITIZE_STRING) : null;
```

## POST method:

In case of POST method query strings are sent in the HTTP message body of the POST request:

```text
POST /test/form.php HTTP/1.1
Host: test.com

name1=value1&name2=value2&name3=value3
```

Query strings from the POST method can then be processed in PHP like this:

```php
<?php

$name1 = isset($_POST['name1']) ? $_POST['name1'] : null;
```

or

```php
$name1 = filter_has_var(INPUT_POST, 'name1') ? filter_input(INPUT_POST, 'name1', FILTER_SANITIZE_STRING) : null;
```

---

The difference between using `$_GET/$_POST` and more verbose functions like `filter_*****()` is
- `$_GET` is superglobals variable and because it is a variable it can be set to another value. It cannot be trusted to give actual values came from HTTP header/body.
- While functions like `filter_has_var()` or `filter_input()` will always get the value from original HTTP header/body. They can be trusted to give original values.
- But `filter_input()` also has a drawback. Because it rely on real user input, this can make testing/mocking data harder.

## Raw POST data

For POST method (or another method like PUT), you can get unprocessed HTTP body like this:

```php
<?php

$raw_body = file_get_contents('php://input');
```

This can be useful when you're going to deal with incoming data which MIME types is not application/x-www-form-urlencoded, like JSON data.

```php
<?php

if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
    $post = json_decode(file_get_contents('php://input'), true) ?: array();
} else {
    $post = $_POST;
}
```
