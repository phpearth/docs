---
title: "How to send email with PHP?"
read_time: "2 min"
updated: "october 6, 2015"
group: "general"
permalink: "/faq/how-to-send-email-with-php/"

compass:
  prev: "/faq/ecommerce/"
  next: "/faq/how-to-show-errors/"
---

Sending emails with PHP can be done with built-in [mail function][mail-function] from the PHP core. But building modern contact forms,
customize headers, sending HTML emails, SMTP sending, local development, testing emails and other advanced functionalities
are sort of a must these days. That is why using libraries that can help you get up to speed with emailing in PHP is recommended. There are many
competing open source libraries for sending emails with PHP available:

* [PHPMailer][phpmailer]
* [Swift Mailer][swift-mailer]
* [Zend\Mail][zend-mail]

## Examples

### mail()

Let's send simple email with built-in [mail][mail-function] function:

```php
<?php

$message = 'Hello, world.';

mail('receiver@example.com', 'My subject', $message);
```

Keep in mind that for above to work you will need to setup also mail server.

### PHPMailer

Let's look at a simple example to use [PHPMailer][phpmailer] and SMTP:

```php
<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'from@example.com';
$mail->FromName = 'Mailer';
$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
```

### Swift Mailer

Let's take the above example and refactor it to use the [Swift Mailer][swift-mailer] library:

```php
<?php
require_once 'lib/swift_required.php';

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.example.org', 25)
  ->setUsername('your username')
  ->setPassword('your password')
  ;

/*
You could alternatively use a different transport such as Sendmail or Mail:

// Sendmail
$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

// Mail
$transport = Swift_MailTransport::newInstance();
*/

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);
```


### Zend Mail

In the following example we assume you know Zend Framework. Let's send an email with Zend Mail:

```php
<?php

use Zend\Mail;

$mail = new Mail\Message();
$mail->setBody('This is the text of the email.');
$mail->setFrom('Freeaqingme@example.org', 'Sender\'s name');
$mail->addTo('Matthew@example.com', 'Name of recipient');
$mail->setSubject('TestSubject');

$transport = new Mail\Transport\Sendmail();
$transport->send($mail);
```

## Resources

Some other useful 3rd party services to check out when sending emails:

* [Mandril](http://mandrill.com/)
* [SendGrid](http://sendgrid.com)
* [Mailgun](https://www.mailgun.com)

[mail-function]: http://php.net/manual/en/function.mail.php
[phpmailer]: https://github.com/PHPMailer/PHPMailer
[swift-mailer]: http://swiftmailer.org/
[zend-mail]: http://framework.zend.com/manual/current/en/modules/zend.mail.introduction.html
