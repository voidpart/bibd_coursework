<?php
	include __DIR__.'/config.php';

	if(isset($config['session_name']))
	{
		session_name($config['session_name']);
	}
	session_start();
	
	require 'core/Application.php';

	$app = new Application($config);

	$app->addRoute('user', 'User/Index');
	$app->addRoute('user/login', 'User/Login');
	$app->addRoute('user/logout', 'User/Logout');

	$app->addRoute('category/:id', 'Catalog/Category');
	$app->addRoute('product/:id', 'Catalog/Product');
	$app->addRoute('search', 'Catalog/Search');
	$app->addRoute('', 'Catalog/Index');

	$app->addRoute('basket', 'Basket/Index');
	$app->addRoute('basket/delete', 'Basket/Delete');
	$app->addRoute('basket/add', 'Basket/Add');
	$app->addRoute('orders', 'Order/Index');
	$app->addRoute('orders/make', 'Order/MakeOrder');

	$app->addRoute('admin/login', 'Admin/Login/Index');
	$app->addRoute('admin/logout', 'Admin/Login/Logout');
	$app->addRoute('admin/', 'Admin/Main/Index');

	$app->addRoute('admin/orders', 'Admin/Order/Index');
	$app->addRoute('admin/orders/:id', 'Admin/Order/Show');

	$app->addRoute('admin/users', 'Admin/User/Index');
	$app->addRoute('admin/users/add', 'Admin/User/Add');
	$app->addRoute('admin/users/:id', 'Admin/User/Show');
	$app->addRoute('admin/users/:id/edit', 'Admin/User/Edit');

	$app->addRoute('admin/catalog', 'Admin/Catalog/Index');
	$app->addRoute('admin/catalog/category/add', 'Admin/Catalog/CategoryAdd');
	$app->addRoute('admin/catalog/category/:id', 'Admin/Catalog/Category');
	$app->addRoute('admin/catalog/category/:id/edit', 'Admin/Catalog/CategoryEdit');
	$app->addRoute('admin/catalog/product/add', 'Admin/Catalog/ProductAdd');
	$app->addRoute('admin/catalog/product/:id', 'Admin/Catalog/ProductEdit');
	// $app->addRoute('admin/catalog/product/:id/edit', 'Admin/Catalog/ProductEdit');

	$app->dispatchRequest($_GET['q']);
?>