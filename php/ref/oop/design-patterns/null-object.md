# Null object design pattern in PHP

Null object design pattern is a software design pattern where the null object
replaces the checking for null values. It defines the default behavior of some
service class method and does nothing.

![Null object design pattern UML diagram](https://assets.php.earth/docs/oop/design-patterns/null-object.png "Null Object Design Pattern UML Diagram")

## PHP example of the null object pattern

Below is a simple example of different types of commands and an application
which uses them.

```php
<?php

interface CommandInterface
{
    public function execute();
}

class OutputCommand implements CommandInterface
{
    public function execute()
    {
        echo 'Output from the command';
    }
}

class FileCommand implements CommandInterface
{
    public function execute()
    {
        file_put_contents(__DIR__.'/log.txt', date('Y-m-d H:i:s'), FILE_APPEND | LOCK_EX);
    }
}

class NullCommand implements CommandInterface
{
    public function execute()
    {
        // Do nothing.
    }
}

class Application
{
    public function run(CommandInterface $command = null)
    {
        $executableCommand = $command ?? new NullCommand();

        return $executableCommand->execute();
    }
}
```

Usage is then the following:

```php
<?php
// ...

$outputCommand = new OutputCommand();
$fileCommand = new FileCommand();
$app = new Application();

// Echo predefined string
$application->run($outputCommand); // Output from the command

// Create a file and append string to it
$application->run($fileCommand);

// Do nothing
$application->run();
```

If we run the application without providing it the command, it does nothing,
because in that case it uses the null object `NullCommand`. Without the null
object, we would have to check that in the client code which becomes messy as
more commands are added or in more complex situations.

## Open source PHP implementations

Some examples of the null object design pattern implementations in open source:

* [NullOutput in Symfony Console](https://github.com/symfony/console/blob/master/Output/NullOutput.php)
* [NullHandler in Monolog](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Handler/NullHandler.php)

## See also

* [Null Object Pattern](https://en.wikipedia.org/wiki/Null_Object_pattern) - Wikipedia article
* [DesignPatternsPHP: Null Object](http://designpatternsphp.readthedocs.io/en/latest/Behavioral/NullObject/README.html)
* [The Null Object Pattern – Polymorphism in Domain Models](https://www.sitepoint.com/the-null-object-pattern-polymorphism-in-domain-models/) - Sitepoint article
