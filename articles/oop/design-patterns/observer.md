---
title: "What is observer design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "Mar 7, 2015"
group: "articles"
permalink: "/faq/object-oriented-programming/design-patterns/observer/"
---

## Intent

Define a one-to-many dependency between objects so that when one object changes state, all its dependents are notified and updated automatically.
Encapsulate the core (or common or engine) components in a Subject abstraction, and the variable (or optional or user interface) components in an Observer hierarchy.
The "View" part of Model-View-Controller.

## Problem

A large monolithic design does not scale well as new graphing or monitoring requirements are levied.

## Discussion

Define an object that is the "keeper" of the data model and/or business logic (the Subject). Delegate all "view" functionality to decoupled and distinct Observer objects. Observers register themselves with the Subject as they are created. Whenever the Subject changes, it broadcasts to all registered Observers that it has changed, and each Observer queries the Subject for that subset of the Subject's state that it is responsible for monitoring.

This allows the number and "type" of "view" objects to be configured dynamically, instead of being statically specified at compile-time.

The protocol described above specifies a "pull" interaction model. Instead of the Subject "pushing" what has changed to all Observers, each Observer is responsible for "pulling" its particular "window of interest" from the Subject. The "push" model compromises reuse, while the "pull" model is less efficient.

Issues that are discussed, but left to the discretion of the designer, include: implementing event compression (only sending a single change broadcast after a series of consecutive changes has occurred), having a single Observer monitoring multiple Subjects, and ensuring that a Subject notify its Observers when it is about to go away.

The Observer pattern captures the lion's share of the Model-View-Controller architecture that has been a part of the Smalltalk community for years.

## Structure

<img src="https://lh5.googleusercontent.com/-o-fy55iDENI/VPrtbDZaykI/AAAAAAAACLw/IVsFAXGyVTM/w998-h568-no/Observer-2x.png">
Subject represents the core (or independent or common or engine) abstraction. Observer represents the variable (or dependent or optional or user interface) abstraction. The Subject prompts the Observer objects to do their thing. Each Observer can call back to the Subject as needed.

## Example

The Observer defines a one-to-many relationship so that when one object changes state, the others are notified and updated automatically. Some auctions demonstrate this pattern. Each bidder possesses a numbered paddle that is used to indicate a bid. The auctioneer starts the bidding, and "observes" when a paddle is raised to accept the bid. The acceptance of the bid changes the bid price which is broadcast to all of the bidders in the form of a new bid.
<img src="https://lh3.googleusercontent.com/-OHgSUVNZNro/VPrtbfBpczI/AAAAAAAACL0/odCH1ycodag/w740-h725-no/Observer_example1-2x.png">

## Check list

1. Differentiate between the core (or independent) functionality and the optional (or dependent) functionality.
2. Model the independent functionality with a "subject" abstraction.
3. Model the dependent functionality with an "observer" hierarchy.
4. The Subject is coupled only to the Observer base class.
5. The client configures the number and type of Observers.
6. Observers register themselves with the Subject.
7. The Subject broadcasts events to all registered Observers.
8. The Subject may "push" information at the Observers, or, the Observers may "pull" the information they need from the Subject.

## Rules

* Chain of Responsibility, Command, Mediator, and Observer, address how you can decouple senders and receivers, but with different trade-offs. Chain of Responsibility passes a sender request along a chain of potential receivers. Command normally specifies a sender-receiver connection with a subclass. Mediator has senders and receivers reference each other indirectly. Observer defines a very decoupled interface that allows for multiple receivers to be configured at run-time.
* Mediator and Observer are competing patterns. The difference between them is that Observer distributes communication by introducing "observer" and "subject" objects, whereas a Mediator object encapsulates the communication between other objects. We've found it easier to make reusable Observers and Subjects than to make reusable Mediators.
* On the other hand, Mediator can leverage Observer for dynamically registering colleagues and communicating with them.

In observer design pattern there is object which maintains list of dependants called observers. The pattern is also
referred as observer-listener pattern. 

All of the files listed here will reside in the same folder.

Create custom listeners and add these listeners to our observer class which is Project Manager.

Filename: IProjectListeners.php
 
```php
<?php

// Make sure that our all listeners follow the contract
interface IProjectListeners
{
    public function update($messaage, $projectlistener);
    public function __toString();
}
```

Filename:ProjectArchiveListener.php
 
```php
<?php
require_once "IProjectListeners.php";

class ProjectArchiveListener implements IProjectListeners
{
    public function update($messaage, $project)
    {
        // Compuse something here and notify the parserlistener when you have completed parsing something
        $project->jobFinished("Projects Archived\n", $this);
    }

    public function __toString()
    {
        return "ProjectArchiveListener";
    }
}

```

Filename: ProjectStatusChangeListener.php

```php
<?php
require_once "IProjectListeners.php";

/**
 * Class ProjectArchiveListener
 */
class ProjectArchiveListener implements IProjectListeners
{
    public function update($messaage, $project)
    {
        $project->jobFinished("Projects Archived\n", $this);
    }

    /**
     * @return string String Representation of the class
     */
    public function __toString()
    {
        return "ProjectArchiveListener";
    }
}
```

Filename: ProjectManager.php

```php
<?php

/**
 * Class ProjectManager
 */
class ProjectManager
{
    // maintains a list of listeners
    protected $listeners = [];

    /**
     * @param $project_states Custom project states
     * @param IProjectListeners $listener Our Custom project listeners
     */
    public function addProjectListener($project_states, IProjectListeners $listener)
    {
        $this->listeners[$project_states][] = $listener;
    }

    /**
     * This will be called when project is archived
     * @param $message string Custom message to log
     */
    public function onProjectArchive($message)
    {
        foreach ($this->listeners['archive'] as $archiveListener) {
            $archiveListener->update($message, $this);
        }
    }

    /**
     * This will be called when project status is changed
     * @param $message String Custom message to log
     */
    public function onProjectStatusChange($message){
        foreach ($this->listeners['status_change'] as $projectStatusChangeListener) {
            $projectStatusChangeListener->update($message, $this);
        }
    }

    /**
     * Function that gets invoked as soon as the job is done
     * @param $jobTitle String
     * @param $completedBy String
     */
    public function jobFinished($jobTitle, $completedBy)
    {
        echo sprintf("%s Job done by %s\n", $jobTitle, $completedBy);
    }

    /**
     * Archives the project
     */
    public function archiveProject()
    {
        /**
         * Inform all the observers that we have archived the project
         */
        $this->onProjectArchive("Project has just been archived.");

        /**
         * Inform all the observers that we have changed the status of the project
         */
        $this->onProjectStatusChange("Project status has been changed");
    }

}
```

Example: example.php

```php
<?php

require_once "ProjectManager.php";
require_once "ProjectStatusChangeListener.php";
require_once "ProjectArchiveListener.php";

$project = new ProjectManager();
$project->addProjectListener('status_change', new ProjectStatusChangeListener());
$project->addProjectListener('archive', new ProjectArchiveListener());

$project->archiveProject();

```

Once we execute the example.php, then the below shown output will be obtained.

```bash
$ php example.php
```

## Output:

Projects Archived
 Job done by ProjectArchiveListener
Project status has been change
 Job done by ProjectStatusChangeListner
