CREATE DATABASE address_book;
USE address_book;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (id, username, password) VALUES ( 0, 'admin', 'admin');

CREATE TABLE contacts (
  id INT PRIMARY KEY,
  contact_number INT NOT NULL CHECK (LENGTH(contact_number) = 10),
  email VARCHAR(50) NOT NULL CHECK (email REGEXP '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE address (
  id INT PRIMARY KEY,
  building_number VARCHAR(10) NOT NULL,
  street_name VARCHAR(20),
  state VARCHAR(20) NOT NULL,
  pincode INT NOT NULL CHECK (LENGTH(pincode) = 6),
  country VARCHAR(20) NOT NULL,
  contact_id INT NOT NULL,
  FOREIGN KEY (contact_id) REFERENCES contacts(id)
);