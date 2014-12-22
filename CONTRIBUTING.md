# Contributing guide to PHP FAQ

We love contributors and people willing to help. Below is described procedure for contributing to this repository in particular and some extra information about it.

## How to get involved?

Have you noticed a typo or a that question is missing? There are many ways to help improve this collection of questions.

* Send a pull request over GitHub

1. Fork this repository over GitHub
2. Create a separate branch for instance patch-1 so you will not need to rebase your fork if your master branch is merged
3. Edit the content of the repository, commit changes and push to your fork
4. Open a new pull request

* Open a new topic for discussion in the [PHP group][php-group].

## Other notes

### Images in object oriented programming and design patterns

Images in design patterns questions are made with [draw.io](https://www.draw.io) tool.

### Generating HTML file

When new answered questions are added to this collection, also HTML file must be generated for updating
the Facebook document in the [Facebook group][php-group].

[Generator][generator] script uses [melody][melody] - one file Composer scripts:

```bash
$ sudo sh -c "curl http://get.sensiolabs.org/melody.phar -o /usr/local/bin/melody && chmod a+x /usr/local/bin/melody"
$ melody run generator.php -vvv
```

This generates faq.html file which is pasted into the Facebook document as well.

## License

By contributing to the collection of PHP FAQ you agree to share your knowledge under the [Creative Commons Attribution 4.0 International License](LICENSE) and your code under the [MIT license](LICENSE).

[php-group]: https://www.facebook.com/groups/2204685680/
[generator]: https://github.com/wwphp-fb/php-faq/blob/master/generator.php
[melody]: http://melody.sensiolabs.org/