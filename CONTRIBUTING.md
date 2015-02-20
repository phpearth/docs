# Contributing guide to PHP resources

We love contributors and people willing to help. Below is described procedure for contributing to this repository in particular and some extra information about it.

## How to get involved?

Have you noticed a typo or a missing content? There are many ways to help improve this repository.

### Send pull request over GitHub

* Fork this repository over GitHub
* Create a separate branch for instance patch-1 so you will not need to rebase your fork if your master branch is merged
```bash
$ git clone git@github.com:your_username/php-resources
$ cd php-resources
$ git checkout -b patch-1
```
* Edit the content of the repository, commit changes and push to your fork
```bash
$ git add .
$ git commit -m "Fix typo in the FAQ"
$ git push origin patch-1
```
* Open a new pull request

### Start discussion in the group

Open a new topic for discussion in the [PHP group][php-group] about this knowledge repository.

## Other notes

### Images in object oriented programming and design patterns

Images in design patterns questions are made with [draw.io][draw.io] tool.

### Generating HTML file for FAQ

When new answered questions are added to the collection of frequetly asked questions, also HTML file must be generated for updating
the Facebook document in the [Facebook group][php-group].

[Generator][generator] script uses [melody][melody] - one file Composer scripts:

```bash
$ sudo sh -c "curl http://get.sensiolabs.org/melody.phar -o /usr/local/bin/melody && chmod a+x /usr/local/bin/melody"
$ melody run generator.php -vvv
```

This generates faq.html file which is pasted into the Facebook document as well.

## License

By contributing to knowledge resources of PHP you agree to share your knowledge under the [Creative Commons Attribution 4.0 International License][license] and your code under the [MIT license][license].

[php-group]: https://www.facebook.com/groups/2204685680/
[draw.io]: https://www.draw.io
[generator]: https://github.com/wwphp-fb/php-resources/blob/master/generator.php
[melody]: http://melody.sensiolabs.org/
[license]: https://github.com/wwphp-fb/php-resources/blob/master/LICENSE