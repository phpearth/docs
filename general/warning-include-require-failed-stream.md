---
title: "How to fix failed to open stream warning?"
updated: "November 20, 2016"
permalink: "/faq/warning-failed-to-open-stream/"
---

A common warning when working with PHP can be:

```
Warning: include(myinclude.php): failed to open stream: No such file or directory in myfile.php on line 1
```

## Why does this happen?

You have some lines to include a file like this:

```php
<?php
  include 'myinclude.php';
?>
```

while your folder tree view is like this:

/includes/myinclude.php
index.php

Now PHP can not find the file myinclude.php because it is not in the same directory as the index.php.

## How to fix this?

A basic fix for this is setting the appropriate directory. For this example:

```php
<?php
  include 'includes/myinclude.php';  
?>
```

## What if the included file is in a different subfolder then the including file?

Sometimes we have a file tree view like this:

files/index.php
includes/myinclude.php

in this case a simple 

```php
<?php
  include '../includes/myinclude.php';  
?>
```
would do the trick, however the best practice for this case is to use script dir centric paths:

```php
<?php
  include __DIR__.'/../includes/myinclude.php';  
?>
```
