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
	title VARCHAR(64) NOT NULL,
	description TEXT NULL,
	PRIMARY KEY (id)
);

INSERT INTO users(username, password) VALUES('h8x', '123');