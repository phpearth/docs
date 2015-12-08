---
title: "How to make readable, SEO friendly URLs in PHP?"
read_time: "2 min"
updated: "october 16, 2015"
group: "general"
permalink: "/faq/pretty-urls/"

compass:
  prev: "/faq/how-to-run-php-code-online/"
  next: "/faq/projects-suggestions/"
---

For the purposes of readability or SEO you will want to prettify URLs of your web application to make them more descriptive. URL of a web application:

```text
http://example.com/blog.php?id=21
```

In above example `blog.php` is the front controller or the main entry PHP file which processes current request and `id=21` is the
query string which defines ID of the blog post to show.

More user and SEO friendly URL would definitely be something like this:

```text
http://example.com/blog/2015/11/20/awesome-blog-post
```

## How to achieve this?

We want our front controller (`index.php`) to handle all requests that come to a particular directory, except those that should go to an existing asset file such as an image, CSS or JavaScript files. Also most PHP frameworks usually use this single entry point approach for all URLs. First let's configure web server a bit.

### Apache

If you're using Apache 2.2.16 or greater you can use [`FallbackResource`](http://httpd.apache.org/docs/trunk/rewrite/remapping.html#fallback-resource) directive:

In `.htaccess` add this:

```apacheconf
FallbackResource index.php
```

If you are using Apache version prior to 2.2.16 or you will be doing a little more complex stuff, for example if you need to use RewriteBase, or maybe have different rewrite conditions, you will have to use mod_rewrite rules. But in most cases, only the `FallbackResource` will suffice and you can get also a bit better performance.

If you still want to enable `mod\_rewrite` and add some special rewrite rules in `.htaccess` file, check the example below:

```apacheconf
<IfModule mod_rewrite.c>
    Options -MultiViews

    RewriteEngine On
    #RewriteBase /var/www/project/public
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [QSA,L]
</IfModule>
```

On Linux machines you can activate mod_rewrite with `a2enmod` in command line:

```bash
$ sudo a2enmod rewrite
```

### Nginx

Here is an Nginx web server example for doing same requests handling as above. In your Nginx site configuration file `/etc/nginx/sites-available/default` enable PHP and requests handling. Here is minimum configuration to achieve this:

```nginx
server {
    server_name domain.tld www.domain.tld;
    root /var/www/project/public;

    location / {
        # try to serve file directly, fallback to app.php
        try_files $uri /index.php$is_args$args;
    }

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        # Prevents URIs that include the front controller. This will 404:
        # http://domain.tld/index.php/some-path
        # Remove the internal directive to allow URIs like this
        internal;
    }

    error_log /var/log/nginx/project_error.log;
    access_log /var/log/nginx/project_access.log;
}
```

## How to process request in PHP?

Now that we have web server set, we must process incoming request and do the magic to show correct blog post. In this step the usual way of creating web applications is to use a pattern such as MVC, MVP, MOVE or some other. Below is a very simple way to parse URL with PHP. At the end we will list some PHP libraries you should check out if you're not planning to reinvent the wheels here.

```php
<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

```

## Resources

Some other resoures to check out here.

* [FastRoute](https://github.com/nikic/FastRoute) - Request router PHP library
* [PHRoute](https://github.com/mrjgreen/phroute) - Request router PHP library
