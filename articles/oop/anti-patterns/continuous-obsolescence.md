---
title: "What is continuous obsolescence antipattern problem?"
read_time: "1 min"
updated: "march 27, 2015"
group: "oop"
permalink: "/faq/object-oriented-programming/anti-patterns/continous-obsolescence/"
---

Technology is changing so rapidly that developers have trouble keeping up with the current versions of software and finding combinations of product releases that work together.

Given that every commercial product line evolves through new product releases, the situation has become increasingly difficult for developers to cope with. Finding compatible releases of products that successfully interoperate is even harder.

![Continuous obsolescence antipattern](https://raw.githubusercontent.com/wwphp-fb/php-resources/master/images/anti-patterns/obsolete.jpg "Continuous obsolescence antipattern")

Java is a well-known example of this phenomenom, with new versions coming out every few months. For example, by the time a book on Java 1.X goes to press, a new Java Development Kit obsoletes the information. Java is not alone; many other technologies also participate in Continuous Obsolescence.

The most flagrant examples are products that embed the year in their brand names, such as Product98. In this way, these products flaunt the progression of their obsolescence. Another example is the progression of Microsoft dynamic technologies:

* DDE
* OLE 1.0
* OLE 2.0
* COM
* ActiveX
* DCOM
* COM?

From the technology marketers' perspective, there are two key factors: mindshare and marketshare. Rapid innovation requires the dedicated attention of consumers to stay current with the latest product features, announcements, and terminology.

For those following the technology, rapid innovation contributes to mindshare; in other words, there is always new news about technology X. Once a dominant marketshare is obtained, the suppliers' primary income is through obsolescence and replacement of earlier product releases. The more quickly technologies obsolesce (or are perceived as obsolete), the higher the income.

##Refactored Solution

An important stabilizing factor in the technology market is open systems standards. A consortium standard is the product of an industry concensus that requires time and investment.

Joint marketing initiatives build user awareness and acceptance as the technologies move into the mainstream. There is an inherent inertia in this process that benefits consumers, for once a vendor product is conformant to a standard, the manufacturer is unlikely to change the conformant features of the product.

The advantages of a rapidly obsolescing technology are transitive. Architects and developers should depend upon interfaces that are stable or that they control. Open systems standards give a measure of stability to an otherwise chaotic technology market.

##Variations

The Wolf Ticket Mini-AntiPattern describes various approaches that consumers can use to influence product direction toward improved product quality.

