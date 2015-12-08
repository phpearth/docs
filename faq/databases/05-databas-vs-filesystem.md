---
title: "Database management systems vs. file systems?"
read_time: "2 min"
updated: "february 10, 2014"
group: "databases"
permalink: "/faq/databases/database-vs-filesystem/"

compass:
  prev: "/faq/databases/what-is-pdo/"
  next: "/faq/databases/mongodb-vs-mysql/"
---

## DataBase Management Systems vs Files Systems
<table border="1" align="center">
<thead>
<tr><th>Underlying System</th><th>Definition</th></tr>
</thead>
<tbody>
<tr><td>DBMS</td><td>A computerized record-keeping system</td></tr>
<tr><td>File System</td><td>A collection of individual files accessed by applications programs.</td></tr>
<tbody>
</table>

## Common Limitations of some File System Based DBs:

* Separated and Isolated Data - Makes coordinating, assimilating and representing data difficult
* Data Duplication - Wastes space and can lead to data integrity (inconsistency) problems
* Application Program Dependencies - Changes to a single file can require changes to numerous application programs
* Incompatible Files

## Advantages of a DBMS

* Data Consistency and Integrity - by controlling access and minimizing data duplication
* Application program independence - by storing data in a uniform fashion
* Data Sharing - by controlling access to data items, many users can access data concurrently
* Checkpointing and Recovery
* Security and Privacy
* Multiple views of data
* Expandability, Flexibility, Scalability
* Reduced application development times once the system is in place
* Standards enforcement

* However .....
  * Commerical DBMS often have high initial cost
  * Many DBMSs have high overhead - require powerful computers
  * DBMS are not special purpose software programs
  * Performance depends on the application


## When is a DBMS Not Necessarily Appropriate?

* Database is small with a simple structure
* Applications are simple, special purpose and relatively static.
* Concurrent, multi-user access to data is not required.
* Need a quick prototype to demonstrate feasibility
* Need an easy way to see the data without having to write a program
* Customers don't want to install a DBMS and want to get online quickly
