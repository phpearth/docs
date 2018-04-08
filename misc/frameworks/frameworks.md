# What is a PHP framework and which one should I learn and use?

![PHP Frameworks](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/frameworks/phptools.jpg "PHP Frameworks")

A framework is a tool to help you develop applications faster and better. It
is a reusable set of libraries and/or classes. They usually define default
folder structure of a project.

There are many existing, well established and secure open source frameworks
with large communities behind them. Rather than reinventing the wheel, many
developers use them to build web applications. There is **NO** best and **NO**
official PHP framework, because different purposes and different projects
require different tools and approaches.

Using established, existing open source frameworks is strongly advised when
working in a team. A framework can provide developers with a common same set of
standards and with better interoperability for when they build applications
together.

## Which framework should you learn?

Before diving into a PHP framework, get familiar with some advanced concepts
such as OOP, design patterns, ORM, authentication, MVC (model view controller),
etc. For bigger projects, using a popular open source framework instead of a
custom framework and instead of procedural programming is advised.

Before understanding modern open source PHP frameworks, check out
[Composer](https://getcomposer.org/); A dependency manager for PHP.

In your career path, you will not need to know all of them, but you should
learn how to use few of the frameworks that are widely used in the industry or
that are important to you. Organizations and companies are always moving
towards modern, popular established frameworks, so predicting which framework
will get you a job in the PHP market today is a task for a prophet or a fortune
teller, and it is therefore almost impossible.

You can check the [popularity trends in PHP community](http://phptrends.com/top)
and check the most popular ones (according to the stars on GitHub), but don't
get fooled by such comparison charts. Each organization can move towards
something else sooner or later.

Learning some complex PHP frameworks can have a steep learning curve.

According to the architecture the framework itself is built upon, there are
three major types of frameworks that we will use to categorize them in this
FAQ:

## Component frameworks

Component frameworks are built and decoupled into separate components that you
can use in your application independently of other components. You can just use
some components or all of them. Most of component frameworks can also be a full
stack framework (described in the next section) at the same time.

* [Aura](http://auraphp.com/)
* [Laravel](https://laravel.com/)
* [Nette](http://nette.org/en/)
* [Symfony](https://symfony.com/components)
* [Zend Framework](https://docs.zendframework.com)

## Full stack frameworks

Full stack framework includes everything you need to develop an application in
one package. Decoupling of components is mostly not possible.

* [Agile Toolkit](http://agiletoolkit.org/)
* [CakePHP](http://cakephp.org/)
* [CodeIgniter](https://ellislab.com/codeigniter)
* [Cygnite Framework](http://www.cygniteframework.com/)
* [FuelPHP](http://fuelphp.com/)
* [Jelix](http://jelix.org/)
* [Joomla Framework](http://framework.joomla.org/)
* [Laravel](https://laravel.com)
* [Lithium](http://li3.me)
* [Opulence](https://www.opulencephp.com/)
* [PHPixie](http://phpixie.com/)
* [Phprest](http://phprest.com)
* [PPI](http://www.ppi.io/)
* [Prado](http://www.pradoframework.net/)
* [Simple MVC Framework](http://simplemvcframework.com/)
* [Swoole](https://github.com/swoole/framework)
* [Symfony](https://symfony.com/)
* [Typo3 Flow](http://flow.typo3.org/)
* [Webiny](http://www.webiny.com/)
* [Yii](http://www.yiiframework.com/)
* [Zend Framework](https://framework.zend.com/)

## Extension frameworks

Extension frameworks are PHP frameworks written in C, C++ or Zephir and built as
PHP extension.

* [Phalcon](http://phalconphp.com/) - A full-stack PHP framework delivered as a
  C-extension.
* [Yaf](http://yafdev.com/) - PHP framework written in C and built as an PHP
  extension.

## Micro-frameworks

A micro-framework holds a simple core with a very lightweight infrastructure of
classes and libraries. The main purpose of micro-frameworks is building
applications quickly while still keeping lightning fast performance speed and a
small footprint.

* [Bullet PHP](https://github.com/vlucas/bulletphp)
* [Dispatch](https://github.com/noodlehaus/dispatch)
* [FatFree](https://github.com/bcosca/fatfree)
* [Flight](http://flightphp.com/)
* [Flint](https://github.com/flint)
* [Horus](http://alash3al.github.io/Horus/)
* [Kraken](http://kraken-php.com) - Distributed and async PHP framework.
* [Lumen](http://lumen.laravel.com/) - Micro-framework by Laravel.
* [MicroMVC](https://github.com/Xeoncross/micromvc)
* [Phlyty](https://github.com/phly) - Micro-framewok written using ZF2
  components.
* [Proton](https://github.com/alexbilbie/Proton) - A
  [StackPHP](http://stackphp.com/)-compatible micro-framework.
* [Slim](http://www.slimframework.com/)
* [Yolo](https://yolophp.computer/)
* [Zend Expressive](https://github.com/zendframework/zend-expressive) - A
  minimalist PSR-7 middleware micro-framework.

## Miscellaneous

* [API Platform](https://api-platform.com/) - API-first web framework on top
  of Symfony with JSON-LD, Schema.org and Hydra support.
* [Apigility](https://apigility.org) - Easy way to build robust, secure and
  documented APIs. Built on top of Zend Framework.
* [Medoo](https://medoo.in) - PHP Database Framework.

All the popular ones that we have encountered in this group are listed above in
alphabetical order.

## Other resources

* [Frameworks inside communities: The war of "best"](http://the-phlog.tumblr.com/post/130568645755/frameworks-inside-communities-the-war-of-best) -
  Blog post about the "best" framework.

## Related FAQs

* [How to make your own PHP framework?](/misc/frameworks/create-your-own-framework.md)
