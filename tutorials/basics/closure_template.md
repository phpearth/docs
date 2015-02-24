---
title: "How to write a simple tiny primitive Template engine in PHP using Closure"
read_time: "1 min"
updated: "february 24, 2015"
group: "tutorials"
permalink: "/tutorials/php-basics/how-to-write-a-simple-tiny-primitive-template-engine-in-php-using-closure.html"
layout: "article"
---

```php
<?php

class Article
{
	private $title = "This is an article";
}

class Post
{
	private $title = "This is a post";
}

class Template
{
    function render($context, $tpl)
    {

        $closure = function($tpl){
            ob_start();
            include $tpl;
            return ob_end_flush();
        };

        //Create a closure 
        $closure = $closure->bindTo($context, $context);
        $closure($tpl);

    }
}

$art = new Article();
$post = new Post();
$template = new Template();

$template->render($art, 'tpl.php');
$template->render($post, 'tpl.php');
```

```php
#############
#tpl.php
############
<h1><?php echo $this->title;?></h1>
```
