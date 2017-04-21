# Better Performance With Composer

Composer is de-facto standard package manager for PHP. To get better performance
when installing PHP packages, use the lightning fast
[prestissimo plugin](https://github.com/hirak/prestissimo).

Install the plugin globally:

```bash
composer require hirak/prestissimo
```

And use Composer as usual and get performance boost of ~10x because because of
parallel installations:

```bash
composer install
```
