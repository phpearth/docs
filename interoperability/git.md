---
title: "What is GIT?"
updated: "October 8, 2016"
permalink: "/faq/git-introduction/"
---

Git is one of the most popular free and open source distributed version control
system designed to handle everything from small to very large projects with speed
and efficiency.

Working on code requires a version control system and Git is highly recommended
for versioning PHP code, whether you work on code alone or in a team. It provides
patches, history, rollbacks, code versioning and more for your PHP project as well.

## Installation

Git is available for [download](https://git-scm.com/download/) for multiple
operating systems.

## Linux

To install Git on Linux operating systems best is to use your package manager,
such as `apt-get`, `yum`, `dnf`, `pacman` or `pip`.

For example, Debian based distributions using `apt-get`:

```bash
sudo apt-get install git-all
```

Or for Fedora based distributions:

```bash
sudo yum install git-all
```

### macOS

macOS Sierra and OS X (until El Captain) don't include an up to date Git. Git is
bundled with macOS, here is how to upgrade it:

If you do not have brew, install it:

* Install Xcode from the App Store and run `xcode-select --install` after the
  successful installation.
* Install [brew](http://brew.sh)

Now install Git, brew will delegate a soft link into a higher path'ed directory:

```bash
brew install git
```

You could install Git in other ways (there is an official .dmg-image with an
installer). But this will force you to always handle those updates by yourself.
This will update everything:

```bash
brew update && brew upgrade `brew outdated`
```

### Windows

Beside the Windows installation on the main download page there is also
[Git for Windows](https://git-for-windows.github.io/), providing dedicated
instructions for installation and adds neat shell integration.

## Commit Messages

Commit message is the log information about the change made to the code in the
repository. Generally these must be informative and include all the information
needed about the change. For small changes they can be short, for bigger changes
they should be longer.

Some useful rules of a thumb for commit messages:

* Make the title of the commit message 50 characters or less;
* Put more information in the body part of the message (body starts after two new
  lines after the title);
* Use imperative for the message title - `Add new function` not `New function added`;
* Wrap body text to 72 characters

[A Note About Git Commit Messages, by Tim Pope](http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)
suggests a model you should use for writing useful Git commit messages:

```text
Capitalized, short (50 chars or less) summary

More detailed explanatory text, if necessary.  Wrap it to about 72
characters or so.  In some contexts, the first line is treated as the
subject of an email and the rest of the text as the body.  The blank
line separating the summary from the body is critical (unless you omit
the body entirely); tools like rebase can get confused if you run the
two together.

Write your commit message in the imperative: "Fix bug" and not "Fixed bug"
or "Fixes bug."  This convention matches up with commit messages generated
by commands like git merge and git revert.

Further paragraphs come after blank lines.

- Bullet points are okay, too

- Typically a hyphen or asterisk is used for the bullet, followed by a
  single space, with blank lines in between, but conventions vary here

- Use a hanging indent
```

## Open Source

When creating Git repository in public Git hosting services such as GitHub, best
practice is to add also some of the additional files to the repository which
describe the repository and your code with more details:

* `README.md` - introduction file about the project; ([art-of-readme](https://github.com/noffle/art-of-readme)).
* `CHANGELOG.md` - Change log of the tagged versions using [semantic versions](http://semver.org).
  Dedicated site [Keep a CHANGELOG](http://keepachangelog.com/) describes, why
  is useful having a separate change log for your repository and how to format it.
* `CONTRIBUTING.md` - Open source projects usually add the file describing how to
  get involved and send your patches to the repository.
* `LICENSE` - License of the repository.
* `CONDUCT.md` - Some open source projects include also their code of conduct to
  let the users know what is appropriate and what not. Specially in larger
  and diverse communities having such information adds extra value to the project.
  Having a welcoming and inclusive environment is important for people contributing
  to your project.

## See Also

Useful resources to read more about Git:

* [Git homepage](http://git-scm.com/) - homepage of Git version control system
  with [documentation](https://git-scm.com/doc);
* [Pro Git book](http://git-scm.com/book) - detailed and useful book dedicated
  to Git usage with usage examples;
* [Interactive Git Tutorial from GitHub](https://try.github.io)
* [Git Lint](https://github.com/PurpleBooth/git-lint-validators) - PHP library
  for linting git commit message style
* [Nomad PHP: Commit Messages I have seen](https://www.youtube.com/watch?v=6TCSPsO5HJ4) - lightning
  talk
