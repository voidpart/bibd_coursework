<html>
<head>
	<title>Hello world!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/bootstrap-theme.css">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/admin.css">
	<script src="<?php echo $this->app->url_prefix;?>/static/js/jquery.js"></script>
	<script src="<?php echo $this->app->url_prefix;?>/static/js/bootstrap.js"></script>
</head>
<body>
<div id="page">
	<div class="container">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo $this->app->url_prefix.'/' ?>">Сайт</a></li>
					<li><a href="<?php echo $this->app->urlFor('Admin/Catalog/Index') ?>">Каталог</a></li>
					<li><a href="<?php echo $this->app->urlFor('Admin/Order/Index') ?>">Заказы</a></li>
					<li><a href="<?php echo $this->app->urlFor('Admin/User/Index') ?>">Пользователи</a></li>
				</ul>
				<ul class="navbar-nav nav navbar-right">
					<li><a href="<?php echo $this->app->urlFor('Admin/Main/Index') ?>">Админ панель</a></li>
					<li><a href="<?php echo $this->app->urlFor('User/Logout') ?>">Выйти</a></li>
				</ul>
			</div>
		</nav>
		<div id="content" class="container-fluid">
		<?php echo $content; ?>
		</div>
		<!-- <div id="footer" class="container-fluid">
			<p class="text-center">
			(c) 2014
			</p>
		</div> -->
	</div>
</div>
</body>
</html>