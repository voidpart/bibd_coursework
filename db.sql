DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(64) NOT NULL,
	password VARCHAR(64) NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE,
	PRIMARY KEY (id),
	UNIQUE(username)
);

DROP TABLE IF EXISTS categories;
CREATE TABLE categories(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(64) NOT NULL,
	title VARCHAR(64) NOT NULL,
	description TEXT NULL,
	PRIMARY KEY (id),
	UNIQUE(name)
);

DROP TABLE IF EXISTS products;
CREATE TABLE products(
	id INT NOT NULL AUTO_INCREMENT,
	category_id INT NOT NULL,
	title VARCHAR(64) NOT NULL,
	image VARCHAR(256) NULL,
	description TEXT NULL,
	price DECIMAL(15, 2) NOT NULL,
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS orders;
CREATE TABLE orders(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	time TIMESTAMP,
	status ENUM('order', 'processing', 'archive') NOT NULL DEFAULT 'order',
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS basket_products;
CREATE TABLE basket_products(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	product_id INT NOT NULL,
	count INT NOT NULL DEFAULT 1,
	PRIMARY KEY (id),
	UNIQUE(user_id, product_id)
);

DROP TABLE IF EXISTS order_products;
CREATE TABLE order_products(
	id INT NOT NULL AUTO_INCREMENT,
	order_id INT NOT NULL,
	product_id INT NOT NULL,
	count INT NOT NULL DEFAULT 1,
	PRIMARY KEY (id),
	UNIQUE(order_id, product_id)
);

INSERT INTO users(username, password, is_admin) VALUES('h8x', '123', TRUE);
INSERT INTO categories(id, name, title) VALUES(1, 'auto', 'Авто');
INSERT INTO products(id, category_id, title, price) VALUES(1, 1, 'Ford Mustang \'67', 1000);
INSERT INTO products(id, category_id, title, price) VALUES(2, 1, 'Shelby Cobra Concept', 5000);
INSERT INTO orders(id, user_id, status) VALUES(1,1, 'order');
INSERT INTO order_products(order_id, product_id) VALUES(1, 1);
INSERT INTO basket_products(user_id, product_id) VALUES(1, 2);

INSERT INTO products(category_id, title, price) VALUES(1, 'Pontiac Firebird', 1999.99);
INSERT INTO products(category_id, title, price) VALUES(1, 'Lamborghini Venono', 40000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Dodge Charger', 4000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Dodge Challenger', 4000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Aston Martin DB9', 4000);
INSERT INTO products(category_id, title, price) VALUES(1, 'BWM M6', 4000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Bugatti Veyron', 400000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Chevrolet Corvette', 50000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Chevrolet Comaro', 40000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Ferarri Enzo', 4000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Pagani Zonda F', 4000);
INSERT INTO products(category_id, title, price) VALUES(1, 'Mitsubishi Lancer Evolution 10', 90000);