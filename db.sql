DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce
	CHARACTER SET 'utf8';

USE ecommerce;

CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(64) NOT NULL,
	password VARCHAR(64) NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE,
	PRIMARY KEY (id),
	UNIQUE(username)
);

CREATE TABLE categories(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(64) NOT NULL,
	title VARCHAR(64) NOT NULL,
	description TEXT NULL,
	PRIMARY KEY (id),
	UNIQUE(name)
);

CREATE TABLE products(
	id INT NOT NULL AUTO_INCREMENT,
	category_id INT NOT NULL,
	title VARCHAR(64) NOT NULL,
	description TEXT NULL,
	price DECIMAL(15, 2) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE orders(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	time TIMESTAMP,
	status ENUM('basket', 'order', 'processing', 'archive'),
	PRIMARY KEY (id)
);

CREATE TABLE orders_products(
	id INT NOT NULL AUTO_INCREMENT,
	order_id INT NOT NULL,
	product_id INT NOT NULL,
	count INT NOT NULL DEFAULT 1,
	PRIMARY KEY (id),
	UNIQUE(order_id, product_id)
);

INSERT INTO users(username, password) VALUES('h8x', '123');
INSERT INTO categories(id, name, title) VALUES(1, 'auto', 'Авто');
INSERT INTO products(id, category_id, title, price) VALUES(1, 1, 'Ford Mustang \'67', 1000);
INSERT INTO products(id, category_id, title, price) VALUES(2, 1, 'Shelby Cobra Concept', 5000);
INSERT INTO orders(id, user_id, status) VALUES(1,1, 'basket');
INSERT INTO orders_products(order_id, product_id) VALUES(1, 1);