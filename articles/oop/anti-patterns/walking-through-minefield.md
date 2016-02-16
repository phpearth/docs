---
title: "What is walking through a minefield antipattern problem?"
read_time: "1 min"
updated: "april 13, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/anti-patterns/walking-through-a-minefield-antipattern/"
---

Using today's software technology is analogous to walking through a high-technology mine field. This mini-AntiPattern is also known as Nothing Works or Do You Believe in Magic?

Numerous bugs occur in released software products; in fact, experts estimate that original source code contains two to five bugs per line of code. This means that the code will require two or more changes per line to remove all defects. Without question, many products are released well before they are ready to support operational systems. A knowledgeable software engineer states that, "There are no real systems, not even ours."

The location and consequences of software defects are unrelated to their apparent causes, and even a minor bug can be catastrophic. For example, operating systems (UNIX, Windows, etc.) contain many known and unknown security defects that make them vulnerable to attack; furthermore, the Internet has dramatically increased the likelihood of system attack.

End users encounter software bugs frequently. For example, approximately one in seven correctly dialed telephone numbers is not completed by the telephone system (a software-intensive application). And note, the rate of complaint is low compared to the frequency of software failures.

The purpose of commercial software testing is to limit risk, in particular, support costs For shrink-wrapped software products, each time an end user contacts a vendor for technical support, most or all of the profit margin is spent answering the call.

With simpler systems of the past, we were lucky. When a software bug occurred, the likely outcome was that nothing happened. With today's systems, including computer-controlled passenger trains and spacecraft control systems, the outcome of a bug can be catastrophic. Already, there have been half a dozen major software failures where financial losses exceeded $100 million.

## Refactored Solution

Proper investment in software testing is required to make systems relatively bug-free. In some progressive companies, the size of testing staff exceeds programming staff The most important change to make to testing procedures is configuration control of test cases.

A typical system can require five times as much test-case software as production software. Test software is often more complex than production software because it involves the explicit management of execution timing to detect many bugs.

When test software detects a bug, it is more likely to be the result of a bug in the test than in the code being tested. Configuration control enables the management of test software assets; for example, to support regression testing.

Other effective approaches for testing include automation of test execution and test design. Manual test execution is labor-intensive, and there is no proven basis for the effectiveness of manual testing.

In contrast, automatic test execution enables running tests in concert with the build cycle. Regression tests can be executed without manual intervention, ensuring that software modifications do not cause defects in previously tested behaviors. Test design automation supports the generation of rigorous test suites, and dozens of good tools are available to support test design automation.

## Variations

Formal verification is used in a number of applications to ensure an error-free design Formal verification involves prov-ing (in a mathematical sense) the satisfaction of requirements. Unfortunately, computer scientists trained to perform this form of analysis are relatively rare. In addition, the results of formal analysis are expensive to generate and may be subjective. Consequently, in general, we do not recommend this approach as feasible for most organizations.

Software inspection is an alternative approach that has been shown to be effective in a wide range of organizations Software inspection is a formal process for review of code and documentation products.

It involves careful review of software documentation in search of defects; for example, it is recommended that each inspector search for approximately 45 minutes per page of documentation. The defects discovered by multiple inspectors are then listed during an inspection logging meeting.

The document editor can remove defects for subsequent review by the inspection team. Quality criteria are established for initial acceptance of the document by the inspection team and completion of the inspection process. Software inspection is a particularly useful process because it can be applied at any phase of development, from the writing of initial requirements documents through coding.

## Background

"Do you believe in magic?" is a question sometimes posed by savvy computer professionals. If you believe that today's software systems are robust, you certainly do believe in magic.

The reality of today's software technology is analogous to an intriguing short story in Stephen Gaskin's Mind at Play In the story, people are driving shiny new cars and living comfortable lives. However, there is one man who wants to see the world as it really exists. He approaches an authority figure who can remove all illusions from his perception.

Then, when he looks at the world, he sees people walking in the streets pretending to be driving fancy cars. In other words, the luxurious lifestyles were phony. In the end, the man recants, and asks to be returned to his prior state of disillusionment.

In one view, today's technology is very much like the Gaskin story. It is easy to believe that we are using mature software technologies on powerful, robust platforms. In fact, this is an illusion; software bugs are pervasive, and there are no robust platforms underneath.