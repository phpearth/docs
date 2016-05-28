---
title: "Why are mysql_* functions removed and what to do?"
read_time: "4 min"
updated: "March 23, 2016"
group: "databases"
permalink: "/faq/databases/mysql-functions/"

compass:
  prev: "/faq/databases/introduction/"
  next: "/faq/databases/mysqli-or-pdo/"
---

If your code has `mysql_connect()`, `mysql_query()` and other `mysql_*` functions,
they will not work anymore in the latest version of PHP 7.

MySQL extension (ext/mysql) with all `mysql_*` functions has been deprecated in
PHP 5.5 and removed in PHP 7.

## How to fix it?

In PHP there are multiple ways to access database (PDO, ORMs, or mysqli for MySQL
and MariaDB databases). Fixing legacy and old code is recommended and shouldn't be
very difficult and time consuming task by refactoring it to [PDO_MySQL extension][pdo-mysql]
or [mysqli][mysqli].

Here is an example of writing code in the old way by using `mysql_*` functions:

~~~php?start_inline=1
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
~~~

Let's refactor above into PDO - the modern and future proof way to access database. PDO's prepared statements below
take care also of SQL injections:

~~~php?start_inline=1
$pdo = new PDO('mysql:host=localhost;dbname=db_name', 'db_user', 'db_password');

$firstName = filter_has_var(INPUT_GET, 'firstName') ? filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING) : false;

$params = [':firstName' => $firstName];

$sth = $pdo->prepare('
    SELECT username FROM friends
    WHERE first_name = :firstName');
$sth->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo $row['username'];
}
~~~

## MySQL Improved Extension - MySQLi

In case of MySQL database there is also MySQLi extension available which works perfectly fine and is simple enough
to use and migrate your `mysql_*` based code to work on PHP 7. But you will be limited to only one database (if you change your mind later and want to move to some other database for instance PostgreSQL) and
also be deprived of some other functionalities in PDO. So, recommended way is to just use PDO.

For migration to mysqli you could use [MySQL Converter tool](https://github.com/philip/MySQLConverterTool) but to be sure
better go through the code manually. MySQLi offers two APIs - OOP and procedural.

Let's refactor above code into mysqli procedural way and prepared statements (for avoiding SQL injection):

~~~php?start_inline=1
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
~~~

Let's refactor above code into mysqli object oriented way:

~~~php?start_inline=1
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
~~~

## Why is MySQL extension deprecated?

MySQL extension has been in PHP core from the very early 2.0 version - it was
over **15 years old**. One of the main reasons for removal was difficult and
complicated maintenance in the PHP core. MySQL extension also doesn't provide all
the latest features and benefits of the MySQL database.

## See also

* [PDO tutorial](https://phpdelusions.net/pdo)
* [PDO Tutorial for MySQL Developers](http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers)
* [Related FAQ: What is ORM?](/faq/databases/orm/) - Advanced ways to access databases in PHP.
* [Supercharging PHP MySQL applications using the best API](http://blog.ulf-wendel.de/2012/php-mysql-why-to-upgrade-extmysql/) - Blog post explaining why upgrading from ext/mysql is a good idea.


[mysqli]: http://php.net/manual/en/book.mysqli.php
[pdo-mysql]: http://php.net/manual/en/ref.pdo-mysql.php
