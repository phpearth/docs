---
title: "What is behavior driven development?"
read_time: "1 min"
updated: "april 28, 2015"
group: "testing"
permalink: "/faq/testing/behavior-driven-development/"
---

##Definition
BDD (Behaviour Driven Development) is a synthesis and refinement of practices stemming from TDD (Test Driven Development) and ATDD (Acceptance Test Driven Development).
BDD augments TDD and ATDD with the following tactics:

* Apply the "Five Why's" principle to each proposed User Story, so that its purpose is clearly related to business outcomes
* Thinking "from the outside in", in other words implement only those behaviors which contribute most directly to these business outcomes, so as to minimize waste
* Describe behaviors in a single notation which is directly accessible to domain experts, testers and developers, so as to improve communication
* Apply these techniques all the way down to the lowest levels of abstraction of the software, paying particular attention to the distribution of behavior, so that evolution remains cheap

##Signs Of Use

* A team using BDD should be able to provide a significant portion of  *functional documentation*  in the form of User Stories augmented with executable scenarios or examples.
* Instead of referring to "tests", a BDD practitioner will prefer the terms "scenario" and "specification". As currently practiced, BDD aims to gather in a single place the specification of an outcome valuable to a user, generally using the role-feature matrix of (User Stories), as well as examples or scenarios expressed in the form given-when-then; these two notations being often considered the most readable.
* In emphasizing the term "specification", the intent of BDD is to provide a single answer to what many Agile teams view as separate activities: the creation of unit tests and "technical" code on one hand, the creation of functional tests and "features" on the other hand. This should lead to increased collaboration between developers, test specialists, and domain experts.

* Rather than refer to "the unit tests of a class", a practitioner or a team using BDD prefers to speak of "the specifications of the behavior of the class". This reflects a greater focus on the documentary role of such specifications: their names are expected to be more expressive, and, when completed with their description in given-when-then format, to serve as technical documentation.

* Rather than refer to "functional tests", the preferred term will be "specifications of the product's behavior". The technical aspects of BDD are placed on an equal footing with techniques encouraging more effective conversation with customers, users and domain experts.
In addition to refactoring techniques already present in TDD, the design philosophy in BDD pays particular attention to appropriate distribution of responsibilities among classes, which leads its practitioners to emphasize "mocking".

##Common Pitfalls
* although Dan North, who first formulated the BDD approach, claims that it was designed to address recurring issues in the teaching of TDD, it is clear that BDD requires familiarity with a greater range of concepts than TDD does, and it seems difficult to recommend a novice programmer should first learn BDD without prior exposure to TDD concepts
* the use of BDD requires no particular tools or programming languages, and is primarily a conceptual approach; to make it a purely technical practice or one that hinges on specific tooling would be to miss the point altogether
##Expected Benefits
Teams already using TDD or ATDD may want to consider BDD for several reasons:

* BDD offers more precise guidance on organizing the conversation between developers, testers and domain experts
* Notations originating in the BDD approach, in particular the given-when-then canvas, are closer to everyday language and have a shallower learning curve compared to those of tools such as Fit/FitNesse
* Tools targeting a BDD approach generally afford the automatic generation of technical and end user documentation from BDD "specifications"
