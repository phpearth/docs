---
title: "How to prettify urls? .htaccess"
read_time: "1 min"
updated: "september 2, 2015"
group: "general"
permalink: "/faq/pretty-urls/"
---

Your PHP web application usually has web urls like this if you don't prettify them:

```text
http://test.com/blog.php?id=21
```

Where the `blog.php` is the so called front controller or the main PHP script which processes current request and `id=21` is the
ID of the blog post to show.

More user and SEO friendly URL would definitely be:

```text
http://test.com/blog/2015/11/20/awesome-blog-post
```

## How to achieve this with PHP?

### Apache

Most common solution to prettify urls is using Apache's mod\_rewrite and .htaccess file for rewriting urls.

On Linux Machines you can activate mod_rewrite with `a2enmod` in command line:

```bash
$ sudo a2enmod rewrite
```

### .htaccess file

After activating mod_rewrite on Apache you can start using `.htaccess` file with rewriting rules.