<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Hello world!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/bootstrap-theme.css">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/main.css">
	<script src="<?php echo $this->app->url_prefix;?>/static/js/jquery.js"></script>
	<script src="<?php echo $this->app->url_prefix;?>/static/js/bootstrap.js"></script>
</head>
<body>
<div id="page" class="container">
	<div id="header" class="container-fluid">
		<div class="col-md-3">
			<!-- logo -->
		</div>
		<div class="col-md-5" id="searchbox">
			<form class="form-inline" action="<?php echo $this->app->urlFor('Catalog/Search') ?>">
				<input type="search" placeholder="Поиск" name="search" class="form-control">
				<button type="submit" class="btn btn-default">Найти</button>
			</form>
		</div>
		<div class="col-md-4" id="userbox">
			<?php include __DIR__."/_userbox.php"; ?>
		</div>
	</div>
	<nav class="navbar navbar-default" role="navigation">
		<div id="mainmenu" class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo $this->app->url_prefix?>/">Главная</a></li>
				<?php
					$service = $this->app->makeService('Catalog');
					$categories = $service->getAllCategories();
					foreach ($categories as $category) {
						$title = $category['title'];
						$url = $this->app->urlFor('Catalog/Category', ['id' => $category['id']]);
						echo "<li><a href=\"$url\">$title</a></li>";
					}
				?>
			</ul>
		</div>
	</nav>
	<div id="content" class="container-fluid">
	<?php echo $content; ?>
	</div>
	<div id="footer" class="container-fluid">
		<p class="text-center">
		(c) 2014
		</p>
	</div>
</div>
</body>
</html>
