# Contributing Guide to PHP Resources

We love contributors and people willing to help. Below is described procedure for
contributing to this repository in particular and some extra information about it.

* Fork this repository over GitHub
* Create a separate branch for instance `patch-1` so you will not need to rebase
  your fork if your master branch is merged
```bash
$ git clone git@github.com:your_username/php-resources
$ cd php-resources
$ git checkout -b patch-1
```
* Make changes, commit them and push to your fork
```bash
$ git add .
$ git commit -m "Fix typo in the FAQ"
$ git push origin patch-1
```
* Open a pull request

## Style Guide

* This repository uses [Markdown](https://daringfireball.net/projects/markdown/)
  syntax and follows
  [cirosantilli/markdown-style-guide](http://www.cirosantilli.com/markdown-style-guide/)
  style guide.

* Code examples follow [PHP-FIG](http://php-fig.org) [PSR-1](http://www.php-fig.org/psr/psr-2/),
  [PSR-2](http://www.php-fig.org/psr/psr-2/) and
  [extended code style guide proposal](https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md).

* The preferred spelling of English words is the US English (e.g. behavior not
  behaviour).

* Titles capitalize certain words such as nouns, pronouns, adjectives, verbs,
  adverbs, and subordinate conjunctions.

## Images

Some images are created with the [draw.io][draw.io] tool.

## YAML Front Matter

Contents include the YAML front matter blocks with the following parameters to
define extra content information:

* `permalink` - URL path of the content
* `title`
* `image` - image used for open graph
* `updated` - last contextual change date
* `redirect_from` - 301 redirects of previous URLs

## Generating HTML FB Document

Facebook FAQ document in the group is generated with [build][build] script in the
main wwphp-fb.github.io repository which uses [melody][melody] - one file Composer
scripts:

```bash
$ sudo sh -c "curl http://get.sensiolabs.org/melody.phar -o /usr/local/bin/melody && chmod a+x /usr/local/bin/melody"
$ melody run build.php -vvv
```

## License

By contributing to this repository you agree to share knowledge under the
[Creative Commons Attribution 4.0 International License][license] and code under
the [MIT license][license].

[php-group]: https://www.facebook.com/groups/2204685680/
[draw.io]: https://www.draw.io
[build]: https://github.com/wwphp-fb/wwphp-fb.github.io/blob/master/build.php
[melody]: http://melody.sensiolabs.org/
[license]: https://github.com/wwphp-fb/php-resources/blob/master/LICENSE
