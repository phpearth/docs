# Contributing guide to PHP resources

We love contributors and people willing to help. Below is described procedure for contributing to this repository in particular and some extra information about it.

* Fork this repository over GitHub
* Create a separate branch for instance `patch-1` so you will not need to rebase your fork if your master branch is merged
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
* Open pull request

## Other notes

### Images in object oriented programming and design patterns

Images in design patterns questions are made with [draw.io][draw.io] tool.

### Generating FB document

Facebook FAQ document in the group is generated with [build][build] script in the main wwphp-fb.github.io repository
which uses [melody][melody] - one file Composer scripts:

```bash
$ sudo sh -c "curl http://get.sensiolabs.org/melody.phar -o /usr/local/bin/melody && chmod a+x /usr/local/bin/melody"
$ melody run build.php -vvv
```

## License

By contributing to this repository you agree to share your knowledge under the [Creative Commons Attribution 4.0 International License][license] and your code under the [MIT license][license].

[php-group]: https://www.facebook.com/groups/2204685680/
[draw.io]: https://www.draw.io
[build]: https://github.com/wwphp-fb/wwphp-fb.github.io/blob/master/build.php
[melody]: http://melody.sensiolabs.org/
[license]: https://github.com/wwphp-fb/php-resources/blob/master/LICENSE