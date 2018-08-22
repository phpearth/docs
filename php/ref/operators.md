# Operators

## Arithmetic operators

|Operator|Name|Result|
|--------|----|-----------|
|`-$a`|negation|Opposite of $a.|
|`$a + $b`|addition|Sum of $a and $b.|
|`$a - $b`|Subtraction|Difference of $a and $b.|
|`$a * $b`|Multiplication|Product of $a and $b.|
|`$a / $b`|division|Quotient of $a and $b.|
|`$a % $b`|modulus|Remainder of $a divided by $b.|
|`$a ** $b`|Exponentiation|Result of raising $a to the $b'th power.|

## Comparison operators

|Operator|Name|Result|
|--------|----|-----------|
|`$a == $b`|Equal|TRUE if $a is equal to $b after type juggling.|
|`$a === $b`|Identical|TRUE if $a is equal to $b, and they are of the same type.|
|`$a != $b`|Not equal|TRUE if $a is not equal to $b after type juggling.|
|`$a <> $b`|Not equal|TRUE if $a is not equal to $b after type juggling.|
|`$a !== $b`|Not identical|TRUE if $a is not equal to $b, or they are not of the same type.|
|`$a < $b`|Less than|TRUE if $a is strictly less than $b.|
|`$a > $b`|Greater than|TRUE if $a is strictly greater than $b.|
|`$a <= $b`|Less than or equal to|TRUE if $a is less than or equal to $b.|
|`$a >= $b`|Greater than or equal to|TRUE if $a is greater than or equal to $b.|
|`$a <=> $b`|Spaceship|-1 if $a is less than $b, 1 if $a is greater than $b, otherwise 0.|

## Logical operators

|Operator|Name|Result|
|--------|----|------|
|`! $a`|Not|TRUE if $a is not TRUE.|
|`$a && $b`|And|TRUE if both $a and $b are TRUE.|
|`$a || $b`|Or|TRUE if either $a or $b is TRUE.|
|`$a and $b`|And|Like `&&` but precedence is lower.|
|`$a or $b`|Or|Like `||` but precedence is lower.|
|`$a xor $b`|Xor|TRUE if either $a or $b is TRUE, but not both.|

## Simple-assignment operators

The simple-assignment operator `=` assigns its right operand to its left operand.

```php
<?php
$a = 1;
echo $a; // 1
```

## Compound-assignment operators

The compound-assignment operators combine the simple-assignment operator with another binary operator. Compound-assignment operators perform the operation specified by the additional operator, then assign the result to the left operand. 

|Operator|Shorthand|Meaning|
|--------|---------|-------|
|`+=`|`$x += $y`|`$x = $x + $y`|
|`-=`|`$x += $y`|`$x = $x - $y`|
|`*=`|`$x += $y`|`$x = $x * $y`|
|`/=`|`$x += $y`|`$x = $x / $y`|
|`%=`|`$x %= $y`|`$x = $x % $y`|
|`**=`|`$x += $y`|`$x = $x ** $y`|
|`.=`|`$x .= $y`|`$x = $x . $y`|
|`<<=`|`$x <<= $y`|`$x = $x << $y`|
|`>>=`|`$x >>= $y`|`$x = $x >> $y`|
|`&=`|`$x &= $y`|`$x = $x & $y`|
|`^=`|`$x ^= $y`|`$x = $x ^ $y`|
|`|=`|`$x |= $y`|`$x = $x | $y`|
