---
title: "What is SQL injection and how to prevent it?"
read_time: "2 min"
updated: "october 3, 2015"
group: "security"
permalink: "/faq/security/sql-injection/"
---

One of the most common security vulnerabilties in web applications is SQL injection attack when working with databases in your application.

## SQL injection example with PDO

```php
<?php
// get data is sent through url for example http://example.com/get-user.php?id=2 OR id=2;
$_GET['id'] = "1 OR id = 2";
$id = $_GET['id'];

// in your code you are executing your application as usual
$dbh = new PDO('mysql:dbname=testdb;host=127.0.0.1', 'dbusername', 'dbpassword');

// bump! sql injected code gets inserted here. Be careful to avoid such coding
// and use prepared statements instead
$sql = "SELECT username, email FROM users WHERE id = " . $id;

foreach ($dbh->query($sql) as $row) {
    printf ("%s (%s)\n", $row['username'], $row['email']);
}
```

Just imagine worst case scenarios with injected sql of:

```text
"'DELETE FROM users */"
```

How to avoid SQL injection in above example? Use [prepared statements](http://php.net/manual/en/pdo.prepare.php);

```php

$sql = "SELECT username, email FROM users WHERE id = :id";

$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':id' => $id));
$users = $sth->fetchAll();
```

## Resources

Other useful resources to check out:

* [OWASP](https://www.owasp.org/index.php/SQL_Injection)
* [SQL injection - a community paradoxon](http://the-phlog.tumblr.com/post/129182968120/sql-injection-a-community-paradoxon)