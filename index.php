<?php
	session_start();
	
	require 'core/Application.php';

	$config = [
		'url_prefix' => '/~h8x',
		'db_constring' => 'mysql:host=localhost;dbname=ecommerce',
		'db_name' => 'ecommerce'
	];

	$app = new Application($config);

	$app->addRoute('user', 'User/Index');
	$app->addRoute('user/login', 'User/Login');
	$app->addRoute('user/logout', 'User/Logout');

	$app->addRoute('catalog', 'Catalog/Index');
	$app->addRoute('catalog/category', 'Catalog/Category');
	$app->addRoute('catalog/product', 'Catalog/Product');

	$app->addRoute('catalog/basket', 'Order/Basket');
	$app->addRoute('catalog/basket/delete', 'Order/BasketDelete');
	$app->addRoute('catalog/basket/add', 'Order/BasketAdd');
	$app->addRoute('catalog/basket/order', 'Order/BasketOrder');
	$app->addRoute('catalog/orders', 'Order/Index');

	$app->dispatchRequest($_GET['q']);
?>