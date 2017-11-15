# Arrays, loops, and break

Array can be imagined as a container with a fixed number of elements, where each
element is indexed from `0` incrementally:

| Array element | `H` | `e` | `l` | `l` | `o` |
| Array index   | 0   | 1   | 2   | 3   | 4   |

Let's check a code example:

```c
#include <stdio.h>

char *strings[5];

int main() {
    int i;

    strings[0] = "H";
    strings[1] = "e";
    strings[2] = "l";
    strings[3] = "l";
    strings[4] = "o";

    for (i = 0; i < 5; i++) {
        printf("%s\n", strings[i]);
    }
}
```
