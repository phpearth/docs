In this guide you will learn how to install XAMPP stack and start with the PHP
development on the Windows platform.

XAMPP is an *all-in-one* stack that includes PHP, Apache web server and MariaDB
database. It stands for Cross-Platform (**X**), **A**pache, **M**ariaDB, **P**HP,
and **P**erl. Its main advantage is a simple and fast installation of the
popular software for PHP development.

Usually, you won't see such *all-in-one* stacks used in the production online
environments, but to start with PHP development or use it professionally on your
workstation locally, it is a very good pick, nonetheless.

In case of issues, see the [Troubleshooting](#troubleshooting) section at the
bottom of this guide.

## Install XAMPP

Download and install XAMPP from the official [website](https://www.apachefriends.org/index.html).

### Download XAMPP

Head over to the [download section](https://www.apachefriends.org/download.html)
and choose the Windows installer for the **PHP 7.2**. Currently only 32-bit
versions are supported, but this won't be an issue at this step even if you have
a 64-bit operating system.

![Download XAMPP](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/download.png "Download XAMPP")

---

### Run the installer

After download completes, run the installer:

![XAMPP installer](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/installer.png "XAMPP installer")

---

### Confirm app changes

Installer will ask you to confirm changes on your workstation:

![XAMPP allow changes](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/allow-changes.png "XAMPP allow changes")

Click **Yes**.

---

### UAC warning

The following warning is notifying you about the UAC (User Account Control):

```text
Important! Because an activated User Account Control (UAC) on your system
some functions of XAMPP are possibly restricted. With UAC please avoid to
install XAMPP to C:\Program Files (x86) (missing write permissions). Or
deactivate UAC with msconfig after this setup.
```

![XAMPP UAC](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/uac.png "XAMPP UAC")

This means that in case your current Windows system has UAC enabled, you won't
be able to install XAMPP to the `C:\Program Files (x86)` location. You will be
able to install XAMPP elsewhere. For example, in `C:\xampp` folder, which is what
you want actually and this guide suggests further on.

To learn how to disable UAC, follow the procedure in the
[troubleshooting](#troubleshooting) section at the bottom of this guide.

For security purposes avoid disabling the UAC as suggested in the warning and
click **OK**.

---

### Installation wizard

The *Installer's Welcome wizard* screen appears:

![XAMPP Welcome](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/welcome.png "XAMPP Welcome")

Click **Next**.

---

### XAMPP components

The *Components* screen appears. Here you can choose only particular components
that you might need.

![XAMPP Components](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/components.png "XAMPP Components")

A quick components description:

* **Apache**

  This is the main web server that provides something visible at the URL
  `http://localhost`.

* **MySQL**

  This is the main database that will hold your data. This component is actually
  a MariaDB (a fork project of the MySQL), however for the simplicity of
  understanding things, here is called MySQL. Majority of the functionality and
  how to access it with PHP is the same as the MySQL.

* **Filezilla FTP Server**

  This is an additional component to help you upload files remotely. On your
  local machine, it won't be utilized.

* **Mercury Mail Server**

  Server for sending emails. This won't be used in local development environment.

* **Tomcat**

  This is Apache Tomcat web server for running Java code.

* **PHP**

  This is the main component that you want. PHP language software itself.
  Prebuilt, compiled, packaged, and ready for usage.

* **Perl**

  Additional programming language you might want to check out.

* **phpMyAdmin**

  Control panel with accessible via `http://localhost/phpmyadmin` for managing
  the database.

* **Webalizer**

  A separate web based log analizer for statistics and analysis. This won't be
  used on your local machine.

* **Fake Sendmail**

  This is a mailing simulation component that might be useful for sending emails
  on your development machine but not actually delivering them to real address.

This guide will choose all components since they don't change the installation
size or other things much. Click **Next**.

---

### Installation folder

The installation location screen appears. In this guide, the `C:\xampp` is used
for simpler further location access and usage. Otherwise you can install it
wherever you need:

![XAMPP installation folder](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/folder.png "XAMPP installation folder")

Enter the folder location and click **Next**.

---

### Bitnami for XAMPP

The following screen is an information about additional Bitnami for XAMPP add-ons,
which install additional software such as CMS, eCommerce, CRM and similar software
with few button clicks.

![XAMPP Bitnami](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/bitnami.png "XAMPP Bitnami")

Click **Next**.

---

### Ready to install XAMPP

Now you are ready to install the XAMPP stack and all its components.

![XAMPP Ready to install](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/ready.png "XAMPP Ready to install")

Click **Next**.

---

### Installation in progress

Installation procedure is now in progress.

![XAMPP installation](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/installation.png "XAMPP installation")

---

### Firewall

You will also get a notification to configure the firewall rules how the Apache
web server is allowed to communicate on your network. In this guide we will
choose the *Private networks, such as my home or work network*.

![XAMPP firewall](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/firewall.png "XAMPP firewall")

Click **Allow**.

---

### Installation is complete

XAMPP instalation is now completed.

![XAMPP installation complete](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/completed.png "XAMPP installation complete")

Select to start the XAMPP control panel and click **Finish**.

---

### XAMPP language

XAMPP can be used in more languages. This guide will choose *English language*.

![XAMPP language](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/language.png "XAMPP language")

Click **Save**.

---

### Control panel

The XAMPP control panel has been launched:

![XAMPP control panel](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/control-panel.png "XAMPP control panel")

Let's start Apache web server and the database. Click start buttons for Apache
and MySQL. You will get a firewall notification for the database service similar
to the one for Apache web server:

![XAMPP MySQL firewall](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/firewall-db.png "XAMPP MySQL firewall")

Click **Allow** for your private network.

---

### Status

The control panel now indicates that Apache and MySQL services are up and running:

![XAMPP control panel started](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/control-panel-2.png "XAMPP control panel started")

---

### Localhost

By visiting `http://localhost` in your browser, you will see an XAMPP welcome
screen.

![XAMPP localhost](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/localhost.png "XAMPP localhost")

---

### Phpmyadmin

For managing the database, you can use provided phpMyAdmin control panel, which
is available at `http://localhost/phpmyadmin`:

![XAMPP phpMyAdmin](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/phpmyadmin.png "XAMPP phpMyAdmin")

---

## Troubleshooting

### Disabling UAC

This is actually not recommended for security purposes, however in some cases,
you will want to disable the UAC.

* First thing you need to do, is to check, if the current user has administrator
  priviledges. Start command line prompt: `win-key + R` and type `cmd`:

  ![XAMPP run cmd](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/run-cmd.png "XAMPP run cmd")

* Type `lusrmgr.msc`:

  ![XAMPP cmd](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/cmd.png "XAMPP cmd")

* And check if your current user is in the `Administrators` group:

  ![XAMPP users](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/users.png "XAMPP users")

* Once account has administrator priviledges, you can disable the UAC from the
  Control Panel. Open Control Panel and type *UAC* in the upper right search box.
  Click the *Change User Account Control settings*. Drag the slider to
  *Never notify*:

  ![XAMPP disable UAC](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/disable-uac.png "XAMPP disable UAC")

* This disables the UAC. Click **OK** and reboot the computer.

### Apache HTTP Server has stopped working

By the end of the XAMPP installation you might get an error window notifying you
that Apache HTTP Server has stopped working and you have only option to click
the **Close program...** button.

Open XAMPP Control Panel and select `httpd.conf` Apache configuration file:

![XAMPP httpd.conf](https://raw.githubusercontent.com/php-earth/assets/master/images/docs/install/win/xampp/control-panel-httpdconf.png "XAMPP httpd.conf")

And add the following code at the bottom of the file:

```Apacheconf
<IfModule mpm_winnt_module>
    ThreadStackSize 8388608
</IfModule>
```

The default Apache stack size on Windows is 1MB which sometimes causes crashes.

### Port 80 and Skype

Very common issue many users have is the blocked port 80, because the Skype is
using it and Apache cannot use it afterwards.

To change port in Skype:
* Open Skype
* `Tools` -> `Options`
* Select the `Advanced` option from the left column
* Select `Connection`
* Deselect the option that says, `Use port 80 and 443 as alternatives for incoming connections`
* Click Save
* Exit and then restart Skype

Now Skype and Apache can run at the same time on your workstation.
