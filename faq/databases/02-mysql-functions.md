---
title: "Why are mysql_* functions deprecated and what to do?"
read_time: "4 min"
updated: "october 4, 2015"
group: "databases"
permalink: "/faq/databases/mysql-functions/"

compass:
  prev: "/faq/databases/databases/"
  next: "/faq/databases/mysqli-or-pdo/"
---


If you use `mysql_connect()`, `mysql_query()` and other `mysql_*` functions in your code it will not work anymore in the latest version of PHP 7.

## How to fix it?

In PHP there are multiple ways to access database (PDO, ORMs, or in this case of MySQL database also mysqli). Solution to fix old code should be very simple by refactoring your code to use [PDO_MySQL extension][pdo-mysql] or [mysqli][mysqli].

Here is an example of writing code in the old way by using `mysql_*` functions:

```php
<?php
$link = mysql_connect('localhost', 'db_user', 'db_password');
if (!$link) {
    die('Connection failed: ' . mysql_error());
}
$database = mysql_select_db('db_name', $link);

$firstName = filter_has_var(INPUT_GET, 'firstName') ? filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING) : false;

$query = sprintf("SELECT username FROM friends
    WHERE first_name='%s'",
    mysql_real_escape_string($firstName));

$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result) {
    echo $row['username'];
}
```

Let's refactor above into PDO - the modern and future proof way to access database. PDO's prepared statements below
take care also of SQL injections:

```php
<?php
$pdo = new PDO('mysql:host=localhost;dbname=db_name', 'db_user', 'db_password');

$firstName = filter_has_var(INPUT_GET, 'firstName') ? filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING) : false;

$params = array(':firstName' => $firstName);

$sth = $pdo->prepare('
    SELECT username FROM friends
    WHERE first_name = :firstName');
$sth->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo $row['username'];
}
```

## MySQL Improved Extension - MySQLi

In case of MySQL database there is also MySQLi extension available which works perfectly fine and is simple enough
to use and migrate your `mysql_*` based code to work on PHP 7. But you will be limited to only one database (if you change your mind later and want to move to some other database for instance PostgreSQL) and
also be deprived of some other functionalities in PDO. So, recommended way is to just use PDO.

For migration to mysqli you could use [MySQL Converter tool](https://github.com/philip/MySQLConverterTool) but to be sure
better go through the code manually. MySQLi offers two APIs - OOP and procedural.

Let's refactor above code into mysqli procedural way and prepared statements (for avoiding SQL injection):

```php
<?php
$link = mysqli_connect('localhost', 'db_user', 'db_password', 'db_name');

if (mysqli_connect_errno()) {
    die('Connect failed: ' . mysqli_connect_error());
}

$firstName = filter_has_var(INPUT_GET, 'firstName') ? filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING) : false;

$query = "SELECT username FROM friends WHERE first_name=?";

if ($stmt = mysqli_prepare($link, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $firstName);
    mysqli_stmt_execute($stmt);

    // bind result variables
    mysqli_stmt_bind_result($stmt, $username);

    // fetch values
    while (mysqli_stmt_fetch($stmt)) {
        echo $username;
    }

    // close statement
    mysqli_stmt_close($stmt);
}
```

Let's refactor above code into mysqli object oriented way:

```php
<?php
$mysqli = new mysqli('localhost', 'db_user', 'db_password', 'db_name');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$firstName = filter_has_var(INPUT_GET, 'firstName') ? filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING) : false;

$stmt = $mysqli->prepare("SELECT username FROM friends WHERE first_name=?");
$stmt->bind_param('s', $firstName);
$stmt->execute();
$stmt->bind_result($username);
while ($stmt->fetch()) {
    echo $username;
}
$stmt->close();
```

## Why is MySQL extension deprecated?

MySQL extension of PHP has been in PHP core from very early 2.0 version - it is over **15 years old**. One of the main issues around
MySQL extension and mysql_* functions usage is the security concern about SQL injection attacks if it is not used properly. The other
main reason for deprecation and **removal** of it PHP 7 is that maintenance of it in the core PHP is too complicated and hard. Also
you will not have access to all of the latest features and benefits of your MySQL database.

That is why MySQL extension with all `mysql_*` functions deprecated as of PHP 5.5 and removed in PHP 7 version.


## ORMs

For more advanced and better ways to access databases in PHP you most definitelly should also look at [ORMs](/faq/databases/orm/).


[mysqli]: http://php.net/manual/en/book.mysqli.php
[pdo-mysql]: http://php.net/manual/en/ref.pdo-mysql.php
