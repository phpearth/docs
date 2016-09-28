---
title: "Cut-and-paste Programming Anti Pattern?"
updated: "April 13, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/what-is-cut-and-paste-programming-antipattern/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/what-is-cut-and-paste-programming-antipattern/"
---

**AntiPattern Name**: Cut-and-Paste Programming
**Also Known As**: Clipboard Coding, Software Cloning, Software Propagation
**Most Applicable Scale**: Application
**Refactored Solution Name**: Black Box Reuse
**Refactored Solution Type**: Software
**Root Causes**: Sloth
**Unbalanced Forces**: Management of Resources, Technology Transfer
**Anecdotal Evidence**: "Hey, I thought you fixed that bug already, so why is it doing this again?" "Man, you guys work fast. Over 400,000 lines of code in three weeks is outstanding progress!"

## Background

Cut-and-Paste Programming is a very common, but degenerate form of software reuse which creates maintenance nightmares. It comes from the notion that it's easier to modify existing software than program from scratch. This is usually true and represents good software instincts. However, the technique can be easily over used.

## General Form

This AntiPattern is identified by the presence of several similar segments of code interspersed throughout the software project. Usually, the project contains many programmers who are learning how to develop software by following the examples of more experienced developers.

However, they are learning by modifying code that has been proven to work in similar situations, and potentially customizing it to support new data types or slightly customized behavior. This creates code duplication, which may have positive short-term consequences such as boosting line count metrics, which may be used in performance evaluations.

Furthermore, it's easy to extend the code as the developer has full control over the code used in his or her application and can quickly meet short-term modifications to satisfy new requirements.

## Symptoms And Consequences

* The same software bug reoccurs throughout software despite many local fixes.
* Lines of code increase without adding to overall productivity.
* Code reviews and inspections are needlessly extended.
* It becomes difficult to locate and fix all instances of a particular mistake.
* Code is considered self-documenting.
* Code can be reused with a minimum of effort.
* This AntiPattern leads to excessive software maintenance costs.
* Software defects are replicated through the system.
* Reusable assets are not converted into an easily reusable and documented form.
* Developers create multiple unique fixes for bugs with no method of resolving the variations into a standard fix.
* Cut-and-Paste Programming form of reuse deceptively inflates the number of lines of code developed without the expected reduction in maintenance costs associated with other forms of reuse.

## Typical Causes

* It takes a great deal of effort to create reusable code, and organization emphasizes short-term payoff more than long-term investment.
* The context or intent behind a software module is not preserved along with the code.
* The organization does not advocate or reward reusable components, and development speed overshadows all other evaluation factors.
* There is a lack of abstraction among developers, often accompanied by a poor understanding of inheritance, composition, and other development strategies.
* The organization insists that code must be a perfect match to the new task to allow it to be reused. Code is duplicated to address perceived inadequacies in meeting what is thought to be a unique problem set.
* Reusable components, once created, are not sufficiently documented or made readily available to developers.
* A "not-invented-here" syndrome is in operation in the development environment.
* There is a lack of forethought or forward thinking among the development teams.
* Cut-and-Paste AntiPattern is likely to occur when people are unfamiliar with new technology or tools; as a result, they take a working example and modify it, adapting it to their specific needs.

## Known Exceptions

The Cut-and-Paste Programming AntiPattern is acceptable when the sole aim is to get the code out of the door as quickly as possible. However, the price paid is one of increased maintenance.

## Refactored Solution

Cloning frequently occurs in environments where white-box reuse is the predominant form of system extension. In white-box reuse, developers extend systems primarily though inheritance. Certainly, inheritance is an essential part of object-oriented development, but it has several drawbacks in large systems.

First, subclassing and extending an object requires some knowledge of how the object is implemented, such as the intended constraints and patterns of use indicated by the inherited base classes. Most object-oriented languages impose very few restrictions, types of extensions can be implemented in a derived class and lead to nonoptimal use of subclassing.

In addition, typically, white-box reuse is possible only at application compile time (for compiled languages), as all subclasses must be fully defined before an application is generated.

On the other hand, black-box reuse has a different set of advantages and limitations and is frequently a better option for object extension in moderate and large systems. With black-box reuse, an object is used as-is, through its specified interface. The client is not allowed to alter how the object interface is implemented.

The key benefit of black-box reuse is that, with the support of tools, such as interface definition languages, the implementation of an object can be made independent of the object's interface. This enables a developer to take advantage of late binding by mapping an interface to a specific implementation at run time. Clients can be written to a static object interface yet benefit over time by more advanced services that support the identical object interface.

Of course, the drawback is that the supported services are limited to those supported by the same interface. Changes to the interface typically must be made at compile time, similar to interface or implementation changes in white-box reuse.

The distinction between white-box and black-box reuse mirrors the difference between object-oriented programming (OOP) and component-oriented programming (COP), where the white-box subclassing is the traditional signature of OOP and the dynamic late binding of interface to implementation is a staple in COP.

Restructuring software to reduce or eliminate cloning requires modifying code to emphasize black-box reuse of duplicated software segments. In the case where Cut-and-Paste Programming has been used extensively throughout the lifetime of a software project, the most effective method of recovering your investment is to refactor the code base into reusable libraries or components that focus on black-box reuse of functionality.

If performed as a single project, this refactoring process is typically difficult, long, and costly, and requires a strong system architect to oversee and execute the process and to mediate discussions on the merits and limitations of the various extended versions of software modules.

Effective refactoring to eliminate multiple versions involves three stages: code mining, refactoring, and configuration management. Code mining is the systematic identification of multiple versions of the same software segment. The refactoring process involves developing a standard version of the code segment and reinserting it into the code base.

Configuration management is a set of policies drawn up to aid in the prevention of future occurrences of Cut-and-Paste Programming. For the most part, this requires monitoring and detection policies (code inspections, reviews, validation), in addition to educational efforts. Management buy-in is essential to ensure funding and support throughout all three stages.

## Example

There is one piece of code that we suspect has been cloned repeatedly throughout several organizations and probably is still cloned today. This piece of code has been observed several hundred times across dozens of organizations. It is a code file that implements a linked-list class without the use of templates or macros.

Instead, the data structure stored by the linked list is defined in a header file, so each linked list is customized to operate only on the specified data structure. Unfortunately, the original author of the code (rumor has it he was originally a LISP programmer) introduced a flaw in the linked-list code: It failed to free the memory of an item when it was deleted; instead, it just rearranged the pointers.

On occasion, this code has been modified to fix this defect; however, more often than not, it still exists. It's clearly the same code set; the variable names, the instructions, and even the formatting is exactly the same in each and every case. Even the file is typically named <prefix>link.c, where the prefix is one or two letters that cryptically refer to the data structure managed by the list.

## Related Solutions

Spaghetti Code often contains several instances of the Cut-and-Paste Programming AntiPattern. Because Spaghetti Code is not structured for easy component reuse, in many cases, Cut-and-Paste Programming is the only means available for reusing existing segments of code.

Of course, this leads to unnecessary code bloat and a maintenance nightmare, but empirical evidence suggests that Spaghetti Code without Cut-and-Paste Programming is typically an even worse mess than instances that make use of Cut-and-Paste Programming.

Cloning can be minimized in new development through the implementation of a software reuse process or organization Some degree of cloning is inevitable in large software development; however, when it occurs, there must be a formalized process for merging clones into a common baseline.
