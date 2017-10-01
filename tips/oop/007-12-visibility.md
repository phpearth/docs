# Visibility

Private and protected properties of classes are not about security, but provide
information about the code for users, to let them know how to use them.

http://php.net/manual/en/language.oop5.visibility.php

Private and protected properties can be read by converting objects to arrays,
closures, or by reverse-engineering using the reflection API.

```php
class Foo
{
    private $private = "private";
    protected $protected = "protected";
}
```

Retrieving the private property value directly results in a fatal error:

```php
$foo = new Foo();
var_dump($foo->private);
// PHP Fatal error:  Uncaught Error: Cannot access private property Foo::$private in 7.php: 17
```

Converting to an array:

```php
$foo = (array) $foo;
var_dump($foo["\0Foo\0private"]);
var_dump($foo["\0*\0protected"]);
// string(7) "private"
// string(7) "protected"
```

Using the reflection API:

```php
$foo = new Foo();
$reflection = new ReflectionObject($foo);
$private = $reflection->getProperty('private');
$private->setAccessible(true);
var_dump($private->getValue($foo));
// string(7) "private"

$protected = $reflection->getProperty('protected');
$protected->setAccessible(true);
var_dump($protected->getValue($foo));
// string(7) "protected"
```

Using a closure:

```php
$foo = new Foo();
var_dump((function(){return $this->private;})->bindTo($foo, $foo)());
var_dump((function(){return $this->protected;})->bindTo($foo, $foo)());
// string(7) "private"
// string(7) "protected"
```
