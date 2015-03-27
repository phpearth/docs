---
title: "AntiPattern problem - Ambigous Viewpoint"
read_time: "1 min"
updated: "march 27, 2015"
group: "oop"
permalink: "/faq/object-oriented-programming/anti-patterns/ambigous-viewport/"
---

#Ambiguous Viewpoint
**AntiPattern Problem**

Object-oriented analysis and design (OOA&D) models are often presented without clarifying the viewpoint represented by the model. By default, OOA&D models denote an implementation viewpoint that is potentially the least useful. Mixed viewpoints don't allow the fundamental separation of interfaces from implementation details, which are one of the primary benefits of the object-oriented paradigm.
<img src="../../../images/anti-patterns/arrows.jpg" >
#Refactored Solution

There are three fundamental viewpoints for OOA&D models: the business viewpoint, the specification viewpoint, and the implementation viewpoint. The business viewpoint defines the user's model of the information and processes. This is a model that domain experts can defend and explain (commonly called an analysis model). Analysis models are some of the most stable models of the information system and are worthwhile to maintain.

Models can be less useful if they don't focus on the required perspective(s). A perspective applies filters to the information. For example, defining a class model for a telephone exchange system will vary significantly depending upon the focus provided by the following perspectives:

* Telephone user, who cares about the ease of making calls and receiving itemized bills.
* Telephone operator, who cares about connecting users to required numbers.
* Telephone accounting department, which cares about the formulae for billing and records of all calls made by users.

Some of the same classes will be identified, but not many; where there are, the methods will not be the same.

The specification viewpoint focuses on software interfaces. Because objects (as abstract data types) are intended to hide implementation details behind interfaces, the specification viewpoint defines the exposed abstractions and behaviors in the object system. The specification viewpoint defines the software boundaries between objects in the system.

The implementation viewpoint defines the internal details of the objects. Implementation models are often called design models in practice. To be an accurate model of the software, design models must be maintained continuously as the software is developed and modified. Since an out-of-date model is useless, only selected design models are pertinent to maintain; in particular, those design models that depict complex aspects of the system.

