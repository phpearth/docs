---
stage: prewriting
---

# Asynchronous PHP

## What is the difference between synchronous and asynchronous programming?

*Synchronous programming* is the most common and used way of writing and executing
code. Code is executed statement by statement. Next statements don't get started
until the previous statement is complete.

In asynchronous programming statements can start to perform before other
statements are completed. Total time is reduced by minimizing the time spent
waiting for operations to complete.

Main issue with asynchronous methodology is the dependency between the so called
callbacks.

## Terminology

To properly understand and have common grounds on this topic, some of the common
terms will be explained below.

* **Concurency**

  Concurency is ability of different program elements to be executed any order.

* **Coroutine**

  Coroutines are program blocks (for example, functions), that can be suspened
  and resumed during the program execution.

## Asynchronous programming in PHP

PHP doesn't provide any optimal means for asynchronous programming yet
out-of-the-box. This can be solved using 3rd party PECL extensions or PHP
libraries.

## Standards

The [PHP Asynchronous Interoperability Group](https://github.com/async-interop)
has been formed to propose standards to PHP-FIG one day.

## PHP libraries

* [React PHP](https://reactphp.org/)

## PECL extensions

* [Swoole](https://www.swoole.co.uk)

## See also

Further resources to study the *asynchronous* topic in more details:

* [PHP Roundtable: Asynchronous PHP](https://www.phproundtable.com/episode/asynchronous-php)
* [elazar/asynchronous-php](https://github.com/elazar/asynchronous-php) - List
  of resources for asynchronous programming in PHP.
* [The Magic Behind Async PHP](https://blog.kelunik.com/2017/11/06/magic-behind-async-php.html)
