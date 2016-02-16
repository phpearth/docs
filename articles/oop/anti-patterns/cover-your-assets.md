---
title: "What is cover your assets antipattern?"
read_time: "1 min"
updated: "april 10, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/anti-patterns/cover-your-assets/"
---

#Cover Your Assets

Document-driven software processes often produce less-than-useful requirements and specifications because the authors evade making important decisions. In order to avoid making a mistake, the authors take a safer course and elaborate upon alternatives.

The resulting documents are voluminous and become an enigma; there is no useful abstraction of the contents that convey the authors' intent. Unfortunate readers, who may have contractual obligations dependent upon the text, must pore through the mind-numbing details.
![Cover Your Assets antipattern](/images/anti-patterns/paper.jpg "Cover Your Assets antipattern")
When no decisions are made and no priorities are established, the documents have limited value. It is unreasonable to have hundreds of pages of requirements that are all equally important or mandatory. The developers are left without much useful guidance about what to implement in what priority.

##Refactored Solution
Architecture blueprints are abstractions of information systems that facilitate communication of requirements and technical plans between the users and developers An architecture blueprint is a small set of diagrams and tables that communicate the operational, technical, and systems architecture of current and future information systems A typical blueprint comprises no more than a dozen diagrams and tables, and can be presented in an hour or less as a viewgraph presentation.

Architecture blueprints are particularly useful in an enterprise with multiple information systems. Each system can establish its architecture blueprints, then the organization can compile enterprisewide blueprints based upon the system-specific details. Blueprints should characterize both existing systems and planned extensions.

The extensions can be used to coordinate architecture planning across multiple systems. Because architecture blueprints allow multiple projects to portray their technologies, opportunities for interoperability and reuse are enhanced.