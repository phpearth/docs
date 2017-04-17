---
title: "What is SQL injection and how to prevent it?"
updated: "March 23, 2016"
permalink: "/faq/security/sql-injection/"
---

When working with databases, one of the most common security vulnerabilities in
web applications is definitely SQL injection attack. Malicious users can insert
SQL query into the input data you're using in your SQL queries and instead unwanted
behavior happens.

![SQL injection](https://raw.githubusercontent.com/php-earth/assets/master/images/security/sql-injection.png "SQL injection")

## SQL injection example with PDO

```php
// GET data is sent through URL: http://example.com/get-user.php?id=1 OR id=2;
$id = $_GET['id'] ?? null;

// You are executing your application as usual
// Connect to a database
$dbh = new PDO('mysql:dbname=testdb;host=127.0.0.1', 'dbusername', 'dbpassword');

// Select user based on the above ID
// bump! Here SQL code GET data gets injected in your query. Be careful to avoid
// such coding and use prepared statements instead
$sql = "SELECT username, email FROM users WHERE id = " . $id;

foreach ($dbh->query($sql) as $row) {
    printf ("%s (%s)\n", $row['username'], $row['email']);
}
```

Just imagine worst case scenarios with injected SQL:

```text
"'DELETE FROM users */"
```

How to avoid SQL injection in above example? Use [prepared statements](http://php.net/manual/en/pdo.prepare.php):

```php
$sql = "SELECT username, email FROM users WHERE id = :id";

$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->execute([':id' => $id]);
$users = $sth->fetchAll();
```

## mysqli example

When using MySQL database quite you can also use [mysqli](http://php.net/mysqli) with [prepared statements](http://php.net/manual/en/mysqli.prepare.php), or `mysqli_real_escape_string()` function, however you can just use more advanced PDO.

```php
// get data is sent through url for example, http://example.com/get-user.php?id=1 OR id=2;
$id = $_GET['id'] ?? null;

// in your code you are executing your application as usual
$mysqli = new mysqli('localhost', 'db_user', 'db_password', 'db_name');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// bump! sql injected code gets inserted here. Be careful to avoid such coding
// and use prepared statements instead
$query = "SELECT username, email FROM users WHERE id = " . $id;

if ($result = $mysqli->query($query)) {
    // fetch object array
    while ($row = $result->fetch_row()) {
        printf ("%s (%s)\n", $row[0], $row[1]);
    }

    // free result set
    $result->close();
} else {
    die($mysqli->error);
}
```

Let's fix this with prepared statements. They are more convenient because
`mysqli_real_escape_string()` doesn't apply quotes (it only escapes it).

```php
// get data is sent through url for example, http://example.com/get-user.php?id=1 OR id=2;
$id = $_GET['id'] ?? null;

// in your code you are executing your application as usual
$mysqli = new mysqli('localhost', 'db_user', 'db_password', 'db_name');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// bump! sql injected code gets inserted here. Be careful to avoid such coding
// and use prepared statements instead
$query = "SELECT username, email FROM users WHERE id = ?";

$stmt = $mysqli->stmt_init();

if ($stmt->prepare($query)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        printf ("%s (%s)\n", $row[0], $row[1]);
    }
}
```

## See also

Other useful reading to check out:

* [OWASP](https://www.owasp.org/index.php/SQL_Injection)
* [SQL injection - a community paradoxon](http://the-phlog.tumblr.com/post/129182968120/sql-injection-a-community-paradoxon)
* [Bobby Tables](http://bobby-tables.com/) - A guide to preventing SQL injection.
