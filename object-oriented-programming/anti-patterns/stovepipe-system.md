---
title: "What is Stovepipe System antipattern?"
updated: "March 28, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/what-is-stovepipe-system-antipattern/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/what-is-stovepipe-system-antipattern/"
---

* **AntiPattern Name**: Stovepipe System
* **Also Known As**: Legacy System, Uncle Sam Special, Ad Hoc Integration
* **Most Frequent Scale**: System
* **Refactored Solution Name**: Architecture Framework
* **Refactored Solution Type**: Software
* **Root Causes**: Haste, Avarice, Ignorance, Sloth
* **Unbalanced Forces**: Management of Complexity, Change
* **Anecdotal Evidence**: "The software project is way over-budget; it has slipped its schedule repeatedly; my users still don't get the expected features; and I can't modify the system. Every component is a stovepipe."

## Background

Stovepipe System is a widely used derogatory name for legacy software with undesirable qualities. In this AntiPattern, we attribute the cause of these negative qualities to the internal structure of the system.

An improved system structure enables the evolution of the legacy system to meet new business needs and incorporate new technologies seamlessly. By applying the recommended solution, the system can gain new capabilities for adaptability that are uncharacteristic of Stovepipe Systems.

## General Form

The Stovepipe System AntiPattern is the single-system analogy of Stovepipe Enterprise, which involves a lack of coordination and planning across a set of systems. The Stovepipe System AntiPattern addresses how the subsystems are coordinated within a single system.

The key problem in this AntiPattern is the lack of common subsystem abstractions, whereas in a Stovepipe Enterprise, the key problem is the absence of common multisystem conventions.

Subsystems are integrated in an ad hoc manner using multiple integration strategies and mechanisms. All subsystems are integrated point to point, thus the integration approach for each pair of subsystems is not easily leveraged toward that of other subsystems.

Furthermore, the system implementation is brittle because there are many implicit dependencies upon system configuration, installation details, and system state. The system is difficult to extend, and extensions add additional point-to-point integration links.

As each new capability and alteration is integrated, system complexity increases, throughout the life cycle of the stovepipe system; subsequently, system extension and maintenance become increasingly intractable.

![Stovepipe system antipattern](/images/anti-patterns/Stovepipe-System-1-2x.png "Stovepipe system antipattern")

## Symptoms And Consequences

* Large semantic gap between architecture documentation and implemented software; documentation does not correspond to system implementation.
* Architects are unfamiliar with key aspects of integration solution.
* Project is over-budget and has slipped its schedule for no obvious reason.
* Requirements changes are costly to implement, and system maintenance generates surprising costs.
* System may comply with most paper requirements but does not meet user expectations.
* Users must invent workarounds to cope with limitations of the system.
* Complex system and client installation procedures are followed that defy attempts to automate.
* Interoperability with other systems is not possible, and there is an inability to support integrated system management and intersystem security capabilities.
* Changes to the systems become increasingly difficult.
System modifications become increasingly likely to introduce new serious bugs.

## Typical Causes

* Multiple infrastructure mechanisms used to integrate subsystems; absence of a common mechanism makes the architecture difficult to describe and modify.
* Lack of abstraction; all interfaces are unique to each subsystem.
* Insufficient use of metadata; metadata is not available to support system extensions and reconfigurations without software changes.
* Tight coupling between implemented classes requires excessive client code that is service-specific.
* Lack of architectural vision.


## Known Exceptions

Research and development software production often institute the Stovepipe System AntiPattern to achieve a rapid solution.

This is perfectly acceptable for prototypes and mockups; and sometimes, insufficient knowledge about a domain may require a Stovepipe System to be initially developed to gain domain information either for building a more robust system or for evolving the initial system into an improved version Or, the choice to use a vendor's product and not reinvent the wheel can lead to both the Stovepipe System AntiPattern and the Vendor Lock-In AntiPattern.

## Refactored Solution

The refactored solution to the Stovepipe System AntiPattern is a component architecture that provides for flexible substitution of software modules. Subsystems are modeled abstractly so that there are many fewer exposed interfaces than there are subsystem implementations.

The substitution can be both static (compile-time component replacement) and dynamic (run-time dynamic binding). The key to defining the component interfaces is to discover the appropriate abstractions. The subsystem abstractions model the interoperability needs of the system without exposing unnecessary differences between subsystems and implementation-specific details.

![Stovepipe system antipattern](/images/anti-patterns/Stovepipe-System-2-2x.png "Stovepipe system antipattern")

In order to define a component architecture, you should choose a base level of functionality that the majority of applications will support. In general, that level should be low and focus upon a single aspect of interoperability, such as data interchange or conversion.

Then define a set of system interfaces that support this base level of functionality; we recommend using ISO IDL. Most services have an additional interface to express finer-grained functional needs so the component interface should be small.

Having a base level of component services available to all clients in the domain encourages the development of thin clients that work well with existing and future services, without modification.

By thin clients, we mean clients that do not require detailed knowledge of the services and architecture of the system; a framework may support and simplify their access to complex services. Having several plug-compatible implementations available increases the robustness of clients, as they potentially have many options in fulfilling their service request.

Applications will have clients that are written to more specialized (vertical) interfaces. Vertical clients should remain unaffected by the addition of the new component interfaces.

Clients that require only the base level of functionality can be written to the horizontal interfaces, which should be more stable and easily supported by new or other existing applications. The horizontal interface should hide, via abstraction, all the lower-level details of a component and provide only the base-level functionality. The client should be written to handle whatever data types are indicated by the interface in order to support any future interchange of the horizontal component implementations.

For example, if an "any" is returned, the client should be capable of handling all types that the "any" may contain. Admittedly, for CORBA implementations that don't support the transfer of new user-defined types at run time, type management may have to occur at the horizontal level; specifically, it may be necessary to convert vertical types into horizontal types that are known at compile time.

Incorporation of metadata into the component architecture is key to service discovery and service discrimination. A fundamental level of metadata support is through naming and trading services Naming services enable the discovery of known objects; a trading service lists the available services and their properties for discovery by clients.

Interoperable naming services are extended to incorporate some trading capabilities. More extensive use of metadata is usually required for enhanced decoupling of clients from services. For example, schema metadata for database services helps clients to adapt alternative schema and schema changes

## Example

figure below is a representation of a typical stovepipe system. There are three client subsystems and six service subsystems. Each subsystem has a unique software interface, and each subsystem instance is modeled as a class in the class diagram.

When the system is constructed, unique interface software for each client corresponds to each of the integrated subsystems. If additional subsystems are added or substituted, the clients must be modified with additional code that integrates new unique interfaces.

![Stovepipe system antipattern](/images/anti-patterns/Stovepipe-System2-1-2x.png "Stovepipe system antipattern")

The refactored solution to this example considers the common abstractions between the subsystems. Since there are two services of each type, it is possible for each model to have one or more service interface in common. Then each particular device or service can be wrapped to support the common interface abstraction.

If additional devices are added to the system from these abstract subsystem categories, they can be integrated transparently to the existing system software. The addition of a trader service adds the ability to discover and discriminate between the abstracted services.

![Stovepipe system antipattern](/images/anti-patterns/Stovepipe-System2-2-2x.png "Stovepipe system antipattern")

## Related Solutions

The Stovepipe Enterprise AntiPattern describes how stovepipe practices are promulgated on an enterprise scale. Note that Stovepipe Enterprise addresses a multisystem problem, which involves a larger scale of architecture than a single system.

## Applicability To Other Viewpoints And Scales

The management consequences of Stovepipe Systems are: increased risk, bigger budget, and longer time to market. And because complexity increases throughout the life cycle of the system, the management problems magnify as development progresses.

Eventually, the risks of system modification outweigh the potential benefits, and the Stovepipe System ceases to adapt to new business needs; the organization's business processes are frozen by the Stovepipe System. Since the architecture information is buried in the implementation, employee turnover in the software maintenance staff can lead to a total loss of capability to modify or maintain the system.

For developers, Stovepipe Systems mean they must spend more time on system discovery and testing. In early development, developers have a great deal of freedom to choose implementation strategies with minimal architectural guidance, but as the complexity of the stovepipe interfaces supercedes the documentation, the system becomes increasingly complex and brittle.

Development in a stovepipe environment resembles walking through a mine field. Every decision involves guesswork, uncertainty, and experiments. Developer decisions have high-risk consequences for the business, and often lead to repeated crises.
