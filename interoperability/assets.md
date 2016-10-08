---
title: "Web assets (images, JavaScript, CSS files)"
updated: "October 8, 2016"
permalink: "/article/assets/"
---

Assets are front end and static files such as CSS stylesheets, JavaScript files,
images and similar.

There are multiple approaches you can check out when working with these files in
your PHP application.

Handling these files usually includes installation from 3rd party location (GitHub),
and copying the required files to your publicly accessible folder, such as `web`,
`public_html` and similar.

After installation you usually also want to minimize JavaScript and CSS files.

For images maybe you need to create favicons for multiple devices from source
logo of the website and similar.

* [Composer](getcomposer.org)
* [NPM](http://npmjs.com/) and [Gulp](http://gulpjs.com/)
* [Bower](https://bower.io/)
* [Webpack](https://webpack.github.io/)
* [Robo](http://robo.li/)
* [Grunt](http://gruntjs.com/)
* [Assetic](https://github.com/kriswallsmith/assetic)

Many developers also use approach of developing a project with two separate
repositories - one for backend (PHP application) and one for front end.
