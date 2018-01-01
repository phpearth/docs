# Make

When developing or managing applications you will want to execute multiple tasks
via CLI commands. For example:

To install your PHP application, you usually run:

```bash
composer install
```

To run PHP unit tests, you run:

```bash
phpunit
```

This is all quite simple to remember and run directly. How about adding few more
options. For example, Composer installation for production:

```bash
composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader --prefer-dist
```

There can be many more tasks in more complex applications. From managing assets
(CSS, JavaScript, images), to database migrations, and similar.

So best way is to have these tasks at your disposal in the application
documentation and more create a custom simple shell script to execute them.
For example, a simple `run` shell script in the root of your project would look
like this:

```bash
#!/bin/sh

target=${1:-usage}

usage() {
  echo "Show script usage"
}

install_app() {
  composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader --prefer-dist
}

run_tests() {
  phpunit
}

if [ "${target}" = "install" ]; then
  install_app
elif [ "${target}" = "test" ]; then
  run_tests
else
  usage
fi
```

This can be very useful and also extendable for practically any use case, you'll
encounter.

```bash
./run install
```

## Make and Makefile

In this chapter another, more dedicated tool and relatively useful approach is
introduced, a so called `make` tool. By creating a `Makefile` in your project
root directory, you can run multiple application tasks with a simple `make foo`
and have better out-of-the-box approach of defining application tasks in form of
Make rules.

Let's create a very simple `Makefile` in the root folder of your project:

```Makefile
install:
	composer install

test:
	phpunit

foo:
	echo "bar"
```

First thing you might notice in the above example is that `Makefile` by default
needs tabs in front of the target commands. The `install` is the target name which
can be executed from the command line with `make install`, and the next line(s)
prefixed with a tab character define target steps.

To run the `install` target:

```bash
make install
```

Today there are many different flavors of Make tool on different systems. In this
chapter the GNU Make tool version 4 and above will be used. Linux by default uses
the GNU Make, Windows needs to have it installed separately or if you're using
[WSL - Windows Subsystem for Linux](https://docs.microsoft.com/en-us/windows/wsl/about),
you can get a GNU Make via most Linux distributions. On macOS you can install and
update it with `brew install make`.

## Makefile recipes

### Character `@`

Each time you run a target, make also outputs the command. To avoid outputting
command, add `@` character in front of the target steps:

```Makefile
install:
	@composer install
	@yarn install
```

### Default goal

When you run `make` without specifying the target name it will try to execute
the first target. You can avoid this by setting a `.DEFAULT_GOAL` special variable:

```Makefile
.DEFAULT_GOAL := help

help:
	@echo "Some helper tasks for managing application"
```

### Usage info

The following example shows, how you can add a quick usage documentation inside
a `Makefile`:

```Makefile
.DEFAULT_GOAL := help

help: ## Output usage documentation
	@echo "Usage: make COMMAND [args]\n\nCommands:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

command: ## Quick command usage info
	@composer install
	@echo "do some other task"
```

### Tabs vs. spaces

Tabs people will love the default `make` identation prefix. For spaces people,
there is a special `.RECIPEPREFIX` variable, that can define prefix of target as
well since Make 3.82.

```Makefile
.RECIPEPREFIX +=

install:
  composer install
```

### Phony targets

Make is by default dedicated to generating executable files from their sources.
Most common usage is for example building C projects. All target names are by
default the names of the files in the project folder. The built-in `.PHONY` target
defines targets which should execute their recipes even if the file is not present.

When you're adding a `Makefile` in your project you should define all custom
targets as phony.

```Makefile
.RECIPEPREFIX +=

.PHONY: install
install:
  composer install

.PHONY: test
test:
  phpunit
```

In above example even if you have a file `install` in your project directory make
tool won't try to remake that file.

You can simplify this a bit more:

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

## See also

* [GNU Make](https://www.gnu.org/software/make/)
* [Clark Grubb's Makefile coding style](http://clarkgrubb.com/makefile-style-guide)
