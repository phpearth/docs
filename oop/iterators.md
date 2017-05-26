# What are Iterators in PHP and How to Use Them?

An iterator is an object that enables a programmer to traverse a container.
Various types of iterators are often provided via a container's interface.

```php
// Create a DirectoryIterator to list all files in current directory.
$it = new DirectoryIterator('./');
foreach ($it as $file) {
    // Excludes . and .. entries.
    if (!$file->isDot()) {
        echo $file->getFilename(), "\n";
    }
}
```

All iterator objects in PHP must implement either `Iterator` or `IteratorAggregate` interface.
`Iterator` and `IteratorAggregate` both extended `Traversable` interface which is an abstract interface
that cannot be implemented directly by any classes. `Traversable` itself has no methods defined.
The sole purpose of `Traversable` is to be used as dependency.

```php
/*
 * This function accepts both Iterator and IteratorAggregate as its parameter.
 */
function giveMeTraversable(Traversable $it)
{
    // ...
}
```

Some built-in functions also require `Traversable` as parameters for example: `iterator_count()`, `iterator_to_array()`.

Objects implemented `Iterator` act as iterator itself,
while objects implemented `IteratorAggregate` act as a provider of `Iterator`.
But both can be used as an iterator.

`Iterator` interface has 5 methods defined.

```php
interface Iterator extends Traversable
{
    public function current();
    public function key();
    public function next();
    public function rewind();
    public function valid();
}
```

While `IteratorAggregate` interface has only 1 method.

```php
interface IteratorAggregate extends Traversable
{
    public function getIterator();
}
```

## Using Iterator interface
```php
class IntegerRangeIterator implements Iterator
{
    private $start;
    private $end;
    private $key;
    private $value;
    
    public function __construct($start, $end)
    {
        $this->start = (int)$start;
        $this->end = (int)$end;
        $this->rewind();
    }
    
    public function current()
    {
        return $this->value;
    }
    
    public function key()
    {
        return $this->key;
    }
    
    public function next()
    {
        if (!$this->valid()) {
            return;
        }
        if ($this->value === $this->end) {
            $this->value = null;
            return;
        }
        if ($this->start < $this->end) {
            $this->value++;
        } else {
            $this->value--;
        }
        $this->key++;
    }
    
    public function rewind()
    {
        $this->value = $this->start;
        $this->key = 0;
    }
    
    public function valid()
    {
        return !is_null($this->value);
    }
}

$it = new IntegerRangeIterator(10, 1);
foreach ($it as $key => $value) {
    echo $key, ':', $value, "\n";
}

```

### Output
```
0:10
1:9
2:8
3:7
4:6
5:5
6:4
7:3
8:2
9:1
```

## Using IteratorAggregate interface
```php
<?php
class IntegerRangeIterator implements IteratorAggregate
{
    private $start;
    private $end;

    public function __construct($start, $end)
    {
        $this->start = (int)$start;
        $this->end = (int)$end;
    }

    public function getIterator()
    {
        return new ArrayIterator(range($this->start, $this->end));
    }
}

$it = new IntegerRangeIterator(1, 10);
foreach ($it as $key => $value) {
    echo $key, ':', $value, "\n";
}

```

### Output
```
0:1
1:2
2:3
3:4
4:5
5:6
6:7
7:8
8:9
9:10
```

---

People many times forget about underused and built in
[iterators in PHP's standard PHP library](http://php.net/manual/en/spl.iterators.php).

## Resources

* [PHP manual](http://php.net/manual/en/class.iterator.php) - The Iterator
  interface chapter in the PHP Manual.
