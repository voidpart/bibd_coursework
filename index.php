<?php
	session_name('bibd_ecommerce');
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

	$app->addRoute('', 'Catalog/Index');
	$app->addRoute('category', 'Catalog/Category');
	$app->addRoute('product', 'Catalog/Product');

	$app->addRoute('basket', 'Basket/Index');
	$app->addRoute('basket/delete', 'Basket/Delete');
	$app->addRoute('basket/add', 'Basket/Add');
	$app->addRoute('orders', 'Order/Index');
	$app->addRoute('orders/make', 'Order/MakeOrder');

	$app->addRoute('admin/login', 'Admin/Login/Index');
	$app->addRoute('admin/logout', 'Admin/Login/Logout');
	$app->addRoute('admin/', 'Admin/Main/Index');

	$app->addRoute('admin/orders', 'Admin/Order/Index');
	$app->addRoute('admin/orders/show', 'Admin/Order/Show');

	$app->addRoute('admin/users', 'Admin/User/Index');
	$app->addRoute('admin/users/show', 'Admin/User/Show');

	$app->dispatchRequest($_GET['q']);
?>