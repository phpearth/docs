---
title: "What is mushroom management antipattern?"
updated: "April 13, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/what-is-mushroom-management/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/what-is-mushroom-management/"
---

Also known as Pseudo-Analysis and Blind Development, Mushroom Management is often described by this phrase: "Keep your developers in the dark and feed them fertilizer."

An experienced system architect recently stated, "Never let software developers talk to end users." Furthermore, without end-user participation, "The risk is that you end up building the wrong system."

![Mushroom management antipattern](/images/oop/anti-patterns/dev.jpg "Mushroom management antipattern")

##AntiPattern Problem

In some architecture and management circles, there is an explicit policy to isolate system developers from the system's end users. Requirements are passed second-hand through intermediaries, including architects, managers, or requirements analysts. Mushroom Management assumes that requirements are well understood by both end users and the software project at project inception. It is assumed that requirements are stable.

There are several mistaken assumptions in Mushroom Management:

* In reality, requirements change frequently and drive about 30 percent of development cost. In a Mushroom Management project, these changes are not discovered until system delivery. User acceptance is always a significant risk, which becomes critical in Mushroom Management.
* The implications of requirements documents are rarely understood by end users, who can more easily visualize the meaning of requirements when they experience a prototype user interface. The prototype enables end users to articulate their real needs in contrast to the prototype's characteristics.
* When developers don't understand the overall requirements of a product, they rarely understand the required component interaction and necessary interfaces. Because of this, poor design decisions are made and often result in stovepipe components with weak interfaces that do not fulfill the functional requirements.

Mushroom Management affects developers by creating an environment of uncertainty. Often, the documented requirements are not sufficiently detailed, and there is no effective way to obtain clarification.

In order to do their job, developers must make assumptions, which may lead to pseudo-analysis, that is, object-oriented analysis that takes place without end-user participation. Some Mushroom Management projects eliminate analysis altogether and proceed directly from high-level requirements to design and coding.

##Refactored Solution

Risk-driven development is a spiral development process based upon prototyping and user feedback. Risk-driven development is a specialization of iterative-incremental development process (see the Analysis Paralysis AntiPattern). In this case, every increment is an external iteration.

In other words, every project increment includes extensions to user-interface functionality. The increment includes a user-interface experiment, including hands-on experience. The experiment assesses the acceptability and usability of each extension, and the results of the experiment influence the direction of the project through the selection of the next iteration.

Because the project frequently assesses user acceptance, and uses this input to influence the software, the risk of user rejection is minimized.

Risk-driven development is most applicable to applications, which are user-interface-intensive and require relatively simple infrastructure support. Personal computer applications that depend upon local files for storage infrastructure are strong candidates for risk-driven development.

##Variations

Including a domain expert on the development team is a very effective way to have domain input on project decisions. Whenever there is a domain-specific question, team members have expertise on-hand. An important risk in this approach, however, is that the domain expert represents only one opinion from the domain community.

