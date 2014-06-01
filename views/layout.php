<html>
<head>
	<title>Hello world!</title>
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/main.css">
</head>
<body>
<div id="page">
	<div id="header">

	<?php
		$url = $this->app->urlFor('Catalog/Index');
		echo "<p><a href=\"$url\">Каталог</a></p>";
		if(isset($_SESSION['user_id']))
		{
			$user_id = $_SESSION['user_id'];
			$service = $this->app->makeService('User');
			$user = $service->getUserById($user_id);
			echo "Вы вошли как ".$user['username'];
			$url = $this->app->urlFor('User/Logout');
			echo "<a href=\"$url\">Выйти</a>";
			$url = $this->app->urlFor('Basket/Index');
			echo "<p><a href=\"$url\">Корзина</a></p>";
			$url = $this->app->urlFor('Order/Index');
			echo "<p><a href=\"$url\">Мои заказы</a></p>";
		}
		else
		{
			$url = $this->app->urlFor('User/Login');
			echo "<a href=\"$url\">Войти</a>";
		}
	?>

	</div>
	<div id="content">
	<?php echo $content; ?>
	</div>
</div>
</body>
</html>