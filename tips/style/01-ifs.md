# Return from if statements as soon as possible

```php
function foo($bar, $baz) {
    if (!checkSomething($bar, $baz)) {
        if (!findSomething($bar, $baz)) {
            if (!checkFoo($bar, $baz)) {
                if (count($bar) > 0 && $baz == 1) {
                    doSomething();
                }
            }
        }
    }
}
```

Instead, this is much more readable and manageable:

```php
function foo($bar, $baz) {
    if (checkSomething($bar)) {
        return;
    }

    if (findSomething($bar, $baz)) {
        return;
    }

    if (checkFoo($bar, $baz)) {
        return;
    }

    if (!(count($bar) > 0 && $baz == 1)) {
        return;
    }

    doSomething();
}
```
