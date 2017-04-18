# How to Protect and Hide PHP Source Code?

In the time of open-source there are multiple benefits of making your code
available to all. However when deploying or selling your PHP code to a client you
might want to protect and hide it because of different business reasons or security.

There are multiple approaches to check based on the use cases:

* [Obfuscation](https://en.wikipedia.org/wiki/Obfuscation_(software)) - makes code
  difficult to read by a human in order to hide its logic or purpose. In most
  cases the reverse-engineering of such code is still possible so obfuscation
  doesn't provide proper code protection if you need it.
* [SaaS - Software as a service](https://en.wikipedia.org/wiki/Software_as_a_service)
  is code licensing approach where the code is accessed from a server based on
  licenses and subscriptions to enabled users. Consider this kind of way if you
  want to make sure that the code is not available to end-users or that it is
  used only on request.
* License agreements and contracts are the usual approach to make agreements
  between coders with clients.

## See Also

* [PHP Encoder by ionCube](http://www.ioncube.com/php_encoder.php) - Proprietary
  PHP encoder.
* [Zend Guard](http://www.zend.com/en/products/zend-guard) - Proprietary protector
  of applications with PHP encoding
