---
title: "What is a PHP framework and which one should I learn and use?"
read_time: "3 min"
updated: "october 9, 2015"
group: "frameworks"
permalink: "/faq/php-frameworks/what-is-a-framework/"
redirect_from: "/faq/what-is-a-framework/"
og_image: "/resources/images/faq/general/phptools.png"

compass:
  prev: "/faq/databases/orm/"
  next: "/faq/php-frameworks/how-to-make-your-own-framework/"
---

<img src="/resources/images/faq/general/phptools.png" alt="PHP Tools" align="left" width="300" style="padding:0px 10px 10px 0px">

Framework is a tool to help you develop applications faster and better. It is a reusable set of libraries and/or classes. They usually define
default folder structure of a project.

There are many existing, well established and secure open source frameworks with large communities behind them. Rather than reinventing the wheel
many developers use them to built web applications. There is **NO best** and **NO official** PHP framework, because different purposes and
different projects require different tools and approaches.

Using established existing open source framework is strongly advised when working in a team. Framework can provide developers same set of standards and better interoperability when they build application together.

## Which framework should you learn?

Before diving into a PHP framework get yourself familiar with some advanced concepts such as OOP,
design patterns, ORM, authentication, MVC (model view controller) etc. For bigger projects usage of popular open source frameworks instead of your
custom one or procedural programming is advised.

Before understanding modern open source PHP frameworks check also [Composer](https://getcomposer.org/) - a dependency Manager for PHP.

In your career path you will not need to know all of them but you should learn how to use few of the frameworks that
are widely used in the industry or are important to you. Organizations and companies are always moving towards modern popular established frameworks so for predicting which framework will get you a job in PHP market today is a task for a prophet or a fortune teller - therefore it is almost impossible.
You can check the [popularity trends in PHP community](http://phptrends.com/top) and check the most popular ones (according to the stars on GitHub) but don't get fooled by such comparison charts. Each organization can move towards something else sooner or later.

Learning some complex PHP frameworks can have a steep learning curve.

According to the architecture the framework itself is built upon there are three major types of frameworks we will use to categorize them in this
FAQ:

## Component frameworks

Component frameworks are built and decoupled into separate components that you can use in your application independently on other components.
You can just use some components or all of them. Most of component frameworks can be also a full stack framework (described in the next section)
at the same time.

* [Aura](http://auraphp.github.com/)
* [Kohana](http://kohanaframework.org/)
* [Laravel](http://laravel.com/)
* [Nette](http://nette.org/en/)
* [Symfony](http://symfony.com)
* [Zend Framework](http://framework.zend.com)

## Full stack frameworks

Full stack framework includes everything you need to develop an application in one package. Decoupling of compoments is mostly not possible.

* [CakePHP](http://cakephp.org/)
* [CodeIgniter](https://ellislab.com/codeigniter)
* [Cygnite Framework](http://www.cygniteframework.com/)
* [FuelPHP](http://fuelphp.com/)
* [Jelix](http://jelix.org/)
* [Joomla Framework](http://framework.joomla.org/)
* [Lithium](http://li3.me)
* [PHPixie](http://phpixie.com/)
* [Phalcon](http://phalconphp.com/)
* [Phprest](http://phprest.com)
* [PPI](http://www.ppi.io/)
* [Prado](http://www.pradosoft.com/)
* [Simple MVC Framework](http://simplemvcframework.com/)
* [Typo3 Flow](http://flow.typo3.org/)
* [Webiny](http://www.webiny.com/)
* [Yaf](http://yafdev.com/) - PHP framework written in C and built as an PHP extension
* [Yii](http://www.yiiframework.com/)

## Micro-frameworks

Micro-framework holds simple core with very lightweight infrastructure of classes and libraries. Main purpose of micro-frameworks is fast building of application
and still keep lightning speed of performance with small footprint.

* [Bullet PHP](http://github.com/vlucas/bulletphp)
* [Dispatch](https://github.com/noodlehaus/dispatch)
* [FatFree](https://github.com/bcosca/fatfree)
* [Flight](http://flightphp.com/)
* [Flint](https://github.com/flint) - micro-framework built on top of Silex
* [Horus](http://alash3al.github.io/Horus/)
* [Lumen](http://lumen.laravel.com/) - micro-framework by Laravel
* [MicroMVC](http://micromvc.com/)
* [Phlyty](https://github.com/phly) - micro-framewok written using ZF2 components
* [Proton](https://github.com/alexbilbie/Proton) - [StackPHP](http://stackphp.com/) compatible micro-framework
* [Silex](http://silex.sensiolabs.org/) - micro-framework based on Symfony2 components
* [Slim](http://www.slimframework.com/)
* [Yolo](http://yolophp.com/)

## Miscellaneous

* [API Platform](https://api-platform.com/) - API-first web framework on top of Symfony with JSON-LD, Schema.org and Hydra support.
* [Zend Expressive](https://github.com/zendframework/zend-expressive) - Minimalist PSR-7 middleware framework for PHP.

All the popular and the ones we have encountered in this group are listed above in alphabetical order.


## Other resources

* [Why all PHP frameworks suck?](http://www.phpclasses.org/blog/post/226-4-Reasons-Why-All-PHP-Frameworks-Suck.html) - PHP frameworks criticism by Rasmus Lerdorf on phpclasses.org
* [Frameworks inside communities - the war of "best"](http://the-phlog.tumblr.com/post/130568645755/frameworks-inside-communities-the-war-of-best) - blog post about "best" framework

## Related FAQs

* [How to make your own PHP framework?](/faq/php-frameworks/how-to-make-your-own-framework/)
