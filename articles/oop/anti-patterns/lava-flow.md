---
title: "What is Lava Flow antipattern"
read_time: "1 min"
updated: "march 27, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/anti-patterns/lava-flow/"
---

##Lava Flow
* **AntiPattern Name**: Lava Flow
* **Also Known As**: Dead Code
* **Most Frequent Scale**: Application
* **Refactored Solution Name**: Architectural Configuration Management
* **Refactored Solution Type**: Process
* **Root Causes**: Avarice, Greed, Sloth
* **Unbalanced Forces**: Management of Functionality, Performance, Complexity
* **Anecdotal Evidence**:
"Oh that! Well Ray and Emil (they're no longer with the company) wrote that routine back when Jim (who left last month) was trying a workaround for Irene's input processing code (she's in another department now, too). I don't think it's used anywhere now, but I'm not really sure. Irene didn't really document it very clearly, so we figured we would just leave well enough alone for now. After all, the bloomin' thing works doesn't it?!"

##Background

In a data-mining expedition, we began looking for insight into developing a standard interface for a particular kind of system. The system we were mining was very similar to those we hoped would eventually support the standard we were working on. It was also a research-originated system and highly complex. As we delved into it, we interviewed many of the developers concerning certain components of the massive number of pages of code printed out for us.

Over and over, we got the same answer: "I don't know what that class is for; it was written before I got here." We gradually realized that between 30 and 50 percent of the actual code that comprised this complex system was not understood or documented by any one currently working on it.

Furthermore, as we analyzed it, we learned that the questionable code really served no purpose in the current system; rather, it was there from previous attempts or approaches by long-gone developers. The current staff, while very bright, was loath to modify or delete code that they didn't write or didn't know the purpose of, for fear of breaking something and not knowing why or how to fix it.

At this point, we began calling these blobs of code "lava," referring to the fluid nature in which they originated as compared to the basaltlike hardness and difficulty in removing it once it had solidified. Suddenly, it dawned on us that we had identified a potential AntiPattern.

Nearly a year later, and after several more data-mining expeditions and interface design efforts, we had encountered the same pattern so frequently that we were routinely referring to Lava Flow throughout the department.

![Lava flow antipattern](/images/anti-patterns/lavaflow.jpg "Lava flow antipattern")

##General Form

The Lava Flow AntiPattern is commonly found in systems that originated as research but ended up in production. It is characterized by the lavalike "flows" of previous developmental versions strewn about the code landscape, which have now hardened into a basaltlike, immovable, generally useless mass of code that no one can remember much, if anything, about.

This is the result of earlier (perhaps Jurassic) developmental times when, while in a research mode, developers tried out several ways of accomplishing things, typically in a rush to deliver some kind of demonstration, thereby casting sound design practices to the winds and sacrificing documentation.

~~~java

// This class was written by someone earlier (Alex?) to manager the indexing
// or something (maybe). It's probably important. Don't delete. I don't think it's
// used anywhere - at least not in the new MacroINdexer module which may
// actually replace whatever this was used for.
class IndexFrame extends Frame {
  // IndexFrame constructor
  // ---------------------------
  public IndexFrame(String index_parameter_1)
  {
    // Note: need to add additional stuff here...
    super (str);
  }
  // ---------------------------
~~~

The result is several fragments of code, wayward variable classes, and procedures that are not clearly related to the overall system. In fact, these flows are often so complicated in appearance and spaghettilike that they seem important, but no one can really explain what they do or why they exist.

Sometimes, an old, gray-haired hermit developer can remember certain details, but typically, everyone has decided to "leave well enough alone" since the code in question "doesn't really cause any harm, and might actually be critical, and we just don't have time to mess with it."

Though it can be fun to dissect these flows and study their anthropology, there is usually not enough time in the schedule for such meanderings. Instead, developers usually take the expedient route and neatly work around them.

This AntiPattern is, however, incredibly common in innovative design shops where proof-of-concept or prototype code rapidly moves into production. It is poor design, for several key reasons:

 * Lava Flows are expensive to analyze, verify, and test. All such effort is expended entirely in vain and is an absolute waste. In practice, verification and test are rarely possible.
 * Lava Flow code can be expensive to load into memory, wasting important resources and impacting performance.
 * As with many AntiPatterns, you lose many of the inherent advantages of an object-oriented design. In this case, you lose the ability to leverage modularization and reuse without further proliferating the Lava Flow globules.

##Symptoms And Consequences

* Frequent unjustifiable variables and code fragments in the system.
* Undocumented complex, important-looking functions, classes, or segments that don't clearly relate to the system architecture.
* Very loose, "evolving" system architecture.
* Whole blocks of commented-out code with no explanation or documentation.
* Lots of "in flux" or "to be replaced" code areas.
* Unused (dead) code, just left in.
* Unused, inexplicable, or obsolete interfaces located in header files.
* If existing Lava Flow code is not removed, it can continue to proliferate as code is reused in other areas.
* If the process that leads to Lava Flow is not checked, there can be exponential growth as succeeding developers, too rushed or intimidated to analyze the original flows, continue to produce new, secondary flows as they try to work around the original ones, this compounds the problem.
* As the flows compound and harden, it rapidly becomes impossible to document the code or understand its architecture enough to make improvements.

## Typical Causes

* R&D code placed into production without thought toward configuration management.
* Uncontrolled distribution of unfinished code. Implementation of several trial approaches toward implementing some functionality.
* Single-developer (lone wolf) written code.
* Lack of configuration management or compliance with process management policies.
* Lack of architecture, or non-architecture-driven development. This is especially prevalent with highly transient development teams.
* Repetitive development process. Often, the goals of the software project are unclear or change repeatedly. To cope with the changes, the project must rework, backtrack, and develop prototypes. In response to demonstration deadlines, there is a tendency to make hasty changes to code on the fly to deal with immediate problems. The code is never cleaned up, leaving architectural consideration and documentation postponed indefinitely.
* Architectural scars. Sometimes, architectural commitments that are made during requirements analysis are found not to work after some amount of development. The system architecture may be reconfigured, but these inline mistakes are seldom removed. It may not even be feasible to comment-out unnecessary code, especially in modern development environments where hundreds of individual files comprise the code of a system. "Who's going to look in all those files? Just link em in!"

##Known Exceptions

Small-scale, throwaway prototypes in an R&D environment are ideally suited for implementing the Lava Flow AntiPattern. It is essential to deliver rapidly, and the result is not required to be sustainable.

##Refactored Solution

There is only one sure-fire way to prevent the Lava Flow AntiPattern: Ensure that sound architecture precedes production code development. This architecture must be backed up by a configuration management process that ensures architectural compliance and accommodates "mission creep" (changing requirements).

If architectural consideration is shortchanged up front, ultimately, code is developed that is not a part of the target architecture, and is therefore redundant or dead. Over time, dead code becomes problematic for analysis, testing, and revision.

In cases where Lava Flow already exists, the cure can be painful. An important principle is to avoid architecture changes during active development. In particular, this applies to computational architecture, the software interfaces defining the systems integration solution. Management must postpone development until a clear architecture has been defined and disseminated to developers.

Defining the architecture may require one or more system discovery activities. System discovery is required to locate the components that are really used and necessary to the system. System discovery also identifies those lines of code that can be safely deleted. This activity is tedious; it can require the investigative skills of an experienced software detective.

As suspected dead code is eliminated, bugs are introduced. When this happens, resist the urge to immediately fix the symptoms without fully understanding the cause of the error. Study the dependencies. This will help you to better define the target architecture.

To avoid Lava Flow, it is important to establish system-level software interfaces that are stable, well-defined, and clearly documented. Investment up front in quality software interfaces can produce big dividends in the long run compared to the cost of jackhammering away hardened globules of Lava Flow code.

Tools such as the Source-Code Control System (SCCS) assist in configuration management. SCCS is bundled with most Unix environments and provides a basic capability to record histories of updates to configuration-controlled files.

##Example

We recently participated in a data-mining expedition site where we attempted to identify evolutionary interfaces that resulted from preliminary interface architectures that we originated and were in the process of updating.

The system we mined was targeted because the developers had utilized our initial architecture in a unique way that fascinated us: Essentially, they constructed a quasi-event service out of our generic interapplication framework.

As we studied their system, we encountered large segments of code that baffled us. These segments didn't seem to contribute to the overall architecture that we had expected to find. They were somewhat incohesive and only very sparsely documented, if at all.

When we asked the current developers about some of these segments, the reply was, "Oh that? Well we're not using that approach anymore. Reggie was trying something, but we came up with a better way. I guess some of Reggie's other code may depend on that stuff though, so we didn't delete anything." As we looked deeper into the matter, we learned that Reggie was no longer even at the site, and hadn't been there for some time, so the segments of code were several months old.

After two days of code examination, we realized that the majority of the code that comprised the system was most likely similar to that code that we already examined: completely Lava Flow in nature.

We gleaned very little that helped us articulate how their architecture actually was constructed; therefore, it was nearly impossible to mine. At this point, we essentially gave up trying to mine the code and instead focused on the current developer's explanations of what was "really" going on, hoping to somehow codify their work into interface extensions that we could incorporate into our upcoming revisions to our generic interapplication framework.

One solution was to isolate the single, key person who best understood the system they had developed, and then to jointly write IDL with that person. On the surface, the purpose of the IDL we were jointly writing was to support a crisis demonstration that was weeks away.

By utilizing the Fire Drill Mini-AntiPattern, we were able to get the systems developers to validate our IDL by using it to rapidly build a CORBA wrapper for their product for the demonstration. Many people lost a lot of sleep, but the demonstration went well. There was, of course, one side effect to this solution: We ended up with the interface, in IDL, which we had set out to discover in the first place.

##Related Solutions

In today's competitive world, it is often desirable to minimize the time delay between R&D and production. In many industries, this is critical to a company's survival. Where this is the case, inoculation against Lava Flow can sometimes be found in a customized configuration-management (CM) process that puts certain limiting controls in place at the prototyping stage, similar to "hooks" into a real, production-class develop ment without the full restraining impact on the experimental nature of R&D.

Where possible, automation can play a big role here, but the key lies in the customization of a quasi-CM process that can be readily scaled into a full-blown CM control system once the product moves into a production environment. The issue is one of balance between the costs of CM in hampering the creative process and the cost of rapidly gaining CM control of the development once that creative process has birthed something useful and marketable.

This approach can be facilitated by periodic mapping of a prototyping system into an updated system architecture, including limited, but standardized inline documentation of the code.

##Applicability To Other Viewpoints And Scales

The architectural viewpoint plays a key role in preventing Lava Flows initially. Managers can also play a role in early identification of Lava Flows or the circumstances that can lead to Lava Flows. These managers must also have the authority to put the brakes on when Lava Flow is first identified, postponing further development until a clear architecture can be defined and disseminated.

As with most AntiPatterns, prevention is always cheaper than correction, so up-front investment in good architecture and team education can typically ensure a project against this and most other AntiPatterns. While this initial cost does not show immediate returns, it is certainly a good investment.
