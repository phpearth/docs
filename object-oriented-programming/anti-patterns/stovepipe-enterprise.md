---
title: "What is Stovepipe Enterprise antipattern?"
updated: "April 13, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/what-is-stovepipe-enterprise-antipattern/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/what-is-stovepipe-enterprise-antipattern/"
---

* **AntiPattern Name**: Stovepipe Enterprise
* **Also Known As**: Islands of Automation
* **Most Frequent Scale**: Enterprise
* **Refactored Solution Name**: Enterprise Architecture Planning
* **Refactored Solution Type**: Process
* **Root Causes**: Haste, Apathy, Narrow-Mindedness
* **Unbalanced Forces**: Management of Change, Resources, Technology Transfer
* **Anecdotal Evidence**: "Can I have my own island (of automation)?"

## Background

Stovepipe is a popular term used to describe software systems with ad hoc architectures. It is a metaphor to the exhaust pipes of wood-burning stoves, so-called pot-bellied stoves.

Since wood burning produces corrosive substances that erode metal, a stovepipe must be constantly maintained and repaired in order to avoid leakage. Often, the pipes are repaired with any materials at hand, thus wood-burning stovepipes quickly become a hodgepodge of ad hoc repairs—hence, the reference is used to describe the ad hoc structure of many software systems.

## General Form

Multiple systems within an enterprise are designed independently at every level. Lack of commonality inhibits interoperability between systems, prevents reuse, and drives up cost; in addition, reinvented system architecture and services lack quality structure supporting adaptability.

At the lowest level are the standards and guidelines. These work like architectural building codes and zoning laws across enterprise systems. The next level up in the hierarchy is the operating environment , which comprises infrastructure and object services.

The top two layers include the value-added functional services and the mission-specific services. By selecting and defining all of these technologies independently, Stovepipe Enterprises "create islands of automation," isolated from the rest of the enterprise.

![Stovepipe Enterprise antipattern](/images/anti-patterns/Stovepipe-Enterprise2-1-2x.png "Stovepipe Enterprise antipattern")

## Symptoms And Consequences

* Incompatible terminology, approaches, and technology between enterprise systems.
* Brittle, monolithic system architectures and undocumented architectures.
* Inability to extend systems to support business needs.
* Incorrect use of a technology standard.
* Lack of software reuse between enterprise systems.
* Lack of interoperability between enterprise systems.
* Inability of systems to interoperate even when using the same standards.
* Excessive maintenance costs due to changing business requirements; the need to extend the system to incorporate new products and technologies.
* Employee turnover, which causes project discontinuity and maintenance problems.

##Typical Causes

* Lack of an enterprise technology strategy, specifically:
    * Lack of a standard reference model
     * Lack of system profiles
* Lack of incentive for cooperation across system developments
* Lack of communication between system development projects.
* Lack of knowledge of the technology standard being used.
* Absence of horizontal interfaces in system integration solutions.

##Known Exceptions

The Stovepipe Enterprise AntiPattern is unacceptable for new systems at an enterprise level in this day and age, particularly when most companies are facing the need to extend their business systems. However, when companies grow by takeover or merger, the Stovepipe AntiPattern is likely to occur; in which case, wrapping some systems can be an intermediate solution.

Another exception is when a common service layer is implemented across the enterprise systems. This is usually a manifestation of the Vendor Lock-In AntiPattern. These systems have a common horizontal component; for example, in banking, this is often true of databases such as DB2 and Oracle.

## Refactored Solution

Coordination of technologies at several levels is essential to avoid a Stovepipe Enterprise. Initially, the selection of standards can be coordinated through the definition of a standards reference model.

The standards reference model defines the common standards and a migration direction for enterprise systems. The establishment of a common operating environment coordinates the selection of products and controls the configuration of product versions. Defining system profiles that coordinate the utilization of products and standards is essential to assure standards benefits, reuse, and interoperability. At least one system profile should define usage conventions across systems.

![Stovepipe Enterprise antipattern](/images/anti-patterns/Stovepipe-Enterprise3-1-2x.png "Stovepipe Enterprise antipattern")

Through much experience, large enterprises have worked out some useful conventions for the definition of object-oriented architectures that can apply to many organizations. A key challenge of large-scale architecture is to define detailed interoperability conventions across systems while addressing technology strategy and requirements. For very large enterprises, experience has shown that four requirements models and four specification models are necessary to properly scope and resolve interoperability challenges.

![Stovepipe Enterprise antipattern](/images/anti-patterns/Stovepipe-Enterprise-3-2x.png "Stovepipe Enterprise antipattern")

The requirements models include:

1. Open Systems Reference Model.
2. Technology Profile.
3. Operating Environment.
4. System Requirements Profile.

The specification models include:

1. Enterprise Architectures.
2. Computational Facilities Architecture.
3. Interoperability Specifications.
4. Development Profile.

The following sections describe these models, each of which is part of an overall enterprise-architecture plan. The plan provides effective coordination between projects and reduces the need for point-to-point interoperability solutions.

##Open Systems Reference Model

An open systems reference model contains a high-level architecture diagram and a list of target standards for system development projects. The purpose of this model is to identify all of the candidate standards for projects, to coordinate open-systems strategies.

An off-the-shelf reference model of this type is the IEEE POSIX 1003.0 standard. This section of POSIX lists a wide range of open systems standards with respect to applicability, maturity, commercial support, and other factors. This POSIX standard is the starting point for many enterprise-specific reference models.

##Technology Profile

When open-systems reference models were invented less than 10 years ago, they were thought to be the complete answer to systems interoperability. Unfortunately, developers were uncertain how these models affected their projects. A key problem is that reference models define future architecture goals with an unspecified time frame for implementation. Also, approximately a third of the items change status every year, due to the activities of standards bodies.

Technology profiles were invented to define the short-term standards plan for systems developers. A technology profile is a concise list of standards drawn from a reference model, which is considered a set of flexible guidelines; but technology profiles often mandate standards for current and new systems development projects.

The technology profile clarifies what the developer has to do about the reference model standards; for example, the US-DOD Joint Technical Architecture is a technical profile that identifies standards for current implementation.

##Operating Environment

Most large enterprises have heterogeneous hardware and software architectures, but even with a consistent infrastructure, varying installation practices can cause serious problems for enterprise interoperability, software reuse, security, and systems management.

An operating environment defines product releases and installation conventions that are supported by the enterprise, and establishes guidelines that must be flexible locally, to support R&D and unique systems requirements.

The enterprise can encourage compliance with these conventions through technical support services and purchasing procedures; in other words, the enterprise can influence the adoption of the recommended environments by making them the easiest system configurations to obtain and support. Variations from the operating environment must be supported locally at extra cost.

##System Requirements Profile

Enterprise architecture planning often produces broad, high-level requirements documents. For any particular family of systems, the requirements may be unclear to developers because of the sheer volume of information. A system requirements profile is a summary of key requirements for a family of related systems. The time frame is short term. Ideally, this document is only a few dozen pages in length, written to clarify the intended implementation goals for component systems and application development projects.

The system requirements profile identifies necessary scoping of system capabilities, and thus is the stepping-off point for enterprise requirements planning. The balance of the enterprise planning models are architecture and design specifications (described in subsequent sections), which are expressed through object-oriented models and comprise a set of object-oriented software architectures.

##Enterprise Architecture

An enterprise architecture is a set of diagrams and tables that define a system or family of systems from various stakeholder viewpoints; thus, the enterprise architecture comprises views of the entire system. Current and future time frames are depicted, and each view addresses the issues posed by principal stakeholders, such as end users, developers, systems operators, and technical specialists.

Consistency of the architecture views and notations across projects is important, for enterprise architectures enable technical communication across projects. Reuse and interoperability opportunities can be identified when projects share their architectures. Since individual projects have the most knowledge of the technical details, project-specific architectures can be compiled into accurate, enterprisewide architectures.

##Computational Facilities Architecture

As just explained, enterprise architectures are important communication tools for end users and architects. Each of the remaining specifications detail the computational architecture that defines interfaces for interoperability and reuse.

A computational facilities architecture (CFA) identifies and defines key points of interoperability for a family of systems. Each facility identifies a set of application program interfaces (APIs) and common data objects that are defined in detail in the interoperability specifications.

A CFA partitions the enterprise's interoperability needs into manageable specifications; it also defines a road map of priorities and schedules for the facilities. This is necessary to initiate and guide the formulation of interoperability specifications.

Achieving consensus on the facilities in a CFA is a key challenge for many enterprises. Misunderstandings abound regarding the role of the facilities in relation to external requirements, the need for system independence, the definition of common abstractions, and the necessity of limiting the scope of the facilities.

##Interoperability Specification

An interoperability specification defines the technical details of a computational facility. Typical interoperability specifications include APIs defined in IDL and common data object definitions.

Interoperability specifications establish key points of interoperability in a manner that is independent of any particular system of subsystem implementation. Architecture mining is a particularly effective process for creating these specifications During system maintenance, the key points of interoperability become value-added entry points for system extension.

##Development Profile

An interoperability specification alone is not enough to assure successful integration, because the semantics of APIs can be interpreted differently by different implementors. Robust API designs have built-in flexibility that enable extension and reuse, and details of their usage are often discovered in the development process. Some of these details may be unique to a particular set of systems.

A development profile records the implementation plans and developer agreements that are necessary to assure interoperability and successful integration. A development profile identifies the parts of API specifications that are used, local extensions to the specification, and conventions that coordinate integration.

While it is important to configuration-control all of these models, development profiles are working documents that evolve throughout development and maintenance life cycles. Multiple development profiles may exist for a single API specification, each of which addresses the integration needs of a particular domain or family of systems.

##Example

System 1 and System 2 represent two Stovepipe Systems in the same enterprise. While similar in many ways, these systems lack commonality; they use different database products, different office automation tools, have different software interfaces, and use unique graphical user interfaces (GUIs). The potential commonalities between these systems was not recognized and therefore not utilized by the designers and developers.

![Stovepipe Enterprise antipattern](/images/anti-patterns/Stovepipe-Enterprise-4-2x.png "Stovepipe Enterprise antipattern")

To resolve the AntiPattern, the enterprise starts by defining a standards reference model. This model, selects some baseline standards for interchange across all systems. The next step is to choose products for an operating environment. In this case, both database products are selected, but only one of the office automation tools.

This is the supported direction for future migration of the enterprise. The enterprise can facilitate this operating environment through enterprise product licensing, training, and technical support. This level also defines profiles for use of these technologies and common interfaces with reusable service implementations. The GUI applications comprise the remaining system-specific implementations.

![Stovepipe Enterprise antipattern](/images/anti-patterns/Stovepipe-Enterprise-5-2x.png "Stovepipe Enterprise antipattern")

##Related Solutions

Reinvent the Wheel is an AntiPattern that comprises a subset of the overall problem of Stovepipe Systems. Reinvent the Wheel is focused upon the lack of maturity of designs and implementations caused by the lack of communication between development projects.

Standards reference model, operating environment, and profile are solutions from the book CORBA Design Patterns They are all important components in the solution of Stovepipe Enterprises.

Examples of standards reference models include the IEEE POSIX.0, NIST Application

##Applicability To Other Viewpoints And Scales

Stovepipe Enterprises are often the consequence of organizational boundaries imposed by management. Organizational structures that inhibit communication and the transfer of technology produce the kind of disconnects that result in the lack of coordination that characterizes Stovepipe Enterprises.

The impact of the Stovepipe Enterprise AntiPattern on management is that every system development involves significant but unnecessary risk and cost. Since the systems do not interoperate and are difficult to integrate, the overall organizational effectiveness is impacted.

The organization's ability to accommodate changing business requirements is greatly impeded by the Stovepipe Enterprise. An emerging requirement for enterprises is called agile systems, which are able to accommodate changes in business processes because they already support interoperability across most or all enterprise systems.

Developers, too, are affected by the Stovepipe Enterprise because they are often asked to create brittle solutions to bridge independently architected systems. These interfaces are difficult to maintain and reuse, and the absence of technology coordination makes the creation of these interfaces quite challenging. Often, combinations of middleware solutions and commercial products (database engines) must be bridged in order to achieve interoperability.
