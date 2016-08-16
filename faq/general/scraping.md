---
title: "What is web scraping and how to scrape data in PHP?"
read_time: "1 min"
updated: "March 26, 2016"
group: "general"
redirect_from: "/faq/web-crawling-scraping/"
permalink: "/faq/web-scraping/"

compass:
  prev: "/faq/regular-expressions-in-php/"
  next: "/faq/how-to-take-screenshot-of-a-url-with-php/"
---

Web scraping is a process of extracting data from a web document.

Two techniques used for scraping data from web documents are:

* **Document parsing**
  For example HTML or XML document is converted to DOM (Document Object Model).
  PHP offers [DOM extension](http://php.net/manual/en/book.dom.php).

* **Regular expressions**
  To scrape data from web document also regular expressions can be used.

Issue with scraping data from 3rd party websites is with copyrights if you don't
have permissions to use that data. Another disadvantage is keeping up with changes
of the web document. Scraper must be adapted if that document changes. For these
reasons it is better to check and use API of website where data needs to be scraped.

## See also

* [Goutte](https://github.com/FriendsOfPHP/Goutte) - simple PHP Web Scraper
* [Simple HTML DOM Parser](https://github.com/sunra/php-simple-html-dom-parser) - PHP
  Simple HTML DOM Parser adaptation
