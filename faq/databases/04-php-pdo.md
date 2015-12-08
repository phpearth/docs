---
title: "What is PDO?"
read_time: "3 min"
updated: "february 10, 2014"
group: "databases"
permalink: "/faq/databases/what-is-pdo/"

compass:
  prev: "/faq/databases/mysqli-or-pdo/"
  next: "/faq/databases/database-vs-filesystem/"
---

PDO stands for "PHP Data Object", which is one of the many ways available for accessing databases in PHP. You can think of it as an alternative to using MySQLi or mysql_ functions (deprecated). However, it's not specific to MySQL databases, it can be used with many different types of databases. So with PDO, you can connect and deal with your database very easily.

## Why PDO Over Others?

You might think, why would I prefer to use it over others? Well, there're many reasons, but the main one is because it uses the same API regardless of which database driver you're using. For example, if you were using SQLite database, you can switch to MySQL very easily; you don't have to change anything but the type of the driver PDO uses (which you specify in the DSN string, later on this).

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

DO also supports things that others don't, such as: named parameters in prepared statements, I think it's enough for an introduction, let's dive in and see how to establish a connection with it.

## Connection

Connection is simply done by instantiating the PDO object with required data for the connection. It looks like this:

```php
$pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
```

Don't worry if this seems confusing to you; In the first parameter we specify the DSN (Data Source Name), which is a simple string that specifies the type of driver we're connecting to (in this case mysql), then followed by a colon which followed by some options required for the connection, in this case: the host and the database name. Then in the last two parameters we put the username and the password for our database.

Now what if the connection failed? In this case the PDO object will throw an exception of <span style="background-color:#0CF;color:#FFF; padding:3px;border-radius:3px;">PDOException</span> type, which includes the errors occurred during connection. So we need to catch that exception and display those errors. Like this:

```php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
}
catch (PDOException $e)
{
    echo $e->getMessage();
}
```

## Allow Exceptions

What would happened if an error occurred while dealing with the database? Such as, the table we're retrieving from doesn't exist. With default settings, we would have to use<span style="background-color:#0CF;color:#FFF; padding:4px;border-radius:3px;"> $pdo->errorCode()</span> and <span style="background-color:#0CF;color:#FFF; padding:4px;border-radius:3px;">$pdo->errorInfo()</span> to fetch the errors. However, there's a better alternative way, which is to convert all errors into exceptions. It's done like this:

```php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo $e->getMessage();
}
```

So we can specify our configurations by using the <span style="background-color:#2e3;color:#FFF; padding:4px;border-radius:3px;">$pdo->setAttribute()</span> method. The default value for PDO::ATTR_ERRMODE is PDO::ERRMODE_SILENT. Another option is to convert errors into php warnings using PDO::ERRMODE_WARNING. Having said that, it's better to stick with exceptions.

## Retrieving Data

To retrieve data with PDO, use the <span style="background-color:red;color:#FFF; padding:4px;border-radius:3px;"> query() </span> method it provides. Which takes the query string you want to execute (the normal SQL query). Then you can loop through the results to deal with the returned rows.

```php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = $pdo->query('SELECT * from users');
    foreach ($data as $row) {
        var_dump($row);
    }
}
catch (PDOException $e)
{
    echo $e->getMessage();
}
```

An alternative way is to call $data->fetchAll(), which returns the results in an array.

```php
$data = $pdo->query('SELECT * from users');
var_dump(gettype($data)); //returns object

$result = $data->fetchAll();
var_dump(gettype($result)); //returns array
```

Without calling fetchAll() it returns an object of type PDOStatement (later on this), otherwise, it returns an array.

As you may know, when executing a query that requires external data from the user (like id), we should escape it before executing it. In PDO we can use the $pdo->quote() method for that. For example:

```php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = $pdo->query('SELECT * from users WHERE id = ' . $pdo->quote($id));
}
catch (PDOException $e)
{
    echo $e->getMessage();
}
```

Even though this works, next you'll see a better way to do it ‐ prepared statements.

<hr>

## Prepared Statements

Using query() is great when the user's data is hardcoded (no external data). However, most of our queries use data from outside ($_GET or $_POST), in these cases we have to be careful form SQL injections. Although we can escape those data manually, PDO provides a better way using prepared statements.

Think of prepared statements as a way to prepare your query before executing it. There are lots of benefits we can get from this. First we have the ability to execute the same statements multiple time with different data. Also it provides a safer way to use user's data in our queries (by binding values).

Here's an example of how to retrieve data with it:

```php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id'); // prepare the statement
    $statement->execute([':id' => $id]); // execute it
    $result = $statement->fetch(); // fetch the result
    var_dump($result); // show the result

    # use the same statement with different id
    $statement->execute([':id' => $anotherId]); // execute it
    $result = $statement->fetch(); // fetch the result
    var_dump($result); // show the result

}
catch (PDOException $e)
{
    echo $e->getMessage();
}
```

The prepare() method takes a normal SQL statement. However, we replace the user's data with a placeholder (in this case :id). Then we execute the statement using the execute() method, which takes an array that contains the data that should be bound to the placeholders. With this approach, we make sure that SQL injection is impossible.

We get a PDOStatement object when executing prepare(). We use this object to retrieve data related to our executed statement. For example, we use fetchAll() or fetch() to fetch the data from database. And we can use rowCount() to get the number of rows affected by the last SQL statement. Check out the documentation for more of them.

Notice we represent the placeholder by a colon followed by any name we want. This is what we call a named parameter. Alternatively, we can represent the placeholder with a question mark (?), which then we have to bind them according to their positions. As a rule of thumb, always use the named parameter because it's easier and more readable.

In case you're wondering what's the difference between fetch() and fetchAll(). We use the former to fetch only the first row matches the query, on the other hand, we use the latter to fetch all rows and return them in an array. When using fetch() we can only access the results by looping over them row by row. fetchAll() on the other hand, returns an array which we can deal with it as we want, which is useful for operations that depend on the overall result.
<hr>

## Specify How To Fetch

When we fetch data using fetch() or fetchAll(), we get the result in an array that is indexed by both column-name and numerical indexed. Something like this:

```php
array (size=6)
  'id' => string '1' (length=1)
  0 => string '1' (length=1)
  'name' => string 'foo' (length=8)
  1 => string 'foo' (length=8)
  'email' => string 'foo@example.com' (length=15)
  2 => string 'foo@example.com' (length=15)
```

While this is the default way of fetching, we can change it easily by passing a value to the fetch method. This value can be one of the following:

* PDO::FETCH_BOTH (the default)
* PDO::FETCH_ASSOC
* PDO::FETCH_BOUND
* PDO::FETCH_CLASS
* PDO::FETCH_OBJ

We're most concerned with the second and last one. We use PDO::FETCH_ASSOC to fetch the result in form of an array with string (column names) keys. And PDO::FETCH_OBJ returns an object of class stdClass with column names as property names.

Here's an example of PDO::FETCH_ASSOC:

```php
$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->execute([':id' => $id]);
$result = $statement->fetch(PDO::FETCH_ASSOC); // result is in an associative array
var_dump($result['email']); // to display the email of user with id = $id
```

Example of PDO::FETCH_OBJ:

```php
$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->execute([':id' => $id]);
$result = $statement->fetch(PDO::FETCH_OBJ); // result is in an object
var_dump($result->email); // to display the email of user with id = $id
```

For consistency, you can specify the option you want as a default for later queries. To do so, set an attribute of PDO::ATTR_DEFAULT_FETCH_MODE to what you want. For example:

```php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}
catch (PDOException $e)
{
    echo $e->getMessage();
}
```
<hr>

## CRUD Examples

Up until now, we've been only reading data from database. Let's review the rest operations of Create, Read, Update and Delete (CRUD).

Insert

```php
$statement = $pdo->prepare('INSERT Into users(name, email) VALUES(:name, :email)');
$statement->execute([
    ':name' => $name,
    ':email' => $email
]);

var_dump($result->rowCount()); //number of affected rows: 1
```

Update

```php
$statement = $pdo->prepare('UPDATE users SET name = :name WHERE id = :id');
$statement->execute([
    ':id' => $id,
    ':name' => $name
]);
var_dump($result->rowCount()); //number of affected rows: 1
```

Delete

```php
$statement = $pdo->prepare('DELETE FROM users WHERE id = :id');
$statement->execute([':id' => $id]);

var_dump($result->rowCount()); //number of affected rows: 1
```

## Finally

Now I think you can do lot with PDO in PHP :)
