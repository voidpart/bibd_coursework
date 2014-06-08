DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(32) NOT NULL,
	password VARCHAR(32) NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE,
	PRIMARY KEY (id),
	UNIQUE(username)
);

DROP TABLE IF EXISTS categories;
CREATE TABLE categories(
	id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(32) NOT NULL,
	description TEXT NULL,
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS products;
CREATE TABLE products(
	id INT NOT NULL AUTO_INCREMENT,
	category_id INT NOT NULL,
	title VARCHAR(256) NOT NULL,
	image VARCHAR(256) NULL,
	description TEXT NULL,
	price DECIMAL(15, 0) NOT NULL,
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

INSERT INTO users(username, password, is_admin) VALUES('root', 'root', TRUE);

INSERT INTO categories(id, title, description) VALUES(1, 'Фоторамки','Фоторамки всегда были одним из лучших подарков и весьма удачным дополнением в интерьере. Это настоящий дизайнерский арт-объект. Такая рамка, например на полке, будет создавать ощущения законченной композиции каждый раз, когда вы будете просто смотреть в его сторону. Великолепный подарок для тех, кто ценит свою индивидуальность, творческих личностей, и всех любителей фото.');

INSERT INTO products(category_id, title, price, image) VALUES(1, 'Rose B&W Assorted', '250000', 'frame_1.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(1, 'Python', '280000', 'frame_2.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(1, 'Shiny Square', '230000', 'frame_3.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(1, 'Карта мира', '230000', 'frame_4.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(1, 'DISCO', '230000', 'frame_5.jpg');

INSERT INTO categories(id, title, description) VALUES(2, 'Статуэтки', 'Одни покупают статуэтки, чтобы украсить интерьер комнаты, офиса, другие приобретают их в качестве романтического или делового подарка. Эти небольшие стильные фигурки многообразны, они могут рассказать о чувствах, настроении, вкусе человека. Каждая статуэтка по-своему подчеркнёт изысканность обстановки, создавая уютную атмосферу. Статуэтки, особенно хорошо подобранные, станут прекрасным украшением любого интерьера. Такая коллекция статуэток в гостиной или кабинете свидетельствует о безупречном вкусе хозяев. При этом ценность фигурок с годами только возрастает, и чем дальше – тем больше. Тем, кто хочет купить что-то необычайно красивое и оригинальное, рекомендуем обратить внимание на наши статуэтки. Каждая из них – это маленькое произведение искусства, которое обязательно найдет себе достойное место в любом интерьере. ');

INSERT INTO products(category_id, title, price, image) VALUES(2, 'AURORA', '380000', 'stat_1.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(2, 'OFELIA', '380000', 'stat_2.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(2, 'Krokodil Silver Big', '750000', 'stat_3.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(2, 'Krokodil Silver Small', '450000', 'stat_4.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(2, 'Rhino Antique', '790000', 'stat_5.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(2, 'Iterna ceramics A', '990000', 'stat_6.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(2, 'Iterna ceramics K', '590000', 'stat_7.jpg');

INSERT INTO categories(id, title, description) VALUES(3, 'Картины', 'Дизайн интерьера - это не просто перепланировка или ремонт. Дом - это живой организм, он должен чувствовать Вашу искреннюю заботу и внимание. И тогда он отблагодарит, подарив душевное тепло и много часов хорошего настроения.Иногда не хватаем мелочи, последнего завершающегося штриха.  Добавьте его, и вы удивитесь как ваша квартира сразу преобразиться, оживет. И конечно, тут не дело в дорогой мебели или домашнем кинотеарте. Просто нужна капелька души. Декор дама, интерьера - это всегда сугубо личное, интимное. Живые цветы лучше пластмассовых, а картина, впитавшая энергетику природы и человека - лучший завершающий штрих вашего декора.');

INSERT INTO products(category_id, title, price, image) VALUES(3, '"Бамбук и орхидеи"', '279000', 'pict_1.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(3, '"Цветок"', '279000', 'pict_2.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(3, '"Орхидея"', '279000', 'pict_3.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(3, '"Бамбук и орхидеи"', '357000', 'pict_4.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(3, '"Утро"', '279000', 'pict_5.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(3, '"Цветок"', '279000', 'pict_6.jpg');

INSERT INTO categories(id, title, description) VALUES(4, 'Вазы', 'Стильные вазы – ключевые точки домашнего интерьера. Они притягивают взгляды, способны мгновенно поменять атмосферу в комнате и придать её пространству рабочий или романтический облик. Всё зависит от того, куда мы поместим настольную или напольную вазу, что в неё поставим, какую роль ей предназначим. Но, главное, насколько продуман, оригинален и привлекателен дизайн вазы и сколько любви и вкуса вложил в свой труд её создатель. Вазы на многое способны: быть чудесным фоном для растений и безделушек, подарками на праздники и без повода, выражением любви и признательности, готовые принять одинокий цветок и роскошный букет, создать необходимую атмосферу в пустой комнате ради отдыха и размышлений или фейерверком красок наполнить праздничную гостиную. Словом, вазы могут почти всё, что касается обустроенного уютного и радостного жития-бытия.');

INSERT INTO products(category_id, title, price, image) VALUES(4, 'FLASH Yellow', '480000', 'vase_1.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(4, 'FLASH Green', '480000', 'vase_2.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(4, 'FLASH Light Green', '480000', 'vase_3.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(4, 'ESTRO Small', '480000', 'vase_4.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(4, 'ESTRO Big', '999990', 'vase_5.jpg');

INSERT INTO categories(id, title) VALUES(5, 'Часы');

INSERT INTO products(category_id, title, price, image) VALUES(5, 'Clock Black Sensation', '499000', 'watch_1.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(5, 'Ostalgie', '550000', 'watch_2.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(5, 'Classic White', '550000', 'watch_3.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(5, 'Twelve to Eleven', '650000', 'watch_4.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(5, 'Classic Numbers', '650000', 'watch_5.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(5, 'Globe', '650000', 'watch_6.jpg');
INSERT INTO products(category_id, title, price, image) VALUES(5, 'Версаль', '650000', 'watch_7.jpg');