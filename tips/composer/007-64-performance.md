# Better performance with Composer

Composer is de-facto standard package manager for PHP. To get better performance
when installing PHP packages, use the lightning fast
[prestissimo plugin](https://github.com/hirak/prestissimo).

Install the plugin globally:

```bash
composer require hirak/prestissimo
```

And as usual, use Composer to get a performance boost of ~10x because of
parallel installations:

```bash
composer install
```
