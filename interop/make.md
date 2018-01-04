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

target=${1:-help}

help() {
  echo "Script usage information..."
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
  help
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

### Why Makefile?

* Language independent - the only dependency you need is Make tool.
* Simpler and cleaner base syntax for defining targets compared to a shell script.

Today there are many different flavors of Make tool on different systems. In this
chapter the GNU Make tool version 4 and above will be used. Linux by default uses
the GNU Make, Windows needs to have it installed separately or if you're using
[WSL - Windows Subsystem for Linux](https://docs.microsoft.com/en-us/windows/wsl/about),
you can get a GNU Make via most Linux distributions. On macOS you can install and
update it with `brew install make`.

Let's create a very simple `Makefile` in the root folder of your project:

```Makefile
install:
	composer install

test:
	phpunit

foo:
	echo "bar"
```

By default, `Makefile` needs tabs in front of the target commands. The `install`
is the target name which can be executed from the command line with `make install`,
and the next line(s) prefixed with a tab character define target steps.

To run the `install` target:

```bash
make install
```

## Makefile examples

### Tabs vs. spaces

Tabs people will love the default `make` indentation prefix. For spaces people,
there is a special `.RECIPEPREFIX` variable, that can define prefix of target
recipe since Make 3.82.

```Makefile
# This sets the recipe prefix to one or more spaces
.RECIPEPREFIX +=

install:
  @composer install
```

### Character `@`

Each time you run a target, make also outputs the command. To avoid outputting
command, add `@` character in front of the target steps:

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
  @grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

foo: ## Quick command usage info
  @composer install
  @echo "do some other task"
```

Above displays targets usage with a comment of two hashtags `##` after their name.

### Phony targets

Make is by default dedicated to generating executable files from their sources.
Most common usage is for example building C projects. All target names are by
default the names of the files in the project folder. The built-in `.PHONY` target
defines targets which should execute their recipes even if the file with the same
name as target is present in the project.

When you're adding a `Makefile` in your project you should define all custom
targets as phony to avoid issues if file with same name is present in the project.

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

Instead of `.PHONY: *` you can also set phony target dynamically with
`.PHONY: $(MAKECMDGOALS)`. A special Makefile variable `$(MAKECMDGOALS)` is the
list of goals you specify when running `make target1 target2`.

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
  @test $(arg)
  @echo $(arg)
```

## Putting everything together

Here is an example with all above put into a single `Makefile`:

```Makefile
.RECIPEPREFIX +=
.DEFAULT_GOAL := help
.PHONY: *

help:
  @echo "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m"
  @grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

# Define your targets
install: ## Install application
  @composer install
```

## See also

* [GNU Make](https://www.gnu.org/software/make/)
* [Clark Grubb's Makefile coding style](http://clarkgrubb.com/makefile-style-guide)
