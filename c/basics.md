# C programming basics

## Hello, World

The following program is a basic `Hello, World` program where text is printed to
a screen.

```c
#include <stdio.h>

void main() {
    printf("Hello, World"\n);
}
```

Going line by line:

* `#include <stdio.h` - this includes a standard IO header file from your system
  in your program, so the `printf` function works. In C programs there are many
  library header files used from the system, so you don't need to reinvent
  everything and you have best practices at your disposal.
* `void main() {` - each C program starts with `main()` function. The `void`
  keyword indicates that main doesn't return anything in this particular case.
* `printf("Hello, World"\n);` - this prints text `Hello, World` on your screen
  when program is compiled and run.

## Compiling

To be able to run your `Hello, World` program, you need to first compile it.

To compile a C program, you need to have a compiler. In our case we will use a `gcc`
compiler.

```bash
gcc hello.c -o hello.o
```

* `gcc` is a command for running a compiler
* `hello.c` is a C source code file with above code
* `-o hello.o` is optional and defines a binary file that is created

You can then run this C program by executing

```bash
./hello.o
```

Which prints in command line:

```txt
Hello, World
```

## Arguments and return values

You can pass arguments to `main()`:

```c
#include <stdio.h>

int main(int argc, char **argv) {
    printf("Hello, %s\n", argv[1]);
    return 0;
}
```

* `int main(...)` - means that the `main()` function will return value of integer
  type.
* `int argc` - first argument defines the number of arguments that will be passed
  to the compiled program.
* `char **argv` - the second argument defines an array of character strings.

Let's compile and run the program:

```bash
gcc hello.c -o hello.o
./hello.o "PHP"
```

The output of above program will be:

```text
Hello, PHP
```

## Code comments

In C there are two types of comments:

* Single line comments

```c
#include <stdio.h>

// This is a single line comment
void main() {
    printf("Hello, World\n");
}
```

* Multi line comments

They are wrapped between `/*` and `*/`:

```c
#include <stdio.h>

/*
 * This is a multi line comment.
 */
void main() {
    printf("Hello, World\n");
}
```
