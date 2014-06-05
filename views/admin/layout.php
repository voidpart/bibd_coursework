<html>
<head>
	<title>Hello world!</title>
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/bootstrap-theme.css">
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/main.css">
	<script src="<?php echo $this->app->url_prefix;?>/static/js/jquery.js"></script>
	<script src="<?php echo $this->app->url_prefix;?>/static/js/bootstrap.js"></script>
</head>
<body>
<div id="page">
	<div id="header">

	<a href="<?php echo $this->app->urlFor('Admin/Catalog/Index') ?>">Catalog</a>
<a href="<?php echo $this->app->urlFor('Admin/User/Index');?>">Users</a>
<a href="<?php echo $this->app->urlFor('Admin/Order/Index');?>">Orders</a>

	</div>
	<div id="content">
	<?php echo $content; ?>
	</div>
</div>
</body>
</html>