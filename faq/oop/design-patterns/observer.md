---
title: "What is observer design pattern and how to use it in PHP?"
read_time: "1 min"
updated: "february 3, 2015"
group: "oop"
permalink: "/faq/object-oriented-programming/design-patterns/observer/"
---

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