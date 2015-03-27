#Poltergeists
**AntiPattern Name**: Poltergeists
**Also Known As**: Gypsy , Proliferation of Classes , and Big DoIt Controller Class
**Most Frequent Scale**: Application
**Refactored Solution Name**: Ghostbusting
**Refactored Solution Type**: Process
**Root Causes**: Sloth, Ignorance
**Unbalanced Force**: Management of Functionality, Complexity
**Anecdotal Evidence**:
"I'm not exactly sure what this class does, but it sure is important!"

#Background

When Michael Akroyd presented the Gypsy AntiPattern at Object World West in 1996, he likened the transient appearance and then discrete vanishing of the gypsy class to a "Gypsy

Wagon" that is there one day and gone the next. As we studied Akroyd's model, we wanted to convey more of the Gypsy's invoking function in the overall AntiPattern name. Thus, we felt that since poltergeists represent "restless ghosts" that cause "bump-in-the-night types of phenomena," that term better represented the "pop in to make something happen" concept of this AntiPattern while retaining the "here now then suddenly vanished" flavor of the initial Gypsy name.
![](../../../images/anti-patterns/ghosts.png) 
In the LISP language, as in many others, certain pure-evil programmers exist who take great glee in leveraging the "side effects" of certain language functions to mysteriously perform key functionality in their systems. Analysis and understanding of such systems is virtually impossible, and any attempt at reuse is considered insane.

Like the Poltergeist "controller" class, the use of "side effects" to accomplish any principle task in an implementation is an incorrect utilization of the language or architecture tool, and should be avoided.

#General Form

Poltergeists are classes with limited responsibilities and roles to play in the system; therefore, their effective life cycle is quite brief. Poltergeists clutter software designs, creating unnecessary abstractions; they are excessively complex, hard to understand, and hard to maintain.

This AntiPattern is typical in cases where designers familiar with process modeling but new to object-oriented design define architectures. In this AntiPattern, it is possible to identify one or more ghostlike apparition classes that appear only briefly to initiate some action in another more permanent class. Akroyd calls these classes "Gypsy Wagons" Typically, Gypsy Wagons are invented as controller classes that exist only to invoke methods of other classes, usually in a predetermined sequence. They are usually obvious because their names are often suffixed by _manager or _controller.

The Poltergeist AntiPattern is usually intentional on the part of some greenhorn architect who doesn't really understand the object-oriented concept. Poltergeist classes constitute bad design artifacts for three key reasons:

1. They are unnecessary, so they waste resources every time they "appear."
2. They are inefficient because they utilize several redundant navigation paths.
3. They get in the way of proper object-oriented design by needlessly cluttering the object model.

#Symptoms And Consequences

* Redundant navigation paths.
* Transient associations.
* Stateless classes.
* Temporary, short-duration objects and classes.
* Single-operation classes that exist only to "seed" or "invoke" other classes through temporary associations.
* Classes with "control-like" operation names such as start_process_alpha.

#Typical Causes

* Lack of object-oriented architecture. "The designers don't know object orientation."
* Incorrect tool for the job. Contrary to popular opinion, the object-oriented approach isn't necessarily the right solution for every job. As a poster once read, "There is no right way to do the wrong thing." That is to say, if object orientation isn't the right tool, there's no right way to implement it.
* Specified disaster. As in the Blob, management sometimes makes architectural committments during requirements analysis. This is inappropriate, and often leads to problems like this AntiPattern.
#Known Exceptions

There are no exceptions to the Poltergeists AntiPattern.

#Refactored Solution

Ghostbusters solve Poltergeists by removing them from the class hierarchy altogether. After their removal, however, the functionality that was "provided" by the poltergeist must be replaced. This is easy with a simple adjustment to correct the architecture.

The key is to move the controlling actions initially encapsulated in the Poltergeist into the related classes that they invoked. This is explained in detail in the next section.

#Example

In order to more clearly explain the Poltergeist, consider the peach-canning example in figure below. We see that the class PEACH_CANNER_CONTROLLER is a Poltergeist because:
![](../../../images/anti-patterns/Poltergeist-1-2x.png)

* It has redundant navigation paths to all other classes in the system.
* All of its associations are transient.
* It has no state.
* It is a temporary, short-duration class that pops into existence only to invoke other classes through temporary associations.

In this example, if we remove the Poltergeist class, the remaining classes lose the ability to interact. There is no longer any ordering of processes. Thus, we need to place such interaction capability into the remaining hierarchy. Notice that certain operations are added to each process such that the individual classes interact and process results.

![](../../../images/anti-patterns/Poltergeist-2-2x.png)

#Related Solutions

The "80% solution" discussed in the Blob AntiPattern results in something that looks very similar to a Poltergeist. The "coordinator" class presented still manages all or most of the system's functionality and typically exhibits many of the features of a Poltergeist.

#Applicability To Other Viewpoints And Scales

Occurs when developers are designing a system as they implement it (typically by the seat of their pants!) although certainly it may come as a result of failure to properly architect a system. Whether this presents evidence that Poltergeists are really a case of failed management is left to the reader.

As with most development AntiPatterns, both architectural and managerial viewpoints play key roles in initial prevention and ongoing policing against them. It's through an architectural viewpoint that an emerging AntiPattern is often recognized, and through effective management that it is properly addressed when not prevented outright.

Managers should take great care to ensure that object-oriented architectures are evaluated by qualified object-oriented architects as early as possible and then on an ongoing basis to prevent novice-induced errors such as this AntiPattern. Pay the price for good architecture up front!

 
