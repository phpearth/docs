---
title: "What is jumble antipattern?"
updated: "April 13, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/jumble-antipattern/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/jumble-antipattern/"
---

When horizontal and vertical design elements are intermixed, an unstable architecture results. Vertical design elements are dependent upon the individual application and specific software implementations. Horizontal design elements are those that are common across applications and specific implementations.

By default, the two are mixed together by developers and architects. But doing this limits the reusability and robustness of the architecture and the system software components. Vertical elements cause software dependencies that limit extensibility and reuse. Intermingling makes all the software designs less stable and reusable.


##Refactored Solution
The first step is to identify the horizontal design elements and delegate them to a separate architecture layer. Then use the horizontal elements to capture the common interoperability functionality in the architecture.

For example, the horizontal elements are abstractions of the specific subsystem implementations:

1. Add vertical elements as extensions for specialized functionality and for performance.
2. Incorporate metadata into the architecture.
3. Trade off the static elements of the design (horizontal and vertical) with the dynamic elements (metadata).

Proper balance of horizontal, vertical, and metadata elements in an architecture leads to well-structured, extensible, reusable software.

##Background

It takes some time to fully understand the meaning and implications of horizontal and vertical design elements. These topics are explored further in our companion book, CORBA Design Patterns In particular, the

Horizontal-Vertical-Metadata (HVM) pattern and related CORBA design patterns establish key principles for software architecture design. The Jumble AntiPattern describes the most common misuse of these principles.