<?php
	session_start();
	
	require 'core/Application.php';

	$app = new Application();

	$app->addRoute('user', 'User');
	$app->addRoute('user/login', 'User', 'Login');
	$app->addRoute('user/logout', 'User', 'Logout');
	$app->addRoute('catalog', 'Catalog');
	$app->addRoute('catalog/category', 'Catalog', 'Category');
	$app->addRoute('catalog/product', 'Catalog', 'Product');
	$app->addRoute('catalog/basket', 'Order', 'Basket');
	$app->addRoute('catalog/basket/delete', 'Order', 'BasketDelete');
	$app->addRoute('catalog/basket/add', 'Order', 'BasketAdd');
	$app->addRoute('catalog/basket/order', 'Order', 'BasketOrder');
	$app->addRoute('catalog/orders', 'Order', 'Index');

	$app->dispatchRequest($_GET['q']);
?>