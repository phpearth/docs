---
title: "How to test PHP code?"
read_time: "1 min"
updated: "october 27, 2014"
group: "testing"
permalink: "/faq/testing/index.html"
---

Testing code is important and should not be avoided although it adds extra time to development process of an application.
When you refactor your code, add new functionality or just make some minor changes you can quickly break something and
suddenly your application is not working anymore. The horror of every developer. That is why testing might help you deal with this process and improve your development process.

In PHP there are many tools and frameworks available for testing purposes.

Testing approaches in PHP specific development:

* Test driven develoipment (aka TDD)

TDD is a software development process in which you repeat a very short development cycles in which you write code that passes or intentionally fails. More info at [Wikipedia](http://en.wikipedia.org/wiki/Test-driven_development)

[PHPUnit](https://phpunit.de/) - PHP Testing framework.

You can install it very simply with Composer. Check official PHPUnit's documentation for more information.

```bash
$ composer require --dev phpunit/phpunit
```

Unit tests...

* Behavior Driven Development (aka BDD)

In software engineering, behavior-driven development (BDD) is a software development process based on test-driven development (TDD). Behavior-driven development combines the general techniques and principles of TDD with ideas from domain-driven design and object-oriented analysis and design to provide software development and management teams with shared tools and a shared process to collaborate on software development. More info at [Wikipedia](http://en.wikipedia.org/wiki/Behavior-driven_development)

[Behat](http://docs.behat.org/en/v2.5/) - Behavior Driven Development Framework for PHP

You can install it very simply with Composer. Check official Behat's documentation for more information.

```bash
$ composer require --dev behat/behat
```

[PHPSpec](http://www.phpspec.net/) - Behavior Driven Development Framework for PHP

You can install it very simply with Composer. Check official PHPSpec's documentation for more information.

```bash
$ composer require --dev phpspec/phpspec
```

## Testing spaghetti code

What is spaghetti code?

Spaghetti code is a term for complex unstructured code, which also has lots of goto statements, exceptions, threads and other unstructured
branching constructs.

What is Macaroni code?

Languages all mixed up like mac and cheese. For example SQL and PHP together.

## Why testing code if the application works ok and is in production?

It can be bad code
- maybe there is repeating code in different parts of your app
- when you copy/paste code you can break things. We are a human being and we all make mistakes or you might just copy and paste bugs as well besides the code.
