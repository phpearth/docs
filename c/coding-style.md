---
stage: prewriting
---

# Coding style

C doesn't have standards or official guidelines when it comes to code writing
style. Having such freedom is many times useful and also important, however
collaborating on a project with different developers will soon require a set of
coding style guidelines. Important to understand here is that no matter which
coding style you pick, define it well and stick to it when adding new code.
Reading code with consistent coding style matters.

Here are top coding styles you should consider adopting instead of reinventing
your own.

* [LLVM coding standards](http://llvm.org/docs/CodingStandards.html)
* [Google C++ coding style](https://google.github.io/styleguide/cppguide.html)
* [Chromium coding style](http://www.chromium.org/developers/coding-style)
* [Mozilla coding style](https://developer.mozilla.org/en-US/docs/Mozilla/Developer_guide/Coding_Style)
* [WebKit coding style](https://webkit.org/code-style-guidelines/)

## Useful tools

### Clang-Format

Clang-Format is a very useful formatting tool to quickly format your C code to
a predefined coding style.

Main tool is `clang-format`. You initially create a YAML file called `.clang-format`
in your project root directory with definitions how formatting should be done.

Read documentation about Clang-Format on the official page. This tutorial only
serves as a guideline on which tools you should use.

* [Clang-Format documentation](https://clang.llvm.org/docs/ClangFormat.html)

### EditorConfig

One part is formating existing code. Another part is formating code as you code.
Many editors and IDEs will have predefined coding standards already available,
and for more there is Editorconfig, a project where you can set coding style per
project basis. The file `.editorconfig` with INI syntax includes definitions for
files and which coding standards should be used. Most of todays editors and IDEs
support EditorConfig via plugins or have support already built in.

* [EditorConfig.org](http://editorconfig.org/)
