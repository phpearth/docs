---
title: "How to test PHP code?"
read_time: "1 min"
updated: "February 18, 2016"
group: "testing"
permalink: "/faq/testing/"

compass:
  prev: "/faq/security/uploading-files/"
  next: "/faq/testing-and-code-quality/behavior-driven-development/"
---

Testing code is an important part of development and should not be avoided. It
adds extra time to development but it also improves code quality and saves you more
time when you're adding new features, or refactoring your code without breaking
something.

You're testing your code already between the development itself without maybe
realizing. When you add some part of code, you either check for the correct output
or response in browser, database etc. However this way not all cases are
considered and it is not repeatable and automated. Soon you need something more
reliable and organized.

In PHP there are available many testing tools and frameworks. Testing can be
categorized based on the approach.

## Test driven development (aka TDD)

TDD is a software development process in which you repeat a very short development
cycles in which you write code that passes or intentionally fails.

### Unit testing

Probably the most used tool and de-facto standard for unit testing in PHP is the
[PHPUnit](https://phpunit.de/) testing framework. It has an awesome manual so do
read it and start using TDD.

### Functional testing

By using tools you create automated tests, where application is actually used
instead of just checking certain parts of code.

* [Selenium](http://seleniumhq.com/)
* [Mink](http://mink.behat.org/)
* [Codeception](http://codeception.com/)

## Behavior driven development (aka BDD)

Behavior driven development is a software development process that evolved from
TDD. It makes unit tests more natural by making English sentences that express
certain behavior. Read more about PHP focused BDD in the dedicated
[FAQ](/faq/testing-and-code-quality/behavior-driven-development/).

## Testing spaghetti code

What is spaghetti code?

Spaghetti code is a term for complex unstructured code, which also has lots of
goto statements, exceptions, threads and other unstructured branching constructs.

What is Macaroni code?

Languages all mixed up like mac and cheese. For example SQL and PHP together.

## Why testing code if the application works ok and is in production?

* Code can be bad and you want to assure it is working ok
* Maybe there is repeating code in different parts of your application
* When you copy/paste code you can break things. We are a human beings and we all
  make mistakes. Also bugs might get copied and pasted besides the code.

## Resources

* [PHPCI](https://www.phptesting.org/) - Free and open source continuous integration
  specifically designed for PHP.
* [Wikipedia](http://en.wikipedia.org/wiki/Test-driven_development)
