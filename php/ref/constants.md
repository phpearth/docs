---
stage: prewriting
---

# Constants

Constants in PHP are used to store a value and they cannot be changed or undefined
afterwards during the execution of the script.

```php
<?php

define('FOO', 'value');
```

Constant name start with a letter or underscore followed by any alfanumeric
characters A-Z, a-z.

Scope of the constants is global. They can be used anywhere in your PHP script.

There are two ways to define constants in PHP:

* `define('FOO', 'value')`
* `const BAR = 'value'`

Each way has some benefits and drawbacks.

## Contants defined with define

* `define()` is a function
* `define()` defines constants at run time
* slower compared to `const`

## Constants defined with const

* `const` is a language construct
* `const` defines constants at compile time
* faster compared to function `define()`
* Constants cannot be declared using `const` inside functions, loops, if
  statements or try/catch blocks

```php
<?php

const FOO = 'Hello';

// Outputs "Hello"
echo FOO;

const BAR = FOO.' world';
```

## Array constants

Constants can be also arrays:

```php
<?php

const PLANETS = ['Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune'];

// Outputs "Earth"
echo PLANETS[2];
```

## Expressions

Constants can be also defined as expressions:

```php
<?php

const FOO = 2 * 3;

// Outputs 6
echo FOO;

define('BAR', 3 * 4);

// Outputs 12
echo BAR;
```

## Magic constants

Magic constants are special constants that are provided by PHP and have value
depending where they are used.

Constants in PHP are resolved at runtime (when the script is parsed by PHP).
Magical constants are resolved at compile time.

All magic constants are described below:

| Constant name | Info |
|---------------|------|
| `__LINE__` | The current file line number. |
| `__FILE__` | The full path and filename of the file with symlinks resolved. If used inside an include, the name of the included file is returned. |
| `__DIR__` | The directory of the file without a trailing slash (unless it is the root directory). When used inside an include, the directory of the included file is returned. Equivalent to `dirname(__FILE__)`. |
| `__FUNCTION__` | The function name. |
| `__CLASS__` | The class name with the namespace it was declared in (e.g. Foo\Bar). When used in a trait method, it is the name of the class the trait is used in. |
| `__TRAIT__` | The trait name with the namespace it was declared in (e.g. Foo\Bar). |
| `__METHOD__` | The class method name. |
| `__NAMESPACE__` | The name of the current namespace. |
| `ClassName::class` | The fully qualified class name. |
