---
image: https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/interop/makefile.png
---

# Managing projects with Make and Makefiles

When developing or managing applications you will want to execute multiple tasks
from the command line.

For example, to install your PHP application, you usually run:

```bash
composer install
```

To run PHP unit tests:

```bash
phpunit
```

Such tasks seem quite simple to remember and run directly. How about adding few
more options. For example, application installation for production environment:

```bash
composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader --prefer-dist
```

There can be many more tasks in more complex applications. From managing assets
(CSS, JavaScript, images), to database migrations, and similar.

So best way is to have all these tasks at your disposal in the application
documentation and even create a simple custom shell script to execute them.
For example, a simple `run` executable shell script in the root of your project
would look like this:

```bash
#!/bin/sh

target=${1:-usage}

case ${target} in
  install)
    composer install
  ;;
  test)
    phpunit
  ;;
  do-something)
    echo "Your custom task"
  ;;
  *)
    echo "This script provides some common tasks for managing this application"
  ;;
esac
```

Above example uses the Bourne shell with shell command language as described by
the [POSIX](http://pubs.opengroup.org/onlinepubs/9699919799/utilities/sh.html)
standard. Notice the so called shebang `#!/bin/sh` in the first line. Here you
can easily use a more used Bash which provides more extensions compared to standard
POSIX, but for the best portability across different systems and standardization
above example recommends using `sh` instead.

Using shell command language can be very useful and also extendable for practically
any use case, you'll encounter. You can run above script with:

```bash
./run install
```

## Make and Makefile

In this chapter another, more dedicated tool and relatively useful approach is
introduced, a so called `make` tool. By creating a `Makefile` in your project
root directory, you can run multiple application tasks with a simple `make foo`
and have better out-of-the-box approach of defining application tasks in form of
Make rules.

### Why Makefile?

* Language independent - the only dependency you need is Make tool.
* Simpler and cleaner base syntax for defining targets compared to a shell script.
* Make can compare timestamps of the prerequisites and targets and executes given
  recipes only if prerequisites are updated (for example, no need to reinstall
  everything, if there is no change in the given dependencies).

Today there are many different flavors of Make tool on different systems. In this
chapter the GNU Make tool version 4 and above will be used. Linux by default uses
the GNU Make, Windows needs to have it installed separately and if you're using
[WSL - Windows Subsystem for Linux](https://docs.microsoft.com/en-us/windows/wsl/about),
you can get GNU Make from the most Linux distributions with the WSL. On macOS
you can install and update it with `brew install make`.

Let's create a very simple `Makefile` in the root folder of your project:

```Makefile
install:
	composer install

test:
	phpunit
```

The `install` is the target name which can be executed from the command line with
`make install`, and next line(s) prefixed with a tab character define target
recipe. By default, `Makefile` needs tabs in front of the target commands.
Makefile syntax is actually very simple and you can combine it with shell
language.

<script src="https://asciinema.org/a/159027.js" id="asciicast-159027" async async data-rows="20"></script>

## Makefile examples

When writing Makefiles, start with a very simple list of targets and add
complexity in multiple steps later on as your application scales. When adding
new targets, test and understand them thoroughly with each change.

### Tabs vs. spaces

The *tabs people* will love the default `make` indentation prefix. For others,
there is a special `.RECIPEPREFIX` variable, that can define prefix of target
recipes since Make 3.82. In the following examples only spaces will be used.

```Makefile
# This sets the recipe prefix to one or more spaces
.RECIPEPREFIX +=

install:
  composer install
```

### Character `@`

Each time you run a target, make also outputs the command. To avoid outputting
command, add `@` character in front of the target recipes:

```Makefile
.RECIPEPREFIX +=

install:
  @composer install
  @yarn install
```

### Default goal

When you run `make` without specifying the target name it will try to execute
the first target. You can avoid this by setting a special variable `.DEFAULT_GOAL`:

```Makefile
.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
  @echo "Some helper tasks for managing application"
```

### Displaying help

The following example shows, how you can add a quick usage documentation inside
a `Makefile`:

```Makefile
.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
  @echo "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m"
  @grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

foo: ## Quick command usage info
  @composer install
  @echo "do some other task"
```

Above displays targets usage for targets that have double hashtags `##` comment
added after their name.

<script src="https://asciinema.org/a/159032.js" id="asciicast-159032" async data-rows="20"></script>

### Phony targets

Make is by default dedicated to generating executable files from their sources
and all target names are files in the project folder. Most common usage of Make
are compiled languages such as C.

The built-in `.PHONY` target defines targets which should execute their recipes
even if the file with the same name as target is present in the project.

When you're adding a `Makefile` in your project you should define all custom
targets as phony to avoid issues if file with same name is present in the
project.

```Makefile
.RECIPEPREFIX +=

.PHONY: install
install:
  @composer install

.PHONY: test
test:
  @phpunit
```

In above example even if you have a file `install` in your project directory make
tool won't try to remake that file.

You can simplify this a bit more by setting phony targets in one line:

```Makefile
.RECIPEPREFIX +=
.PHONY: install test

install:
  @composer install

test:
  @phpunit
```

Or in case you know that there will be only phony targets used in your Makefile:

```Makefile
.RECIPEPREFIX +=
.PHONY: *

install:
  @composer install

test:
  @phpunit
```

You can also set phony targets dynamically with `.PHONY: $(MAKECMDGOALS)`. A
special Makefile variable `$(MAKECMDGOALS)` is the list of goals you specify
when running `make target1 target2`. This can be used in reverse order by setting
phony targets and filtering out files:

```Makefile
.PHONY: $(filter-out vendor node_modules,$(MAKECMDGOALS))
```

Above all given targets will be phony except for `vendor` and `node_modules`.
Usage of such case is presented in the next example - the prerequisites.

### Prerequisites

By default a Makefile rule looks like this:

```Makefile
targets : prerequisites
  recipe
  …
```

Default Make behavior is to try remaking the targets files when prerequisite
files are changed. This can be useful when using Makefile for PHP. For example:

```Makefile
.RECIPEPREFIX +=

vendor: composer.json composer.lock
  @composer install
```

Notice that `vendor` target is not a phony target in this case. So this will
execute the `composer install` recipe only when `composer.json` or
`composer.lock` files are changed.

Makefile compares the timestamps of the `vendor` folder and composer files. It
will execute the recipe only when one of the prerequisites is newer of the
`vendor` target. This is useful to not execute same task all over again when not
required.

With combining phony targets, your Makefile looks like this:

```Makefile
.RECIPEPREFIX +=
.PHONY: $(filter-out vendor node_modules,$(MAKECMDGOALS))

vendor: composer.json composer.lock
  @composer install

node_modules: package.json package.lock
  @npm install
```

If file `composer.lock` is not commited in the Git repository it won't be
present at the beginning and make will complain. You can use the built-in
`wildcard` function:

```Makefile
.RECIPEPREFIX +=
.PHONY: $(filter-out vendor node_modules,$(MAKECMDGOALS))

vendor: composer.json $(wildcard composer.lock)
  @composer install
```

### Passing variables

Some targets might require additional variables. With Make you can use arguments
`make foo arg=value`.

```Makefile
.RECIPEPREFIX +=

foo:
  @echo $(arg)
```

In case you need to stop executing the recipe if variable is not set, you can test
if variable has been set and stop executing next line(s):

```Makefile
.RECIPEPREFIX +=

foo:
  @test "$(arg)"
  @echo $(arg)
```

### Conditionals

Makefiles in general have a built-in conditional parts.

```Makefile
.RECIPEPREFIX +=
.PHONY: *

foo:
ifeq ($(env),dev)
  @echo "This is executed in development environment"
else ifeq ($(env),prod)
  @echo "This is executed in production environment"
else
  @echo "This is executed when environment is not set"
endif
```

Syntactically correct way is to use the default Makefile conditional syntax,
however sometimes you will want to resort to shell if clauses for having more
control and more options. For example:

```Makefile
.RECIPEPREFIX +=
.PHONY: *

foo:
  @if test "$(env)" = "dev"; then \
    echo "This is executed in development environment"; \
  elif test "$(env)" = "prod"; then \
    echo "This is executed in production environment"; \
  else \
    echo "This is executed when environment is not set"; \
  fi
```

<script src="https://asciinema.org/a/159029.js" id="asciicast-159029" async data-rows="20"></script>

## Putting everything together

Here is an example with all above put into a single `Makefile`:

```Makefile
.RECIPEPREFIX +=
.DEFAULT_GOAL := help
.PHONY: $(filter-out vendor node_modules,$(MAKECMDGOALS))

help:
  @echo "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m"
  @grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

# Define your custom targets, for example
vendor: composer.json $(wildcard composer.lock) ## Install PHP application
  @composer install

node_modules: package.json package.lock ## Install Node modules
  @npm install
```

## See also

* [GNU Make](https://www.gnu.org/software/make/)
* [Clark Grubb's Makefile coding style](http://clarkgrubb.com/makefile-style-guide)
