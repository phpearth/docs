# Sessions

A session is a way to store information to be used across multiple pages.

Unlike a cookie, the information is not stored on the users computer. It is stored either on a file on the server, in the database (MySQL for example), or Redis.

You can access the session variables through the `$_SESSION` global variable.

### Starting the session

You can start the session using the `session_start()` function. If it has already started nothing will happen.

Note : The `session_start()` function must be the first thing to be called in the file.

### Session configuration

There are many configuration settings for sessions, and you can check them out in the [manual](https://www.php.net/manual/en/session.configuration.php), but we'll focus on just the most important ones here.

- `session.name` allows you to change the default session name to the name you want.

- `session.auto_start` starts the session automatically. The default is `false`.

- `session.gc_maxlifetime` sets the maximum lifetime for the session before invalidating it.

### Session cookie name

You can know the session name by calling the `session_name()` function. The default name is `PHPSESSID`, but you can change it easily in 4 ways:

- In your `php.ini` file via the `session.name` setting.

- Through Apache.

- Via your `.htaccess` file.

- By using the `ini_set()` function at the start of the file before calling the `session_start()` function.

### Invalidating the session

You can achieve this in 3 ways:

- By calling the `session_unset()` function which unsets the `$_SESSION` variable.

- By expiring the session cookie in the user's browser:
```PHP
setcookie(session_name(), '' ,time() - 3600);
```

- By calling the `session_destroy()` function.
