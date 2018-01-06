# Which PHP template engine to use?

Business logic of an application determines how data are created, displayed, stored
and changed. Presentation layer determines how data are presented to the user in
certain format such as HTML, JSON, XML or some other.

Instead of mixing your application's business logic and presentation and duplicating
code, best practice is to separate that with templates. Template engine takes care
of all that applies the [Don't Repeat Yourself (DRY) principle](https://en.wikipedia.org/wiki/Don't_repeat_yourself).

Example of a simple PHP template engine using Closure:

```php
<?php

class Article
{
    /**
     * @var string
     */
    private $title = 'This is an article';
}

class Post
{
    /**
     * @var string
     */
    private $title = 'This is a post';
}

class Template
{
    /**
     * Renders template with closure.
     *
     * @param mixed $context
     * @param string $template
     *
     * @return string
     */
    public function render($context, $template)
    {
        $closure = function($template) {
            ob_start();
            include $template;
            return ob_end_flush();
        };

        // Create a closure
        $closure = $closure->bindTo($context, $context);
        $closure($template);
    }
}

$article = new Article();
$post = new Post();
$template = new Template();

$template->render($article, 'template.php');
$template->render($post, 'template.php');
```

Template file can be reused elsewhere:

```php
<h1><?php echo $this->title;?></h1>
```

Template engines should also take care of XSS security vulnerability by escaping
data:

```php
<?php echo htmlspecialchars($var, ENT_QUOTES, 'UTF-8') ?>
```

Template engines can also feature template inheritance where child templates extend
parent ones:

**layout.php:**

```php
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
    </head>
    <body>
        <?=$this->section('body')?>
    </body>
</html>
```


There is a wide variety of open source PHP templating engines:

* [Aura.View](https://github.com/auraphp/Aura.View) (native)
* [Blade](http://laravel.com/docs/blade) (compiled, framework specific)
* [Brainy](https://github.com/box/brainy) (compiled)
* [Dwoo](http://dwoo.org/) (compiled)
* [FigDice](http://figdice.org) - compiled template rendering system
* [Latte](https://github.com/nette/latte) (compiled)
* [Mustache](https://github.com/bobthecow/mustache.php) (compiled)
* [PHPTAL](http://phptal.org/) (compiled)
* [Plates](http://platesphp.com/) (native)
* [Smarty](http://www.smarty.net/) (compiled)
* [Transphporm](https://github.com/Level-2/Transphporm) - Innovative template
  engine which follows "template animation" approach. Template animation is using
  HTML/CSS... files as a resource and manipulates them via the DOM to generate
  the dynamic output.
* [Twig](http://twig.sensiolabs.org/) (compiled)
* [Zend\\View](http://framework.zend.com/manual/current/en/modules/zend.view.quick-start.html) (native, framework specific)
