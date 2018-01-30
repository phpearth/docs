---
stage: prewriting
---

# Arrays

Array is a container with a fixed number of elements, where each element is
indexed from `0` incrementally:

```php
<?php

$planets = ['Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune'];

// Outputs "Earth"
echo $planets[2];
```

Associative arrays:

```php
<?php

$array = [
    'foo' => 'bar',
    'bar' => 'foo',
];

// Outputs "bar"
echo $array['foo'];
```

## Operations on arrays

| Operator | Name | Result |
|----------|------|--------|
| `$a + $b` | Union|Union of $a and $b. |
| `$a == $b` | Equality | TRUE if $a and $b have the same key/value pairs. |
| `$a === $b` | Identity | TRUE if $a and $b have the same key/value pairs in the same order and of the same types. |
| `$a != $b` | Inequality |TRUE if $a is not equal to $b. |
| `$a <> $b` | Inequality | TRUE if $a is not equal to $b. |
| `$a !== $b` | Non-identity | TRUE if $a is not identical to $b. |
