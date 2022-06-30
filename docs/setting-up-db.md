Note: scroll down to find the SQL to execute and set this up automatically.

First, you'll need to set up your **main database**:
- Name: `qbixxassignment`
- Encoding: `utf8mb4`
- Collation: `utf8mb4_unicode_520_ci`

Accessible with a user:
- Username: `qbixxassignment`
- Password: `qbixxassignment`

And a **test database**:
- Name: `qbixxassignment_test`
- Encoding: `utf8mb4`
- Collation: `utf8mb4_unicode_520_ci`

Accessible with a user:
- Username: `qbixxassignment_test`
- Password: `qbixxassignment_test`

Note: make sure the test user also has enough rights to create and drop databases if you run tests in parallel.

The following SQL statement can be executed as `root` user to set this up for you:
```SQL
CREATE DATABASE qbixxassignment
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_520_ci;
```

```SQL
CREATE DATABASE qbixxassignment_test
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_520_ci;
```

```SQL
CREATE USER 'qbixxassignment'@'%' IDENTIFIED BY 'qbixxassignment';

GRANT INDEX, INSERT, TRIGGER, DROP, EVENT, CREATE, ALTER, SHOW VIEW, ALTER ROUTINE, DELETE, REFERENCES, SELECT, GRANT OPTION, UPDATE, CREATE VIEW, EXECUTE, CREATE TEMPORARY TABLES, CREATE ROUTINE, LOCK TABLES ON `qbixxassignment`.* TO 'qbixxassignment'@'%';

CREATE USER 'qbixxassignment_test'@'%' IDENTIFIED BY 'qbixxassignment_test';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES, CREATE, DROP, ALTER, INDEX, TRIGGER, REPLICATION CLIENT, REPLICATION SLAVE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE, RELOAD, SHUTDOWN, FILE, PROCESS, SUPER, CREATE TEMPORARY TABLES, LOCK TABLES, SHOW DATABASES, CREATE USER, GRANT OPTION, EVENT, CREATE TABLESPACE ON *.* TO 'qbixxassignment_test'@'%';

GRANT INDEX, INSERT, TRIGGER, DROP, EVENT, CREATE, ALTER, SHOW VIEW, ALTER ROUTINE, DELETE, REFERENCES, SELECT, GRANT OPTION, UPDATE, CREATE VIEW, EXECUTE, CREATE TEMPORARY TABLES, CREATE ROUTINE, LOCK TABLES ON `qbixxassignment_test`.* TO 'qbixxassignment_test'@'%';

FLUSH PRIVILEGES;
```
