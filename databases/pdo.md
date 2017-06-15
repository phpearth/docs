# What is PDO?

PDO stands for "PHP Data Object", which is one of the many ways available for
accessing databases in PHP. You can think of it as an alternative to using MySQLi
or mysql_ functions (deprecated). However, it's not specific to MySQL databases,
it can be used with many different types of databases. So with PDO you can access
your database very easily.

## Why PDO over others?

You might think, why would I prefer to use it over others? Well, there are many
reasons, but the main one is because it uses the same API regardless of which
database driver you're using. For example, if you were using SQLite database,
you can switch to MySQL very easily; you have to change only the type of the driver PDO uses
(which you specify in the DSN string), the rest are dependent on compatibility of SQL/features you used.

PDO currently supports 12 different databases:

* Cubrid
* FreeTDS / Microsoft SQL Server / Sybase
* Firebird
* IBM DB2
* IBM Informix Dynamic Server
* MySQL 3.x/4.x/5.x
* Oracle Call Interface
* ODBC v3 (IBM DB2, unixODBC and win32 ODBC)
* PostgreSQL
* SQLite 3 and SQLite 2
* Microsoft SQL Server / SQL Azure
* 4D

PDO also supports named parameters in prepared statements over other extensions.

## Connection

Connection to a database is established simply by instantiating the PDO object
with required data for the connection. It looks like this:

```php
$pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
```

Don't worry if this seems confusing to you; In the first parameter we specify the
DSN (Data Source Name), which is a simple string that specifies the type of driver
we're connecting to (in this case mysql), then followed by a colon which followed
by some options required for the connection, in this case: the host and the
database name. Then in the last two parameters we put the username and the
password for our database.

Now what if the connection fails? In this case the PDO object will throw an
exception of `PDOException` type, which includes the errors that occurred during
connection. So we need to catch that exception and display those errors:

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

## Allow exceptions

What would happened if an error occurred while dealing with the database? For example
table we're retrieving data from doesn't exist. With default settings, we would
have to use `$pdo->errorCode()` and `$pdo->errorInfo()` to fetch the errors.
A better way is to convert all the errors to exceptions:

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

So we can specify our configurations by using the `$pdo->setAttribute()` method.
The default value for `PDO::ATTR_ERRMODE` is `PDO::ERRMODE_SILENT`. Another
option is to convert errors to PHP warnings using `PDO::ERRMODE_WARNING`. Having
said that, it's better to stick with exceptions.

## Retrieving data

To retrieve data with PDO, use the `PDO::query()` method. It takes the query
string you want to execute (the normal SQL query) and returns `PDOStatement` object.
`PDOStatement` object has various methods for dealing with results.

To retrieve data from `PDOStatement` you can use `PDOStatement::fetch()` or `PDOStatement::fetchAll()`.
`PDOStatement::fetch()` returns single row while `PDOStatement::fetchAll()` returns all rows.
Both methods return data as array by default.

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT * from users');
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
        var_dump($row);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

`PDOStatement` objects also implemented `Traversable` interface, so you can iterate through them using `foreach`.

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT * from users');
    foreach ($stmt as $row) {
        var_dump($row);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

But note that `PDOStatement` objects are not `Iterator`.


As you may know, when executing a query that requires external data from the user
(like id), we should escape it before executing it. For this we can use the
`$pdo->quote()` method:

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = $pdo->query('SELECT * from users WHERE id = ' . $pdo->quote($id));
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

Even though this works, next you'll see a better way to do it ‐ prepared statements.

## Prepared statements

Using `PDO::query()` is great when the user's data is hardcoded (no external data).
However, most of our queries use data from outside (`$_GET` or `$_POST`). In
these cases we have to be careful of SQL injections. Although we can escape
those data manually, PDO provides a better way by using prepared statements.

Think of prepared statements as a way to prepare your query before executing it.
There are lots of benefits we can get from this. First we have the ability to
execute the same statements multiple time with different data. Also it provides
a safer way to use user's data in our queries (by binding values).

Here's an example of how to retrieve data with it:

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id'); // prepare the statement
    $statement->execute([':id' => $id]); // execute it
    $result = $statement->fetch(); // fetch the result
    var_dump($result); // show the result

    // use the same statement with different id
    $statement->execute([':id' => $anotherId]); // execute it
    $result = $statement->fetch(); // fetch the result
    var_dump($result); // show the result
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

The `PDO::prepare()` method takes a normal SQL statement and replaces the user's
data with a placeholder (in this case :id). Then we execute the statement using
the `PDOStatement::execute()` method, which takes an array that contains the data that
should be bound to the placeholders. With this approach, we make sure that SQL
injection is impossible.

We get a `PDOStatement` object when executing `PDO::prepare()`. We use this
object to retrieve data related to our executed statement. For example, we use
`PDOStatement::fetchAll()` or `PDOStatement::fetch()` to fetch the data from database. To get the
number of rows affected by the last SQL statement we can use `PDOStatement::rowCount()`.

Notice we represent the placeholder by a colon followed by any name we want.
This is what we call a named parameter. Alternatively, we can represent the
placeholder with a question mark (?), which then we have to bind them according
to their positions. As a rule of thumb, always use the named parameter because
it's easier and more readable.

In case you're wondering what's the difference between `PDOStatement::fetch()` and
`PDOStatement::fetchAll()`, where former is used to fetch only the first row that matches
the query, and the latter is used to fetch all rows and return them as an array.
With `PDOStatement::fetch()` we can only access the results by looping over them row by
row. `PDOStatement::fetchAll()` on the other hand, returns an array which we can deal with
it as we want. This is useful for operations that depend on the overall result.

## Specify how to fetch

When we fetch data using `PDOStatement::fetch()` or `PDOStatement::fetchAll()`,
we get the result as an array that is indexed by both column-name and numerical
indexed:

```text
array (size=6)
  'id' => string '1' (length=1)
  0 => string '1' (length=1)
  'name' => string 'foo' (length=8)
  1 => string 'foo' (length=8)
  'email' => string 'foo@example.com' (length=15)
  2 => string 'foo@example.com' (length=15)
```

While this is the default way of fetching, we can change it easily by passing a
value to the fetch method. This value can be one of the following:

* PDO::FETCH_BOTH (the default)
* PDO::FETCH_ASSOC
* PDO::FETCH_BOUND
* PDO::FETCH_CLASS
* PDO::FETCH_OBJ

We're most concerned with the second and last one. We use PDO::FETCH_ASSOC to
fetch the result in form of an array with string (column names) keys. And
PDO::FETCH_OBJ returns an object of class stdClass with column names as property
names.

Here's an example of PDO::FETCH_ASSOC:

```php
<?php

$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->execute([':id' => $id]);
$result = $statement->fetch(PDO::FETCH_ASSOC); // result is in an associative array
var_dump($result['email']); // to display the email of user with id = $id
```

Example of PDO::FETCH_OBJ:

```php
<?php

$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->execute([':id' => $id]);
$result = $statement->fetch(PDO::FETCH_OBJ); // result is in an object
var_dump($result->email); // to display the email of user with id = $id
```

For consistency, you can specify the option you want as a default for later
queries. To do so, set an attribute of PDO::ATTR_DEFAULT_FETCH_MODE to what you
want:

```php
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo $e->getMessage();
}
```

## CRUD examples

Above examples were only for reading data from database. Let's review other CRUD
(Create, Read, Update and Delete) operations.

### Insert

```php
<?php

$statement = $pdo->prepare('INSERT Into users(name, email) VALUES(:name, :email)');
$statement->execute([
    ':name' => $name,
    ':email' => $email
]);

var_dump($result->rowCount()); //number of affected rows: 1
```

### Update

```php
<?php

$statement = $pdo->prepare('UPDATE users SET name = :name WHERE id = :id');
$statement->execute([
    ':id' => $id,
    ':name' => $name
]);
var_dump($result->rowCount()); //number of affected rows: 1
```

### Delete

```php
<?php

$statement = $pdo->prepare('DELETE FROM users WHERE id = :id');
$statement->execute([':id' => $id]);

var_dump($result->rowCount()); //number of affected rows: 1
```

## See also

* [PDO tutorial](https://phpdelusions.net/pdo)
* [PDO Tutorial for MySQL Developers](http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers)
