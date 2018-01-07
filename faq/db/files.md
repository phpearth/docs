# How to store files in a database?

This is a common question that will normally be answered with a prejudiced
answer. Technically, databases are able to hold binary data without bigger
performance issues, and it is a fact that storing binary data to a database is
common practice (e.g., for IP addresses).

The common answer that "storing files into databases is the worst thing you
could do" is simply wrong because it depends on what you will store and how it
will scale.

The general problem of storing files outside of databases and "reference to
storage places with file paths" is that isn't any file system mechanism which
could take action to automatically sync the database with the file system
state. So, if you delete a file from the database, you have to delete it by
yourself from the storage-space of your file system and vice versa.

The biggest issue about files that are referenced in a database appears when
you backup a database by making a snapshot. It will be close to impossible to
store a backup of the "current state" of files stored outside the database,
because it will be possible to touch such files while the snapshot is being
created. Integrity in backups matters, which is difficult when referenced parts
decentralize.

The general problem of storing files inside of databases as part of a table or
as a table referenced to other tables is the maximum storage size of the
database engine and some limits of the file system and streams used by the
database. If you wouldn't ever touch those limits, you'll be fine with storing
your files in the database. On contrary to the file system, binary data stored
at the database will also allocate a bit more memory at the storage because of
indexes and metadata for those rows. Nothing to struggle with, but it should be
included with the blueprints of the database(-cluster) that are set in stone.

The biggest issue about files in databases is that a native connection to a
database in a PHP environment takes more than a second. A file stream to the
client, however, will keep the database connection open until the database
sends the last bit of the stored binary data. This can be an issue because of
the max_connection limit of the database. It should be considered when building
the database platform if the database is intended to be used for file storage.
Caching frequently requested files can be a good solution.

So, using the database as a file storage is possible and performant. It is an
option to consider and depends on your infrastructure. A database that holds
all (binary) data that's referenced inside the database is a totally synced
database. If this is a must for your project and backup plans, you have to
depend on it.

Databases are good for one thing: holding data. They do not care, regardless of
whether it's 1 byte or 10 gigabytes.
