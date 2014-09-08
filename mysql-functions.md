---
title: "mysql_* functions are giving me warnings. Why is MySQL extension of PHP deprecated and what to do?"
author: "Peter Kokot"
---

### {{ page.title }}

If your code uses mysql_connect, mysql_query and other mysql_* functions it will not work at all in the future versions of PHP.

MySQL extension of PHP has been in PHP core from very early 2.0 version - it is over **15 years old**. One of the main issues around
MySQL extension and mysql_* functions usage is the security concern about SQL injection attacks if it is not used properly. The other
main reason for deprecation and **removal** of it in the future of PHP is that it is so old that maintenance of it in the core PHP is
too complicated and hard and you will not have access to all of the features and benefits of your MySQL database.

That is why MySQL extension with all mysql_* functions is deprecated as of PHP 5.5.

What to do instead?

In most cases solution should be very simple. Refactor your code to use [mysqli][mysqli] or [PDO_MySQL extension][pdo-mysql].


[mysqli]: http://php.net/manual/en/book.mysqli.php
[pdo-mysql]: http://php.net/manual/en/ref.pdo-mysql.php
