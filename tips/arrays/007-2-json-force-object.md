# JSON_FORCE_OBJECT

When working with `json_encode()` and arrays, an array with ordered indexes will
be an array by default.

```php
$json = json_encode([0 => 'foo', 2 => 'bar']);
var_dump($json);
// string(21) "{"0":"foo","2":"bar"}"

// Array with ordered indexes will be array by default
$json = json_encode([0 => 'foo', 1 => 'bar']);
var_dump($json);
// string(13) "["foo","bar"]"

// JSON_FORCE_OBJECT will make it an object
$json = json_encode([0 => 'foo', 1 => 'bar'], JSON_FORCE_OBJECT);
var_dump($json);
// string(21) "{"0":"foo","1":"bar"}"
```
