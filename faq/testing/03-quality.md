---
title: "How to write quality code or how to at least analyze code quality?"
read_time: "1 min"
updated: "October 23, 2015"
group: "testing"
permalink: "/faq/testing-and-quality/php-and-code-quality/"

compass:
  prev: "/faq/testing-and-code-quality/behavior-driven-development/"
  next: "/faq/testing-and-code-quality/debugging-php-code/"
---

Beside writing tests there are more factors that affect the quality of your code. Let's check some tools for PHP that
can improve your code quality.

## PHP Metrics

![PHP Metrics](https://raw.githubusercontent.com/wwphp-fb/php-resources/master/images/faq/testing/phpmetrics.png "PHP Metrics")

[PHP Metrics][phpmetrics] is a very convenient static analisys tool for your code or PHP projects.

Installation can be made with [Composer][composer] or by downloading phar:

```bash
composer global require 'halleck45/phpmetrics'
phpmetrics --report-html=myreport.html /path/of/your/sources
```

PhpMetrics can even interact with [Jenkins][jenkins] and [Sonar][sonar].

After running phpmetric tool from terminal you get HTML file that looks something like this:

![PHP Metrics Report](https://raw.githubusercontent.com/wwphp-fb/php-resources/master/images/faq/testing/phpmetrics_2.png "PHP Metrics Report")

Some PhpMetrics reports examples:

* [CodeIgniter 3.0 PhpMetrics report](http://bl.ocks.org/peterkokot/raw/c5b4da6935d9a8684248/)
* [Symfony 2.6 PhpMetrics report](http://bl.ocks.org/peterkokot/raw/d43726688595f112a419/)

## Resources

Other useful tools to check out:

* [PHP QA tools][phpqatools] - List of PHP Quality Assurance tools
* [Jenkins PHP][jenkinsphp] - Template for Jenkins Jobs for PHP Projects
* [PHP Mess Detector][phpmd] - User friendly and easy to configure frontend for the raw metrics measured by [PHP Depend][phpdepend]
* [PHPCheckStyle][phpcheckstyle] - open-source tool that helps PHP programmers adhere to certain coding conventions
* [Qafoo Quality Analyzer](https://github.com/Qafoo/QualityAnalyzer) - Tool helping us to analyze software projects.

[phpmetrics]: http://phpmetrics.org
[jenkins]: http://jenkins-ci.org/
[sonar]: http://www.sonarqube.org
[phpqatools]: http://phpqatools.org/
[jenkinsphp]: http://jenkins-php.org/
[phpmd]: http://phpmd.org/
[phpdepend]: http://pdepend.org/
[phpcheckstyle]: https://phpcheckstyle.github.io/
