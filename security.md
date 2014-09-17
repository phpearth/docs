---
title: "What are the most common PHP and web application security concerns? What to do to prevent attacks and how to secure your application?"
author: "Peter Kokot"
---

### {{ page.title }}

Security is a big chapter. You as a developer should know quite a lot about it as well for writing secure code and
bulletproof application. Your duty is to prevent security attacks and secure the data the application is holding.

#### Cross site scripting (XSS)

Cross-site scripting (XSS) is vulnerability in web application where attacker injects client side code (JavaScript) into
web page viewable by other users.

#### SQL injection

SQL injection attack is one of the most common vulnerabilty when dealing with databases in your application.

**SQL injection example**
{% highlight php %}
<?php
// get data is sent through url for example http://example.com/get-user.php?id=2 OR id=2;
$_GET['id'] = "1 OR id = 2";
$id = $_GET['id'];

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
{% endhighlight %}

Just imagine worst case scenarios with injected sql of:

{% highlight sql %}
"'DELETE FROM users */"
{% endhighlight %}

Instead of the above code you should use [mysqli prepared statements](http://php.net/manual/en/mysqli.prepare.php), mysqli_real_escape_string() function or [PDO prepared statements](http://php.net/manual/en/pdo.prepare.php).

#### Cross Site Request Forgery (XSRF/CSRF)

Cross site request forgery or one click attack or session riding is an exploit where user executes unwanted actions on web applications.

#### Error reporting

In your production environment you should always turn off error reporting. If errors occur in your application and they are visible to the outside world
attacker can get valuable data for attacking your application.

{% highlight php %}
<?php
error_reporting(0);

{% endhighlight %}

Some of the resources for you to follow and learn more about PHP security:

* [OWASP](https://www.owasp.org) - The Open Web Application Security Project, organization focused on improving security of software.
* [Securing PHP](http://securingphp.com) - website and a series of books that cover wide range of topics from basic concepts of application
security to specific cases in authentication/authorization and exploit prevention.
* [SensioLabs Security](https://security.sensiolabs.org/) - SensioLabs Security Advisories Checker for checking your PHP project for known security issues
* [versionscan](https://github.com/psecio/versionscan) - PHP version scanner for reporting possible vulnerabilities

