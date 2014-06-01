<html>
<head>
	<title>Hello world!</title>
	<link rel="stylesheet" href="<?php echo $this->app->url_prefix;?>/static/css/main.css">
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