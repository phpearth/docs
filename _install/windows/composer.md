## Install Composer

[Composer](https://getcomposer.org) is a de-facto standard manager for installing
libraries, frameworks, and similar packages for your PHP applications. You will
need to have it as well sooner or later if you haven't used it before.

Go to the [download page](https://getcomposer.org/doc/00-intro.md#installation-windows)
and download the `Composer-Setup.exe` installer.

The Composer Setup options provide to install it without additional uninstaller
for development purposes of Composer itself. At this stage you don't need to
select the *Developer mode*:

![Composer checking CLI](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/cli-check.png "Composer checking CLI")

The installer will check some PHP settings for you:

![Composer checking PHP settings](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/php-check.png "Composer checking PHP settings")

First check is to see if PHP can be run from the command line interface (CLI):

![Composer checking CLI](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/cli-check.png "Composer checking CLI")

In case you're using proxy to connect to internet, enter it here:

![Composer proxy](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/proxy.png "Composer proxy")

After Composer is installed, you will need to close any command line windows or
open a new one so you can fully use it.

![Composer info](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/info.png "Composer info")

Click **Next**.

Composer should now be fully installed on your Windows system:

![Composer completing](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/completing.png "Composer completing")

To check if installation is successful, open the command line and run the
`composer about` or just composer to see if the command produceces any output:

![Composer CMD](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/composer/composer-cmd.png "Composer CMD")
