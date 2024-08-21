# PHP CRUD Create, edit, update and delete posts with MySQL database

> ## DB
```sql
CREATE TABLE data (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL
);
```
## to start server
```bash
docker-compose up
```
## to stop server
```bash
docker-compose down
```