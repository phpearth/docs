---
title: "PDO vs. mysqli?"
updated: "March 23, 2016"
permalink: "/faq/databases/mysqli-or-pdo/"
---

For connecting to MySQL or MariaDB database PHP offers two APIs:
[PDO](http://php.net/manual/en/book.pdo.php) with
[PDO_MySQL driver](http://php.net/manual/en/ref.pdo-mysql.php) and
[mysqli](http://php.net/manual/en/book.mysqli.php). Before PHP 7 there was also
[ext/mysql](http://php.net/manual/en/book.mysql.php) which is not recommended for
usage anymore.

Feature differences between mysqli and PDO:

Feature | PDO | MySQLi
--- | --- | ---
**Database support** | 12 different drivers | MySQL and MariaDB
**Interface** | OOP | OOP and procedural
**Named parameters** | Yes | No
**Object mapping** | Yes | Yes
**Prepared statements (client side)** | Yes | No
**Non-blocking, asynchronous queries with mysqlnd support** | No | Yes
**Multiple Statements support** | Most | Yes
**MySQL 5.1+ functionality support** | Most | All


## Database connection

```php?start_inline=1
// PDO
$pdo = new PDO("mysql:host=localhost;dbname=database;charset=utf8", 'username', 'password');

// mysqli, procedural way
$mysqli = mysqli_connect('localhost', 'username', 'password', 'database');

// mysqli, object oriented way
$mysqli = new mysqli('localhost', 'username', 'password', 'database');
```

## Databases support

The core advantage of PDO over MySQLi is in its database driver support. At the
time of this writing, PDO supports 12 different drivers, opposed to MySQLi,
which supports only MySQL and MariaDB databases.


## Named parameters

Another important feature of PDO is easier parameters binding instead of numeric
binding:

```php?start_inline=1
$params = [':username' => 'test', ':email' => $mail, ':last_login' => time() - 3600];

$pdo->prepare('
    SELECT * FROM users
    WHERE username = :username
    AND email = :email
    AND last_login > :last_login');

$pdo->execute($params);
```

MySQLi provides question mark parameter binding and doesn't support named parameters:

```php?start_inline=1
$query = $mysqli->prepare('
    SELECT * FROM users
    WHERE username = ?
    AND email = ?
    AND last_login > ?');

$query->bind_param('sss', 'test', $mail, time() - 3600);
$query->execute();
```

The question mark parameter binding might seem shorter, but it isn't nearly as
flexible as named parameters, due to the fact that the developer must always keep
track of the parameter order; it feels "hacky" in some circumstances.

## Object mapping

Both PDO and MySQLi can map results to objects. This comes in handy if you don't
want to use a custom database abstraction layer, but still want ORM-like behavior.
Let's imagine that we have a User class with some properties, which match field
names from a database.

```php?start_inline=1
class User
{
    public $id;
    public $first_name;
    public $last_name;

    public function info()
    {
        return '#'.$this->id.': '.$this->first_name.' '.$this->last_name;
    }
}
```

Without object mapping, we would need to fill each field's value (either manually
or through the constructor) before we can use the info() method correctly.

This allows us to predefine these properties before the object is even constructed.
For instance:

```php?start_inline=1
$query = "SELECT id, first_name, last_name FROM users";

// PDO
$result = $pdo->query($query);
$result->setFetchMode(PDO::FETCH_CLASS, 'User');

while ($user = $result->fetch()) {
    echo $user->info()."\n";
}

// MySQLI, procedural way
if ($result = mysqli_query($mysqli, $query)) {
    while ($user = mysqli_fetch_object($result, 'User')) {
        echo $user->info()."\n";
    }
}

// MySQLi, object oriented way
if ($result = $mysqli->query($query)) {
    while ($user = $result->fetch_object('User')) {
        echo $user->info()."\n";
    }
}
```

## Security

Let's say a hacker is trying to inject some malicious SQL through the `username`
HTTP query parameter (GET):

```php?start_inline=1
$_GET['username'] = "'; DELETE FROM users; /*"
```

If we fail to escape this, it will be included in the query "as is" - deleting
all rows from the users table (both PDO and mysqli support multiple queries).

```php?start_inline=1
// PDO, "manual" escaping
$username = PDO::quote($_GET['username']);

$pdo->query("SELECT * FROM users WHERE username = $username");

// mysqli, "manual" escaping
$username = mysqli_real_escape_string($_GET['username']);

$mysqli->query("SELECT * FROM users WHERE username = '$username'");
```

As you can see, `PDO::quote()` not only escapes the string, but it also quotes it.
On the other side, `mysqli_real_escape_string()` will only escape the string. You
will need to apply the quotes manually.

```php?start_inline=1
// PDO, prepared statement
$pdo->prepare('SELECT * FROM users WHERE username = :username');
$pdo->execute([':username' => $_GET['username']);

// mysqli, prepared statements
$query = $mysqli->prepare('SELECT * FROM users WHERE username = ?');
$query->bind_param('s', $_GET['username']);
$query->execute();
```

Recommendation is to always use prepared statements with bound queries instead
of `PDO::quote()` and `mysqli_real_escape_string()`.

## Performance

While both PDO and MySQLi are quite fast, MySQLi performs insignificantly faster
in benchmarks - ~2.5% for non-prepared statements, and ~6.5% for prepared ones.
The MySQL extension was even faster.

## See Also

* [PHP manual](http://php.net/manual/en/mysqlinfo.api.choosing.php) - Choosing
  an API for accessing MySQL or MariaDB databases.
