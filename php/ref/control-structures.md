# Control structures

## If

```php
if $x > 0 {
    return $x;
} else {
    return -$x;
}
```

## Loops

```php
// for
for ($i = 1; $i<10; $i++) {}

// while
while ($i < 10) {}

// do while
$i = 0;
do {
    echo $i;
} while ($i > 0);


// foreach
foreach ($array as $key => $value) {}
```

## Switch

```php
// switch statement
switch ($operatingSystem) {
    case 'darwin':
        echo 'Mac OS Hipster';
        break;
    case 'linux':
        echo 'Linux Geek';
        break;
    default:
        // Windows, BSD, ...
        echo 'Other';
}
```
