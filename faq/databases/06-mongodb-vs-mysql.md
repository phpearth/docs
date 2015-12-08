---
title: "MongoDB vs. MySQL?"
read_time: "3-5 min"
updated: "Feb 07, 2015"
group: "databases"
permalink: "/faq/databases/mongodb-vs-mysql/"

compass:
  prev: "/faq/databases/database-vs-filesystem/"
  next: "/faq/databases/orm/"
---

## Start

When we hear "Database" we think of MySql

MySQL is a relational database management system (RDBMS) which has been around for decades. As a database system, RDBMS stores data in a database object called table. Table is a structure of dataset consist of row and column. In order to access the data stored in RDBMS, SQL language is used. The SQL use statement: SELECT, INSERT, UPDATE, DELETE to manipulate the data stored in database system.

RDBMS and its SQL language  has been an industrial standard database system, since 1986 ANSI (American National Standard of Industry) issued an SQL standard. Then in 1987, International Standard of Organization (ISO) issued SQL standard as International standard as ISO/IEC 9075. However, in many RDBMS, there are variations of SQL from the ISO and ANSI standard, which unique to each database. However, the basic standard is the same in every database using SQL.

## MySql

MySQL is the popular database which has been around since 1995. The database was released under the GNU GPL License, which made the source code available. MySQL was issued by MySQL AB, a Swedish company. MySQL gains popularity as the top database for web application due to the LAMP and others software stack with AMP acronym. LAMP is an acronym for Linux-Apache-MySQL-PHP, a software stack which implemented in large numbers of web application.

Due to the popularity of MySQL, Sun Microsystem, a company that sells computers and the inventor of Java Programming language, acquired  MySQL AB as one of their subsidiary in 2008. Sun made the move in order to strengthen its position in the Open Source software landscape. Previously, they had acquired StarOffice in 1999, a German company that produces office suite that became OpenOffice.

In 2010, Oracle the database giant bought Sun Microsystem and therefore become the owner of MySQL. This made Oracle has the cutting edge in the database industry. With the ownership of MySQL through the acquisition of Sun Microsystem, Oracle has two database product offered to their customers, Oracle database for a big corporate customers and MySQL for private use. What is the different between Oracle Database and MySQL? There are some differences in terms of their system management and details.

However, there is one downside of SQL to deal with the real life data. In the business world, most data we have today is a non-structured data, meaning as the data that cannot be stored in a traditional SQL tabular model, known as structured data. Structured data is data which have a predefined data model that can be stored in SQL row and column format. Unstructured data refers to text-extensive data which may have numbers and structured data in the text, but it cannot be stored in the traditional SQL database. This unstructured data is the most of data we deal in daily life. Merril Lynch in 1998 made estimation that 80% to 90% of business data is originated from unstructured form.

Therefore, most of the data in our life cannot be stored in SQL format.

## NoSQL and MongoDB

Meanwhile, the reliance of unstructured data in every aspect of life is increasing rapidly. With the huge amounts of data in the web, the need to have a database to store documents in becomes imperative. The initiative of creating a database capable of storing unstructured data began with NoSQL.

The idea of NoSQL started in 1998. The name is a database created by Carlo Strozzi, who made its database management system and use a stream-operator paradigm to access data instead of SQL syntax, Stream operator paradigm is a database operator which resemble a mathematical operation in order to access data stored in database. Neverthelese, NoSQL is still using RDBMS model, therefore it has SQL equivalent in NoSQL operator and it does not really support the need to store document in database. NoSQL RDBMS is only qualified as “NoSQL RDBMS.”

The quest for new database without SQL to store document and unstructured data has made the term NoSQL became generic terms for that purpose.

MongoDB came with the aim of providing the new way of data storage. Therefore database can store document for the world wide web. Began in 2007, MongoDB is built to store data as an object in a dynamic schema, instead of a tabular database like SQL. The data in MongoDB is stored as object notation based on the format of JSON (Java Script Object Notation). JSON is a standard for data transfer over the network between the server and web application using human readable format. Prior to JSON, the XML is used for that purpose. MongoDB modified the JSON format into its own BSON, which store the object in a binary format instead of human readable format. Hence the acronym BSON stands for Binary JSON. BSON, due to its binary format provide more reliable and more efficient in storage space and speed.

The popularity of MongoDB gains when users love to use MongoDB for it delivers its promise as a document-oriented database. The prominent MongoDB user are Craigslist that has 2 billion of its records stored in MongoDB; Forbes and New York Times that use it to store their articles and photos; Shutterfly for its photo database that contained about 18 billion of photos; and Foursquare.

The emergence of web-oriented data has shifted the database landscape with the arrival of Big Data. As Gartner, a prominent information technology research and advisory firm has coined the term Big Data in 2001. Big Data is the data which due to its nature can not be stored in a tabular model of relational database management system as exist today with the SQL syntax to manipulate the data.

Big data has grown and the 3-V that Gartner mentioned regarding the data growth challenges and opportunities were three-dimensional, which are increasing volume (the amount of data), velocity (the speed of data transfer), and variety (the range of data types and sources) has come to our everyday life. We are now dealing with that kind of data daily.

Just imagine, we are now dealing with terabyte of data every day in data transfer, things we hardly found in 5-10 years ago. We also deal with the rapid increasing speed of data transfer through the advancement of computing technology which happens real fast. We also deal with the various source of data. The data we are analyzing is from multiple source in a multiple forms. We have a streaming video, image and audio video beside text. We practically can tap data anywhere we want it and anytime we want to in a various format, with multiple size and multiple source.

This kind of unstructured data with its massive size in a single file hence the name Big Data is given to them, require a different approach to handle. We need more than just traditional SQL which is extremely good to manage structured data in its tabular format of row and column. However the unstructured data which take up to 90% of data we manage requires a non-tabular storage. We simply cannot rely on the SQL and traditional relational database management system to store and manage the data in form of multimedia file, image, blog and articles. We need a document oriented data which is MongoDB came from instead of MySQL to manage different kind of data: unstructured rather than structured data.

## So...

Attempting a comparison between MySQL vs MongoDB is actually an apples to oranges type of challenge. We simply cannot devise a winner. MySQL is a RDBMS with SQL that has a rigid data model which required data to be stored in tabular model: the rows and columns. It is useful to organize your structured data like sales statistics. On the other hand, MongoDB is a document oriented database, which store document and treat the document as data. It has very different approach than MySQL. Choose the one that works best for you!
