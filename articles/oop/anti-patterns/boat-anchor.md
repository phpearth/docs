---
title: "What is Boat Anchor antipattern problem?"
read_time: "1 min"
updated: "march 28, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/anti-patterns/what-is-boat-anchor/"
---

A Boat Anchor is a piece of software or hardware that serves no useful purpose on the current project. Often, the Boat Anchor is a costly acquisition, which makes the purchase even more ironic.

The reasons for acquiring a Boat Anchor are usually compelling at the time. For example, a policy or programmatic relationship may require the purchase and usage of a particular piece of hardware or software. This is a starting assumption (or constraint) of the software project. Another compelling reason is when a key manager is convinced of the utility of the acquisition.

A sales practice called "very important person (VIP) marketing" targets the sales pitch at senior decision makers who have buying authority. VIP marketing often focuses on chief executive officers of small- to medium-size corporations. A commitment to the product is made without proper technical evaluation.

![Boat anchoer antipattern](/images/anti-patterns/anchor.jpg "Boat anchoer antipattern")

The consequences for managers and software developers are that significant effort may have to be devoted to making the product work.

After a significant investment of time and resources, the technical staff realizes that the product is useless in the current context, and abandons it for another technical approach. Eventually, the Boat Anchor is set aside and gathers dust in some corner (if it's hardware).

## Refactored Solution

Good engineering practice includes the provision for technical backup, an alternative approach that can be instituted with minimal software rework. The selection of technical backup is an important risk-mitigation strategy.

Technical backups should be identified for most infrastructure technologies (upon which most software depends), and for other technologies in high-risk areas. Technical backups should be evaluated along with critical-path technologies in the selection process. Prototyping with evaluation licenses (available from most vendors) is recommended for both critical-path and back-up technologies.

## Related AntiPatterns

Rational decision making is explained in the solution to the Irrational Management AntiPattern. Rational decision making can be used as an objective technology selection process to identify Boat Anchors prior to acquisition. The solution to the Smoke and Mirrors AntiPattern describes the practices for prepurchase technology evaluation, including review of product documentation and train-before-you-buy.