# Sessions

A session is a way to store information to be used across multiple pages.

Unlike a cookie, the information is not stored on the users computer, It is stored either on a file in the server or in the database (MySQL for example) or Redis.

You can access the session variables through the `$_SESSION` global variable.

### Starting the session

You can start the session using `session_start()` function , if it is already started nothing will happen.

Note : `session_start()` function must be the first thing to be called in the file.

### Session configurations

There are many configurations,You can check them in the [Manual](https://www.php.net/manual/en/session.configuration.php) but we will focus on the most important ones.

- `session.name` allows you to change the default session name to the name you want.

- `session.auto_start` starts the session automatically, the default is `false`.

- `session.gc_maxlifetime` sets the maximaum lifetime for the session before invalidating it.

### Session Cookie name

You can know the session name by calling `session_name()` function. The default name is `PHPSESSID` but you can change it easily in 4 ways:

- In `php.ini` file through `session.name` configuration.

- Through Apache.

- In `.htaccess` file.

- Through `ini_set()` function at the start of the file before calling  `session_start()` function.

### Invalidating the session

You can acheive this by doing 3 things:

- calling `session_unset()` function which unsets the `$_SESSION` variable.

- Expiring the session cookie in the user's browser:
```php
    setcookie(session_name() , '' , time() - 3600);
```

- Calling the `session_destroy()` function.




