---
title: "What is Input Kludge antipattern?"
read_time: "1 min"
updated: "march 30, 2015"
group: "oop"
permalink: "/faq/object-oriented-programming/anti-patterns/input-kludge/"
---

#Input Kludge
AntiPattern Problem

Software that fails straightforward behavioral tests may be an example of an Input Kludge, which occurs when ad hoc algorithms are employed for handling program input.

For example, if the program accepts free text input from the user, an ad hoc algorithm will mishandle many combinations of legal and illegal input strings. The anecdotal evidence for an Input Kludge goes like this: "End users can break new programs within moments of touching the keyboard."

#Refactored Solution

For nondemonstration software, use production-quality input algorithms. For example, lexical analysis and parsing software is readily available as freeware. Programs such as lex and yacc enable robust handling of text comprised of regular expressions and context-free language grammars. Employing these technologies for production-quality software is recommended to ensure proper handling of unexpected inputs.

#Variation

Many software defects arise due to unexpected combinations of user-accesible features. Employing a feature matrix is recommended for sophisticated applications with graphical user interfaces.

A feature matrix is state information in the program used to enable and disable features prior to user actions. When the user invokes a feature, the feature matrix indicates which other features must be disabled in order to avoid conflicts. For example, a feature matrix is often used to highlight and unhighlight menu commands prior to displaying the menu.

#Background

Programmers are trained to avoid input combinations that cause program and system crashes. In a hands-on training course on OpenDoc, we used a preliminary alpha release of the technology that was not yet sufficiently robust for production-quality development. In other words, it was easy to crash the entire operating system with seemingly correct sequences of input commands and mouse operations.

The students spent the first day experiencing numerous system crashes and waiting for system reboot. After attending the "crashing labs," we wondered whether the release was robust enough to enable any kind of sophisticated software development. By the end of the week, we had learned to work around the limitations and perform programming tasks and input operations that went well beyond our expectations formed the first day. We had internalized the input sequences that avoided system crashes.

