---
title: "mysql_* functions are giving me warnings. Why is MySQL extension of PHP deprecated and what to do?"
read_time: "5 min"
updated: "september 17, 2014"
group: "databases"
permalink: "/faq/databases/mysql-functions/"
---

If your code uses mysql\_connect, mysql\_query and other mysql_* functions it will not work at all in the future versions of PHP.

MySQL extension of PHP has been in PHP core from very early 2.0 version - it is over **15 years old**. One of the main issues around
MySQL extension and mysql_* functions usage is the security concern about SQL injection attacks if it is not used properly. The other
main reason for deprecation and **removal** of it in the future of PHP is that it is so old that maintenance of it in the core PHP is
too complicated and hard and you will not have access to all of the features and benefits of your MySQL database.

That is why MySQL extension with all mysql_* functions is deprecated as of PHP 5.5.

What to do instead?

In most cases solution should be very simple. Refactor your code to use [mysqli][mysqli] or [PDO_MySQL extension][pdo-mysql].

**Example**

Old code using mysql_* functions:

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

Let's refactor above code into mysqli procedural way and prepared statements:

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

Refactoring into PDO:

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

[mysqli]: http://php.net/manual/en/book.mysqli.php
[pdo-mysql]: http://php.net/manual/en/ref.pdo-mysql.php
