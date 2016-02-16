---
title: "What is Wolf Ticket?"
read_time: "1 min"
updated: "april 21, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/anti-patterns/wolf-ticket/"
---

# Wolf Ticket
## AntiPattern Problem
There are many more information systems standards than there are mechanisms to assure conformance. Only 6 percent of information systems standards have test suites. Most of the testable standards are for programming language compilers — FORTRAN, COBOL, Ada, and so forth.

A Wolf Ticket is a product that claims openness and conformance to standards that have no enforceable meaning. The products are delivered with proprietary interfaces that may vary significantly from the published standard.

A key problem is that technology consumers often assume that openness comes with some benefits. In reality, standards are more important to technology suppliers for brand recognition than for any benefits that the standards may offer users.

Standards do reduce technology migration costs and improve technology stability, but, differences in the implementation of the standards often negate their assumed benefits, such as multivendor interoperability and software portability.

Furthermore, many standards specifications are too flexible to assure interoperability and portability; other standards are excessively complex, and these are implemented incompletely and inconsistently in products. Frequently, different subsets of the standard are implemented by various vendors.

Wolf Tickets are a significant problem for de facto standards (an informal standard established through popular usage or market exposure). Unfortunately, some de facto standards have no effective specification; for example, a nascent database technology that is commercially available with multiple proprietary interfaces, unique to each vendor, has become a de facto standard.

## Refactored Solution
Technology gaps cause deficiencies in specifications, product availability, conformance, interoperability, robustness, and functionality. The closing of these gaps is necessary to enable the delivery of whole products, those comprising the infrastructure and services necessary for the realization of useful systems.

In the 1960s, a sophisticated user group called SHAPE advised the industry to stabilize technology and create whole products for the computer mainframe market, required for the realization of successful nonstovepipe systems. As a result, the mainframe workset remains the only whole-product information technology market.

Technology gaps become political issues for end users, corporate developers, and systems integrators. Politics is the exercise of power, and consumers must demand the resolution of technology gaps before they will be effectively addressed. For example, consumers must demand guarantees of merchantability and "fitness for purpose" before products are offered by commercial suppliers.

The core strategy of grassroots politics is heightening the contradiction. By spreading awareness of the contradictions in a system (such as the technology market), the establishment (in this case, technology suppliers) will resolve the issues. Three elements constitute an effective political message. With these three elements, the message has a good chance of being reported by the media:

1. The message must be controversial.
2. The message must be repetitive.
3. The message must be entertaining.

Currently, we are working on an initiative in technology consumer politics. What is needed are whole products supporting mission-critical system development. A whole product that enables the construction of any mission-critical system has five key services: naming, trading, database access, transactions, and system management.

These services apply to mission-critical systems in any domain. Naming is a white-pages service that enables the retrieval of object references for known objects. Trading is a yellow-pages service that supports system extensibility through retrieval of candidate services based upon attributes. A standard database access service is necessary for retrieval and updating of information resources.

Transactions assure robust access to state information and orderly cleanup in case of failures. System management is required for maintaining heterogeneous hardware and software environments. Because today, developers cannot buy these whole products in a robust, interworking form, developers are forced to re-create these services or build stovepipe systems.

## Variation
All computer technology consumers can participate in improving the technologies that they are currently using. To do so, simply call the vendor with your questions, complaints, and support problems.

Keep in mind, for shrink-wrap products, the profit margin is less than the resources required to answer a phone call and address your questions. Most vendors track the support issues and incorporate relevant changes into their products in future releases. The priority for changes is usually based upon the frequency and urgency of the reported problems.

## Background
The term Wolf Ticket originates from its slang use, where it is an unofficial pass sold to an event, such as a rock concert, by scalpers.
