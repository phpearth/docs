---
title: "How to write quality code or how to at least analyze code quality?"
read_time: "1 min"
updated: "april 9, 2015"
group: "testing"
permalink: "/faq/testing-and-quality/php-and-code-quality/"
---

Beside writing tests there are more factors that affect the quality of your code. Let's check some tools for PHP that
can improve your code quality.

## PHP Metrics

[PHP Metrics][phpmetrics] is a very convenient static analisys tool for your code or PHP projects.

Installation can be made with [Composer][composer] or by downloading phar:

```bash
composer global require 'halleck45/phpmetrics'
phpmetrics --report-html=myreport.html /path/of/your/sources
```

PhpMetrics can even interact with [Jenkins][jenkins] and [Sonar][sonar].

## Resources

Other useful tools to check out:

* [PHP QA tools][phpqatools] - List of PHP Quality Assurance tools
* [Jenkins PHP][jenkinsphp] - Template for Jenkins Jobs for PHP Projects
* [PHP Mess Detector][phpmd] - User friendly and easy to configure frontend for the raw metrics measured by [PHP Depend][phpdepend]
* [PHPCheckStyle][phpcheckstyle] - open-source tool that helps PHP programmers adhere to certain coding conventions


[phpmetrics]: http://phpmetrics.org
[jenkins]: http://jenkins-ci.org/
[sonar]: http://www.sonarqube.org
[phpqatools]: http://phpqatools.org/
[jenkinsphp]: http://jenkins-php.org/
[phpmd]: http://phpmd.org/
[phpdepend]: http://pdepend.org/
[phpcheckstyle]: https://phpcheckstyle.github.io/