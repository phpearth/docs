---
title: "How to manage wildcart subdomains in PHP?"
read_time: "1 min"
updated: "july 20, 2015"
group: "general"
permalink: "/faq/wildcart-subdomains/"
---

## Wildcard Subdomains With PHP
Wildcard subdomains are used for user specific sites , Deviantart ,blogspot.com are good examples.
Usally DNS handles the subdomains depending on A,CNAME records.

Using htaccess will give control on incoming trafic (URL translation) .
Below htaccess code will redirec any subdomain to php page 

```
RewriteCond %{HTTP_HOST} !^www\.domain\.com
RewriteCond %{HTTP_HOST} ([^.]+)\.domain\.com [NC]
RewriteRule ^/?$ /member.php?username=%1 [L]
```

htacces code will forword incoming rquest to member.php with GET method.So anyone type
joy.domain.com will get contents of domain.com/member.php?username=joy. 
Using SQL query you can verify is the username exist or not. 

```php
$user_query=mysql_query(“SELECT * FROM user WHERE username='$username'”);
$user_query_result=mysql_fetch_row($user_query);
if($user_query_result){
   //show user data
}else{
   //show  404 page
}
```