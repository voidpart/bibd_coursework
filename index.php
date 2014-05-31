<?php
	session_start();
	
	require 'core/Application.php';

	$app = new Application();

	$app->addRoute('user', 'User');
	$app->addRoute('user/login', 'User', 'Login');
	$app->addRoute('user/logout', 'User', 'Logout');

	$app->dispatchRequest($_GET['q']);
?>