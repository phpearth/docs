# Web Assets (Images, JavaScript, CSS Files)

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

* [Assetic](https://github.com/kriswallsmith/assetic)
* [Composer](https://getcomposer.org)
* [Bower](https://bower.io/)
* [BowerPHP](https://bowerphp.org/)
* [Grunt](http://gruntjs.com/)
* [NPM](http://npmjs.com/) and [Gulp](http://gulpjs.com/)
* [Robo](http://robo.li/)
* [Webpack](https://webpack.github.io/)

Many developers also use approach of developing a project with two separate
repositories - one for back end (PHP application) and one for front end.

The API points in the back end part are connected with the front end. Maintaining
and scaling to application requirements can be much easier.

## Content Delivery Network (CDN)

High traffic and complex sites many times also create a separated CDN for serving
these static files. This can improve the performance since the asset is downloaded
only once from a separate location.

For many open source front end libraries, many times using a publicly available
CDNs is advices since it reduces the required number of requests and traffic for
your application.

## See also

* [Wikipedia: CDN](https://en.wikipedia.org/wiki/Content_delivery_network)
* [Gulp: Refreshment for Your Frontend Assets](http://knpuniversity.com/screencast/gulp)
* [Sitepoint: A PHP Front End Workflow without Node.js](https://www.sitepoint.com/look-ma-no-nodejs-a-php-front-end-workflow-without-node/)
