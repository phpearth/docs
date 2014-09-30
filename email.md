---
title: "How to send email with PHP?"
read_time: "2 min"
updated: "september 17, 2014"
---

Sending emails with PHP can be done with built in [mail function][mail-function] from the PHP core. But modern contact forms,
headers customization, HTML formats of emails, SMTP sending, local development and testing email and other advanced functionalities
are a must these days. That is why using libraries that can help you get up to speed with emailing in PHP is recommended. There are many
competing open source libraries for sending emails with PHP available:

* [PHPMailer][phpmailer]
* [Swift Mailer][swift-mailer]
* [Zend\Mail][zend-mail]

[mail-function]: http://php.net/manual/en/function.mail.php
[phpmailer]: https://github.com/PHPMailer/PHPMailer
[swift-mailer]: http://swiftmailer.org/
[zend-mail]: http://framework.zend.com/manual/2.3/en/modules/zend.mail.introduction.html
