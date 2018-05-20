# How to send SMS with PHP?

Sending SMS (**S**hort **M**essage **S**ervice) with PHP application is done
for multiple purposes. For example, many security enhancements are integrating
multi-factor authentication system where you can additionaly identify user by
mobile device, retrieve forgotten passwords or similar. Other common usages
are sending marketing messages, or notifing users about different events and
similar.

## Sending SMS via gateway

The diagram below explains a simplified SMS sending flow where PHP application
communicates with a SMS gateway. Gateway converts and forwards received data to
SMS center (SMSC). SMSC routes data to mobile device (end user).

![Sending SMS with PHP](https://raw.githubusercontent.com/phpearth/PHP.earth/master/assets/images/general/sms.png "Sending SMS with PHP")

Most common and simple to integrate usage in PHP applications is using an SMS API.

## Sending SMS via email carriers

Another, less common and less stable option to send SMS is using an email from
particular carrier. SMS is sent by sending an email to certain address with
predefined email data.

## See also

* [gnokii](https://www.gnokii.org/) - Allows you to communicate with the phone.
* [Kannel](http://www.kannel.org/) - Open Source WAP and SMS gateway.
* [Nexmo](https://www.nexmo.com/) - API for sending text messages.
* [PHP Classes](http://www.phpclasses.org/search.html?words=sms&go_search=1) - Several
  solutions to send SMS with PHP.
* [SMS Gateway](https://en.wikipedia.org/wiki/SMS_gateway)
* [SMS Gateway Android](https://smsgateway.me/) - Turn your Android phone into a
  SMS Gateway.
* [PlaySMS](https://playsms.org) - Free and Open Source SMS Gateway written in
  PHP based on Gammu SMSD service.
* [Twillio](https://www.twilio.com/) - API for sending text messages.
* [List of free email to SMS carriers](http://www.emailtextmessages.com)
* Tutorials:
  * [Envato Tuts+](http://code.tutsplus.com/tutorials/how-to-send-text-messages-with-php--net-17693) - How
    to Send Text Messages with PHP.
  * [SitePoint](http://www.sitepoint.com/implement-two-way-sms-with-php/) - Implement
    Two-way SMS with PHP.
