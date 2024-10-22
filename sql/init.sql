CREATE DATABASE address_book;
USE address_book;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (id, username, password) VALUES ( 0, 'admin', 'admin');

CREATE TABLE tags (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    user_id INT NOT NULL DEFAULT 1,

    FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
);

INSERT INTO tags (name) VALUES ('FAVORITE');
INSERT INTO tags (name) VALUES ('FRIEND');
INSERT INTO tags (name) VALUES ('FAMILY');

CREATE TABLE contacts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(15) NOT NULL CHECK (LENGTH(phone_number) = 10),
    email VARCHAR(100) NOT NULL CHECK (email LIKE '%@%.%'),

    building_number VARCHAR(10) NOT NULL,
    street VARCHAR(100),
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    zip_code VARCHAR(10) NOT NULL CHECK (LENGTH(zip_code) = 6),
    
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);