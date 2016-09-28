---
title: "Software Development AntiPatterns"
updated: "March 27, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/software-development-antipatterns/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/software-development-antipatterns/"
---

#Software Development AntiPatterns

Good software structure is essential for system extension and maintenance. Software development is a chaotic activity, therefore the implemented structure of systems tends to stray from the planned structure as determined by architecture, analysis, and design.

Software refactoring is an effective approach for improving software structure.
The resulting structure does not have to resemble the original planned structure.

![Software development antipatterns](/images/object-oriented-programming/anti-patterns/mang.jpg "Software development antipatterns")

The structure changes because programmers learn constraints and approaches that alter the context of the coded solutions. When used properly, refactoring is a natural activity in the programming process.

For example, the solution for the Spaghetti Code AntiPattern defines a software development process that incorporates refactoring. Refactoring is strongly recommended prior to performance optimization. Optimizations often involve compromises to program structure. Ideally, optimizations affect only small portions of a program. Prior refactoring helps partition optimized code from the majority of the software.

Development AntiPatterns utilize various formal and informal refactoring approaches. The following summaries provide an overview of the Development AntiPatterns found in this chapter and focus on the development AntiPattern problem. Included are descriptions of both development and mini-AntiPatterns. The refactored solutions appear in the appropriate AntiPattern templates that follow the summaries.

 * [The Blob](/faq/object-oriented-programming/anti-patterns/blob/)
     Procedural-style design leads to one object with a lion’s share of the responsibilities, while most other objects only hold data or execute simple processes. The solution includes refactoring the design to distribute responsibilities more uniformly and isolating the effect of changes.

* [Continuous Obsolescence](/faq/object-oriented-programming/anti-patterns/continous-obsolescence/)
   Technology is changing so rapidly that developers often have trouble keeping up with current versions of software and finding combinations of product releases that work together. Given that every commercial product line evolves through new releases, the situation is becoming more difficult for developers to cope with. Finding compatible releases of products that successfully interoperate is even harder.

* [Lava Flow](/faq/object-oriented-programming/anti-patterns/lava-flow/)
Dead code and forgotten design information is frozen in an ever-changing design. This is analogous to a Lava Flow with hardening globules of rocky material. The refactored solution includes a configuration management process that eliminates dead code and evolves or refactors design toward increasing quality.

* [Ambiguous Viewpoint](/faq/object-oriented-programming/anti-patterns/ambigous-viewport/)
Object-oriented analysis and design (OOA&D) models are often presented without clarifying the viewpoint represented by the model. By default, OOA&D models denote an implementation viewpoint that is potentially the least useful. Mixed viewpoints don’t allow the fundamental separation of interfaces from implementation details, which is one of the primary benefits of the object-oriented paradigm.

* [Functional Decomposition](/faq/object-oriented-programming/anti-patterns/what-is-functional-decomposition/)
This AntiPattern is the output of experienced, nonobject-oriented developers who design and implement an application in an object-oriented language. The resulting code resembles a structural language (Pascal, FORTRAN) in class structure. It can be incredibly complex as smart procedural developers devise very “clever” ways to replicate their time-tested methods in an object-oriented architecture.

* [Poltergeists](/faq/object-oriented-programming/anti-patterns/what-is-poltergeists/)
Poltergeists are classes with very limited roles and effective life cycles. They often start processes for other objects. The refactored solution includes a reallocation of responsibilities to longer-lived objects that eliminate the Poltergeists.

* [Boat Anchor](/faq/object-oriented-programming/anti-patterns/what-is-boat-anchor/)
A Boat Anchor is a piece of software or hardware that serves no useful purpose on the current project. Often, the Boat Anchor is a costly acquisition, which makes the purchase even more ironic.

* [Golden Hammer](/faq/object-oriented-programming/anti-patterns/what-is-golden-hammer/)
A Golden Hammer is a familiar technology or concept applied obsessively to many software problems. The solution involves expanding the knowledge of developers through education, training, and book study groups to expose developers to alternative technologies and approaches.

* [Dead End](/faq/object-oriented-programming/anti-patterns/what-is-dead-end/)
A Dead End is reached by modifying a reusable component if the modified component is no longer maintained and supported by the supplier. When these modifications are made, the support burden transfers to the application system developers and maintainers. Improvements in the reusable component are not easily integrated, and support problems can be blamed upon the modification.

* [Spaghetti Code](/faq/object-oriented-programming/anti-patterns/what-is-spaghetti-code/)
Ad hoc software structure makes it difficult to extend and optimize code. Frequent code refactoring can improve software structure, support software maintenance, and enable iterative development.]

* [Input Kludge](/faq/object-oriented-programming/anti-patterns/input-kludge/)
Software that fails straightforward behavioral tests may be an example of an input kludge, which occurs when ad hoc algorithms are employed for handling program input.

* [Walking through a Minefield](/faq/object-oriented-programming/anti-patterns/walking-through-a-minefield-antipattern/)
Using today’s software technology is analogous to walking through a high-tech mine field. Numerous bugs are found in released software products; in fact, experts estimate that original source code contains two to five bugs per line of code.

* [Cut-and-Paste Programming](/faq/object-oriented-programming/anti-patterns/what-is-cut-and-paste-programming-antipattern/)
Code reused by copying source statements leads to significant maintenance problems. Alternative forms of reuse, including black-box reuse, reduce maintenance issues by having common source code, testing, and documentation.

* [Mushroom Management](/faq/object-oriented-programming/anti-patterns/what-is-mushroom-management/)
In some architecture and management circles, there is an explicit policy to keep system developers isolated from the system’s end users. Requirements are passed second-hand through intermediaries, including architects, managers, or requirements analysts.