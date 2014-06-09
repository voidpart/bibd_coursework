<h2>Категория: <?php echo $category['title'] ?></h2>
<a href="<?php echo $this->app->urlFor('Admin/Catalog/ProductAdd', $category) ?>">Добавить товар</a>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Действия</th>
	</tr>

<?php
foreach ($products as $product) {
?>
	
	<tr>
		<td><?php echo $product['id'] ?></td>
		<td>
			<a href="#">
				<?php echo $product['title'] ?>
			</a>
		</td>
		<td>
			<a href="<?php echo $this->app->urlFor('Admin/Catalog/ProductEdit', $product) ?>">Изменить</a>
			<a href="<?php echo $this->app->urlFor('Admin/Catalog/ProductDelete', $product) ?>">Удалить</a>
		</td>
	</tr>

<?php
}
?>

</table>