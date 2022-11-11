# PHP CRUD Create, edit, update and delete posts with MySQL database

> ## DB
First, create a database named crud. In the crud database, create a table called info.
```sql
CREATE TABLE data (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
);
```
