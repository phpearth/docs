---
title: "How to manage wildcart subdomains in PHP?"
read_time: "1 min"
updated: "august 29, 2015"
group: "general"
permalink: "/faq/wildcart-subdomains/"

compass:
  prev: "/faq/which-editor-or-ide/"
  next: "/faq/intro/what-is-php/"
---

Wildcard subdomains are used for user specific sites, Deviantart, blogspot.com are good examples.
Usually DNS handles the subdomains depending on A,CNAME records.

Using `.htaccess` will give control on incoming trafic (URL translation).
Below `.htaccess` code will redirect any subdomain to PHP page.

```
RewriteCond %{HTTP_HOST} !^www\.domain\.com
RewriteCond %{HTTP_HOST} ([^.]+)\.domain\.com [NC]
RewriteRule ^/?$ /member.php?username=%1 [L]
```

`.htacces` code will forward incoming request to `member.php` with GET method. So anyone who types
`joy.domain.com` will get content of `domain.com/member.php?username=joy`.
By using SQL query you can verify if the username exists or not.

```php
$sth = $dbh->prepare("SELECT * FROM user WHERE username=:username");
$sth->bindParam(':username', $username, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
if ($result) {
   // show user data
} else {
   // show 404 page
}
```
