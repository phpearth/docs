---
title: "PDO vs. mysqli?"
read_time: "2 min"
updated: "october 22, 2014"
group: "databases"
permalink: "/faq/databases/mysqli-or-pdo/"

compass:
  prev: "/faq/databases/mysql-functions/"
  next: "/faq/databases/what-is-pdo/"
---

Since MySQL extension is deprecated and will be removed in the future versions of PHP the only good solution for connecting with your
database is to use PDO or mysqli extension. But what are the differences and which API would fit into your application?

Performance difference between mysqli and PDO are about the same but features are not. Let's compare mysqli and PDO in this short
feature comparison:


<table>
<thead>
<tr>
<td></td>
<td>
				<strong>PDO</strong>
			</td>
<td>
				<strong>MySQLi</strong>
			</td>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Database support</strong></td>
<td>12 different drivers</td>
<td>MySQL only</td>
</tr>
<tr>
<td><strong>API</strong></td>
<td>OOP</td>
<td>OOP + procedural</td>
</tr>
<tr>
<td><strong>Connection</strong></td>
<td>Easy</td>
<td>Easy</td>
</tr>
<tr>
<td><strong>Named parameters</strong></td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td><strong>Object mapping</strong></td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td><strong>Prepared statements <br>(client side)</strong></td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td><strong>Performance</strong></td>
<td>Fast</td>
<td>Fast</td>
</tr>
<tr>
<td><strong>Stored procedures</strong></td>
<td>Yes</td>
<td>Yes</td>
</tr>
</tbody>
</table>

#Connection Method
```php
$pdo = new PDO("mysql:host=localhost;dbname=database", 'username', 'password');

// mysqli, procedural way
$mysqli = mysqli_connect('localhost','username','password','database');

// mysqli, object oriented way
$mysqli = new mysqli('localhost','username','password','database');
```
#Support
The core advantage of PDO over MySQLi is in its database driver support. At the time of this writing, PDO supports 12 different drivers, opposed to MySQLi, which supports MySQL only

#Named Parameters
This is another important feature that PDO has; binding parameters is considerably easier than using the numeric binding:

```php
$params = array(':username' => 'test', ':email' => $mail, ':last_login' => time() - 3600);

$pdo->prepare('
    SELECT * FROM users
    WHERE username = :username
    AND email = :email
    AND last_login > :last_login');

$pdo->execute($params);
```

opposed to the MySQLi way:

```php
$query = $mysqli->prepare('
    SELECT * FROM users
    WHERE username = ?
    AND email = ?
    AND last_login > ?');

$query->bind_param('sss', 'test', $mail, time() - 3600);
$query->execute();
```

The question mark parameter binding might seem shorter, but it isn't nearly as flexible as named parameters, due to the fact that the developer must always keep track of the parameter order; it feels "hacky" in some circumstances.

Unfortunately, MySQLi doesn't support named parameters.

#Object Mapping

Both PDO and MySQLi can map results to objects. This comes in handy if you don't want to use a custom database abstraction layer, but still want ORM-like behavior. Let's imagine that we have a User class with some properties, which match field names from a database.

```php
class User {
    public $id;
    public $first_name;
    public $last_name;

    public function info()
    {
        return '#'.$this->id.': '.$this->first_name.' '.$this->last_name;
    }
}
```
Without object mapping, we would need to fill each field's value (either manually or through the constructor) before we can use the info() method correctly.

This allows us to predefine these properties before the object is even constructed! For isntance:

```php
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

#Security
Lets say a hacker is trying to inject some malicious SQL through the 'username' HTTP query parameter (GET):

```php
$_GET['username'] = "'; DELETE FROM users; /*"
```
If we fail to escape this, it will be included in the query "as is" - deleting all rows from the users table (both PDO and mysqli support multiple queries).

```php
// PDO, "manual" escaping
$username = PDO::quote($_GET['username']);

$pdo->query("SELECT * FROM users WHERE username = $username");

// mysqli, "manual" escaping
$username = mysqli_real_escape_string($_GET['username']);

$mysqli->query("SELECT * FROM users WHERE username = '$username'");
```

As you can see, PDO::quote() not only escapes the string, but it also quotes it. On the other side, mysqli_real_escape_string() will only escape the string; you will need to apply the quotes manually.

```php
// PDO, prepared statement
$pdo->prepare('SELECT * FROM users WHERE username = :username');
$pdo->execute(array(':username' => $_GET['username']));

// mysqli, prepared statements
$query = $mysqli->prepare('SELECT * FROM users WHERE username = ?');
$query->bind_param('s', $_GET['username']);
$query->execute();
```
I recommend that you always use prepared statements with bound queries instead of PDO::quote() and mysqli_real_escape_string().

#Performance
While both PDO and MySQLi are quite fast, MySQLi performs insignificantly faster in benchmarks - ~2.5% for non-prepared statements, and ~6.5% for prepared ones. Still, the native MySQL extension is even faster than both of these. So if you truly need to squeeze every last bit of performance, that is one thing you might consider.
