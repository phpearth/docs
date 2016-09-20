---
title: "What is spaghetti code antipattern?"
updated: "March 28, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/what-is-spaghetti-code/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/what-is-spaghetti-code/"
---

**AntiPattern Name**: Spaghetti Code
**Most Applicable Scale**: Application
**Refactored Solution Name**: Software Refactoring, Code Cleanup
**Refactored Solution Type**: Software
**Root Causes**: Ignorance, Sloth
**Unbalanced Forces**: Management of Complexity, Change
**Anecdotal Evidence**:
"Ugh! What a mess!"

"You do realize that the language supports more than one function, right?"

"It's easier to rewrite this code than to attempt to modify it."

"Software engineers don't write spaghetti code."

"The quality of your software structure is an investment for future modification and extension."

## Background

The Spaghetti Code AntiPattern is the classic and most famous AntiPattern; it has existed in one form or another since the invention of programming languages. Nonobject-oriented languages appear to be more susceptible to this AntiPattern, but it is fairly common among developers who have yet to fully master the advanced concepts underlying object orientation.

![Spaghetti code antipattern](/images/object-oriented-programming/anti-patterns/spagetti.jpg "Spaghetti code antipattern")

## General Form

Spaghetti Code appears as a program or system that contains very little software structure. Coding and progressive extensions compromise the software structure to such an extent that the structure lacks clarity, even to the original developer, if he or she is away from the software for any length of time.

If developed using an object-oriented language, the software may include a small number of objects that contain methods with very large implementations that invoke a single, multistage process flow.

Furthermore, the object methods are invoked in a very predictable manner, and there is a negligible degree of dynamic interaction between the objects in the system. The system is very difficult to maintain and extend, and there is no opportunity to reuse the objects and modules in other similar systems.

## Symptoms And Consequences

* After code mining, only parts of object and methods seem suitable for reuse. Mining Spaghetti Code can often be a poor return on investment; this should be taken into account before a decision to mine is made.
* Methods are very process-oriented; frequently, in fact, objects are named as processes.
* The flow of execution is dictated by object implementation, not by the clients of the objects.
* Minimal relationships exist between objects.
* Many object methods have no parameters, and utilize class or global variables for processing.
* The pattern of use of objects is very predictable.
* Code is difficult to reuse, and when it is, it is often through cloning. In many cases, however, code is never considered for reuse.
* Object-oriented talent from industry is difficult to retain.
* Benefits of object orientation are lost; inheritance is not used to extend the system; polymorphism is not used.
* Follow-on maintenance efforts contribute to the problem.
* Software quickly reaches a point of diminishing returns; the effort involved in maintaining an existing code base is greater than the cost of developing a new solution from the ground up.

## Typical Causes

* Inexperience with object-oriented design technologies.
* No mentoring in place; ineffective code reviews.
* No design prior to implementation.
* Frequently the result of developers working in isolation.

## Known Exceptions

The Spaghetti Code AntiPattern is reasonably acceptable when the interfaces are coherent and only the implementation is spaghetti. This is somewhat like wrapping a nonobject-oriented piece of code. If the lifetime of the component is short and cleanly isolated from the rest of the system, then some amount of poor code may be tolerable.

The reality of the software industry is that software concerns usually are subservient to business concerns, and, on occasion, business success is contingent on delivering a software product as rapidly as possible. If the domain is not familiar to the software architects and developers, it may be better to develop products to gain an understanding of the domain with the intention of designing products with an improved architecture at some later date

## Refactored Solution

Software refactoring (or code cleanup) is an essential part of software development Seventy percent or more of software cost is due to extensions, so it is critical to maintain a coherent software structure that supports extension.

When the structure becomes compromised through supporting unanticipated requirements, the ability of the code to support extensions becomes limited, and eventually, nonexistent. Unfortunately, the term "code cleanup" does not appeal to pointy-haired managers, so it may be best to discuss this issue using an alternative term such as "software investment."

After all, in a very real sense, code cleanup is the maintenance of software investment. Well-structured code will have a longer life cycle and be better able to support changes in the business and underlying technology.

Ideally, code cleanup should be a natural part of the development process. As each feature (or group of features) is added to the code, code cleanup should follow what restores or improves the code structure. This can occur on an hourly or daily basis, depending on the frequency of the addition of new features.

Code cleanup also supports performance enhancement. Typically, performance optimization follows the 90/10 rule, where only 10 percent of the code needs modification in order to achieve 90 percent of the optimal performance. For single-subsystem or application programming, performance optimization often involves compromises to code structure.

The first goal is to achieve a satisfactory structure; the second is to determine by measurement where the performance-critical code exists; the third is to carefully introduce necessary structure compromises to enhance performance. It is sometimes necessary to reverse the performance enhancement changes in software to provide for essential system extensions. Such areas merit additional documentation, in order to preserve the software structure in future releases.

## Kill Spaghetti Code AntiPattern through prevention

The best way to resolve the Spaghetti Code AntiPattern is through prevention; that is, to think, then develop a plan of action before writing. If, however, the code base has already degenerated to the point that it is unmaintainable, and if reengineering the software is not an option, there are still steps that can be taken to avoid compounding the problem.

First, in the maintenance process, whenever new features are added to the Spaghetti Code code base, do not modify the Spaghetti Code simply by adding code in a similar style to minimally meet the new requirement. Instead, always spend time refactoring the existing software into a more maintainable form. Refactoring the software includes performing the following operations on the existing code:

1. Gain abstract access to member variables of a class using accessor functions. Write new and refactored code to use the accessor functions.
2. Convert a code segment into a function that can be reused in future maintenance and refactoring efforts. It is vital to resist implementing the Cut-and-Paste AntiPattern. Instead, use the Cut-and-Paste refactored solution to repair prior implementations of the Cut-and-Paste AntiPattern.
3. Reorder function arguments to achieve greater consistency throughout the code base. Even consistently bad Spaghetti Code is easier to maintain than inconsistent Spaghetti Code.
4. Remove portions of the code that may become, or are already, inaccessible. Repeated failure to identify and remove obsolete portions of code is one of the major contributors to the Lava Flow AntiPattern.
5. Rename classes, functions, or data types to conform to an enterprise or industry standard and/or maintainable entity. Most software tools provide support for global renaming.
In short, commit to actively refactoring and improving Spaghetti Code to as great an extent as resources allow whenever the code base needs to be modified. It's extremely useful to apply unit and system testing tools and applications to ascertain that refactoring does not immediately introduce any new defects into the code base.

Empirical evidence suggests that the benefits of refactoring the software greatly outweigh the risk that the extra modifications may generate new defects.

## Other prevention methods

If prevention of Spaghetti Code is an option, or if you have the luxury of fully engineering a Spaghetti Code application, the following preventative measures may be taken:

1. Insist on a proper object-oriented analysis process to create the domain model, regardless of how well the domain is understood. It is crucial that any moderate-or large-size project develop a domain model as the basis of design and development.
If the domain is fully understood to the point that a domain model is not needed, counter with "If that's true, then the time to develop one would be negligible." If it actually is, then politely admit you were mistaken. Otherwise, the time that it takes justifies how badly it was needed.

2. After developing a domain model that explains the system requirements and the range of variability that must be addressed, develop a separate design model.
Though it is valid to use the domain model as a starting point for design, the domain model must be maintained as such in order to retain useful information that would otherwise be lost if permitted to evolve directly into a design model. The purpose of the design model is to extract the commonality between domain objects and abstract in order to clarify the necessary objects and relationships in the system.

3. Properly performed, it establishes the bounds for software implementation. Implementation should be performed only in order to satisfy system requirements, either explicitly indicated by the domain model or anticipated by the system architect or senior developers.

4. In the development of the design model, it is important to ensure that objects are decomposed to a level where they are fully understood by developers. It is the developers, not the designers, who must believe the software modules are easy to implement.
Once a first pass has been made at both the domain and design model, begin implementation based upon the plan established by the design. The design does not have to be complete; the goal is that the implementation of software components should always be according to some predefined plan.
Once development begins, proceed to incrementally examine other parts of the domain model and design other parts of the system. Over time, the domain model and the design model will be refined to accommodate discoveries in the requirements gathering, design decisions, and to cope with implementation issues.

Again, Spaghetti Code is far less likely to occur if there is an overall software process in which the requirements and design are specified in advance of the implementation, instead of occurring concurrently.

## Example

This is a frequent problem demonstrated by people new to object-oriented development, who map system requirements directly to functions, using objects as a place to group related functions. Each function contains an entire process flow that completely implements a particular task.

For example, the code segment that follows contains functions such as initMenus(), getConnection(), and executeQuery(), which completely execute the specified operation. Each object method contains a single process flow that performs all of the steps in sequence needed to perform the task.

The object retains little or no state information between successive invocations; rather, the class variables are temporary storage locations to handle intermediate results of a single process flow.

## Related Solutions

* Analysis Paralysis. This AntiPattern is the result of taking the solution to its logical extreme. Rather than developing code ad hoc without a design to guide the overall structure of the code, Analysis Paralysis produces a detailed design without ever reaching a point at which implementation can commence.
* Lava Flow. This AntiPattern frequently contains several examples of Spaghetti Code that discourage the refactoring of the existing code base. With Lava Flow, the code base had a logical purpose at some point in its life cycle, but portions became obsolescent, yet remained as part of the code base.