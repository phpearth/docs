# What is Database and How to Access Database From PHP?

A database is an organized collection of data. The data is typically organized
to model aspects of reality in a way that supports processes requiring information.
For example, modelling the availability of rooms in hotels in a way that supports
finding a hotel with vacancies.

A database management system (DBMS) is an application that interacts with the
database, captures and analyzes the data.

## Application examples

Databases are used to support internal operations of organizations and to underpin
online interactions with customers and suppliers.

Areas and examples where DBMS are used:

* Content Management System (CMS)
* E-commerce store with products, catalogs and customers
* Banking: For customer information, accounts, and loans, and banking transactions.
* Airlines: For reservations and schedule information. Airlines were among the
  first to use databases in a geographically distributed manner - terminals
  situated around the world accessed the central database system through phone
  lines and other data networks.
* Universities: For student information, course registrations, and grades.
* Credit card transactions: For purchases on credit cards and generation of
  monthly statements.
* Telecommunication: For keeping records of calls made, generating monthly bills,
  maintaining balances on prepaid calling cards, and storing information about
  the communication networks.
* Finance: For storing information about holdings, sales, and purchases of
  financial instruments such as stocks and bonds.
* Sales: For customer, product, and purchase information.
* Manufacturing: Management of supply chain, tracking factory production, inventories
  of items in warehouses, and orders for items.
* Human resources: Information about employees, salaries, payroll taxes and
  benefits, and paychecks generation.

## Database access from PHP

PHP has in its core [multiple extensions](http://php.net/manual/en/refs.database.php)
for accessing different types of databases. Before accessing database from PHP
learn **SQL** (Structured Query Language). SQL is a language designed to manage
data stored in relational databases.

After getting a grip with basics many applications abstract the database layer,
customize SQL for more advanced, efficient and better ways to access databases.
For more information about this check [PHP ORMs](/databases/orm.md).

## See Also

Other resources you should check out:

* [Codecademy: Learn SQL](https://www.codecademy.com/learn/learn-sql)
* [PDO tutorial for MySQL developers](http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers)
* [PHP.net: Database Security](http://php.net/manual/en/security.database.php)
* [Related FAQ: What is SQL injection and how to prevent it?](/security/sql-injection.md)
* [Related FAQ: What is PDO?](/databases/pdo.md)
* [Related FAQ: Why are mysql_* functions removed and what to do?](/databases/mysql-functions.md)
* [Wikipedia](http://en.wikipedia.org/wiki/Database)
