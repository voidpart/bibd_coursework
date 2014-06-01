<h2>Каталог</h2>
<ul>
<?php foreach($categories as $category){
	$url = $this->app->urlFor('Catalog/Category', ['id' => $category['id']]);
	?>
	<li><a href="<?php echo $url ?>"> <?php echo $category['title']; ?></a></li>
<?php }?>
</ul>