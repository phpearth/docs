# How to bring variables into a method, the right way

One common question is how to bring (elevate) a variable into (the context of) a
method. There are many possible ways to do this, those are the recommended ways
based on their scopes:

## The hardcoded function

Hardcoded functions are methods who live in a namespace or the global namespace.
Functions usually are used to group instructions that may be repeated or to
provide a isolated executable context for a specific scenario. To elevate a
variable into a function you have to serve the variable as a parameter of the
function.

```php
<?php

function increase(int $variable): int
{
    return $variable + 1;
}

$a = 1;
$b = increase($a);

echo "increasing ".$a." to ".$b; // outputs: 2
```

## The lambda function

Lambda functions are methods who live in the current context, they are hosted by
a variable and can be executed in the same way as regular functions are executed.
Lambda functions provide 2 ways to obtain variables of the upper scope:

## The variable elevation

```php
<?php

$a = 1;

$lambda = function() use ($a): int {
    return $a + 99;
};

echo $lambda(); // outputs: 100
```

## The function parameter

```php
<?php

$lambda = function (int $variable): int
{
    return $variable + 1;
}

$a = 1;
$b = $lambda($a);

echo "increasing ".$a." to ".$b; // outputs: 2
```

## The Class Scope

Classes are intended to maintain properties, the best way to bring a parameter
into a method is to provide the value of the parameter to a class instance as a
property of the object. If there is a context requirement where a variable must
be considered for a method of the class instance, the method should obtain the
variable as a parameter:

```php
<?php

class Incrementor {
    protected $value;
    
    public function __construct(int $startValue)
    {
        $this->value = $startValue;
    }
    
    public function add(int $value): Incrementor
    {
        $this->value += $value;
        
        return $this;
    }
    
    public function getValue(): int
    {
        return $this->value;
    }
}

$foo = new Incrementor(0);
$value = $foo->add(10)->getValue();

echo $value; // outputs: 10
```

## The global anti-pattern

There is another way that is impractical because it directly elevates a pointer
to a variable into the context of a function. Once you do this, you can not
guarantee the integrity of the variable when a method is executed or not. Globals
are hard to maintain and therefore deprecated.

### Don't do this

```php
<?php

$var = 1;

function foo() {
    global $var;
  
    $var++;
}

foo();

echo $var; // outputs: 2
```
