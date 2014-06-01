<a href="<?php echo $this->app->urlFor('Admin/Catalog/CategoryAdd') ?>">Создать новую категорию</a>
<ul>

<?php
foreach ($categories as $category) {
	$title = $category['title'];
	$url = $this->app->urlFor('Admin/Catalog/Category', ['id' => $category['id']]);
	echo "<li><a href=\"$url\">$title</a></li>";
}

?>

</ul>