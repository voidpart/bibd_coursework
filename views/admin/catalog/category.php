<h2><?php echo $category['title'] ?></h2>
<p><a href="<?php echo $this->app->urlFor('Admin/Catalog/CategoryEdit', ['id' => $category['id']]) ?>">Изменить</a></p>
<p><a href="<?php echo $this->app->urlFor('Admin/Catalog/ProductAdd') ?>">Добавить товар</a></p>
<ul>
<?php foreach($products as $product){
	$url = $this->app->urlFor('Admin/Catalog/ProductEdit', ['id' => $product['id']]);
	?>
	<li><a href="<?php echo $url ?>"> <?php echo $product['title']; ?></a></li>
<?php }?>
</ul>