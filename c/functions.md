# Functions and arguments

Functions are essential part of C programs and it can contain hundreds and thousands
of functions. They let you divide your code in smaller pieces so the program is
more readable and maintainable.

```c
#include <stdio.h>

void sayHello(void) {
    printf("Hello\n");
}

int main(void) {
    sayHello();
}
```
