# Make

Often times you'll want to use multiple cli commands when developing or managing
your application. For example:

To install your PHP application, you usually run:

```bash
composer install
```

To run PHP unit tests, you usually run:

```bash
phpunit
```

This is all quite simple to remember and run directly. But what about adding few
more options. For example, for production:

```bash
composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader --prefer-dist
```

There can be many more tasks in more complex applications. From managing assets
(CSS, JavaScript, images), to database migrations, and similar.

So best way is to have these tasks at your disposal in your application
documentation and further more use a simple shell script to run them. For example,
create a `run` shell script in the root of your project:

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

In this chapter another dedicated tool and relatively useful approach is
introduced, a so called `make` tool. By creating a `Makefile` in your project root
folder, you can run multiple application tasks with a simple `make foo` and have
better out-of-the-box approach of defining application tasks in form of Make
targets.

Let's create a `Makefile` in the root folder of your project:

```Makefile
install:
	composer install

test:
	phpunit
```

Important part here is that `Makefile` needs to have tabs in front of target
commands. The `install` is the target name which can be run from the command line
with `make install`, and the next line(s) prefixed with a tab character define
target steps.

To run the `install` target:

```bash
make install
```

### Makefile recipes

#### Character `@`

Each time you run a target, make also outputs the command. To avoid outputting
command, add `@` character in front of the target steps:

```Makefile
install:
	@composer install
	@yarn install
```

#### Usage info

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

#### Tabs vs spaces

Tabs people will love the `make` identation speciality. For spaces people, there
is a special `.RECIPEPREFIX` variable, that can define that as well since
Make 3.82.

```Makefile
.RECIPEPREFIX +=  # Set spaces

install:
    composer install
```

## See also

* [GNU Make](https://www.gnu.org/software/make/)
* [Clark Grubb's Makefile coding style](http://clarkgrubb.com/makefile-style-guide)
