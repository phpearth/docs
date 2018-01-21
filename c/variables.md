---
stage: prewriting
---

# Variables, constants, and types

## Variables

Variable is used to store some value in your program.

```c
#include <stdio.h>

int main() {
    int foo = 12;
    int bar = 56;
    int sum;
    sum = foo + bar;
    printf("%d + %d = %d\n", foo, bar, sum);
    return 0;
}
```
