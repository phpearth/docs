# Contributing Guide to PHP Resources

We love contributors and people willing to help. Below is described procedure for
contributing to this repository in particular and some extra information about it.

* Fork this repository over GitHub
* Create a separate branch for instance `patch-1` so you will not need to rebase
  your fork if your master branch is merged

  ```bash
  git clone git@github.com:your_username/php-resources
  cd php-resources
  git checkout -b patch-1
  ```
* Make changes, commit them and push to your fork

  ```bash
  git add .
  git commit -m "Fix typo in the FAQ"
  git push origin patch-1
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

## GitHub Issues Labels

Labels are used to organize issues and pull requests into manageable categories.
The following labels are used:

* **Duplicate** - Attached when the same issue or pull request already exists.
* **Easy Pick** - Requires simple work.
* **Enhancement** - New feature.
* **FAQ** - Attached for FAQ section content.
* **Hacktoberfest** - Attached for open source [Hacktoberfest] event.
* **Invalid** - Attached when
* **Needs Review** - Attached when further review is required.
* **Question** - Attached for questions or discussions.
* **Request** - Attached when request is proposed.
* **Wontfix** - Attached when decided that issue will not be fixed.

## License

By contributing to this repository you agree to share knowledge under the
[Creative Commons Attribution 4.0 International License][license] and code under
the [MIT license][license].

[php-group]: https://www.facebook.com/groups/2204685680/
[draw.io]: https://www.draw.io
[build]: https://github.com/wwphp-fb/wwphp-fb.github.io/blob/master/build.php
[melody]: http://melody.sensiolabs.org/
[license]: https://github.com/wwphp-fb/php-resources/blob/master/LICENSE
[Hacktoberfest]: https://hacktoberfest.digitalocean.com/
