<?php
	$service = $this->app->makeService('Catalog');
	$categories = $service->getAllCategories();
?>
<form method="POST">
	<p><input type="text" name="title" value="<?php echo $product['title'] ?>"></p>
	<p><textarea name="description"><?php echo $product['description'] ?></textarea></p>
	<p><input type="text" name="price" value="<?php echo $product['price'] ?>"></p>
	<p><select name="category_id">
		<?php
			foreach ($categories as $category) {
				$title = $category['title'];
				$id = $category['id'];
				echo "<option value=\"$id\">$title</option>";
			}
		?>
	</select></p>
	<button type="submit">Сохранить</button>
</form>