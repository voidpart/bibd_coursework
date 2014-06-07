<h2>Каталог</h2>
<a href="<?php echo $this->app->urlFor('Admin/Catalog/CategoryAdd') ?>">Создать новую категорию</a>
<a href="<?php echo $this->app->urlFor('Admin/Catalog/Export') ?>">Экспорт в xml</a>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Действия</th>
	</tr>

<?php
foreach ($categories as $category) {
?>
	
	<tr>
		<td><?php echo $category['id'] ?></td>
		<td>
			<a href="<?php echo $this->app->urlFor('Admin/Catalog/Category', $category) ?>">
				<?php echo $category['title'] ?>
			</a>
		</td>
		<td>
			<a href="<?php echo $this->app->urlFor('Admin/Catalog/CategoryEdit', $category) ?>">Изменить</a>
			<a href="#">Удалить</a>
		</td>
	</tr>

<?php
}
?>

</table>