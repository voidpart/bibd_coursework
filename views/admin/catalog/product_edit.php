<?php
	$service = $this->app->makeService('Catalog');
	$categories = $service->getAllCategories();
?>
<form enctype="multipart/form-data"  method="POST">
	<p><input type="text" name="title" value="<?php echo $product['title'] ?>"></p>
	<p><textarea name="description"><?php echo $product['description'] ?></textarea></p>
	<p><input type="text" name="price" value="<?php echo $product['price'] ?>"></p>
	<p><input type="hidden" name="image" value="<?php echo $product['image'] ?>"></p>
	<p><select name="category_id">
		<?php
			foreach ($categories as $category) {
				$title = $category['title'];
				$id = $category['id'];
				echo "<option value=\"$id\">$title</option>";
			}
		?>
	</select></p>
	<?php
	if($product['image'])
	{
		$img = $image_url = $this->app->image_helper->getFileUrl($product['image']);
		echo "<p>Картинка</p><p><img width=\"300px\" src=\"$img\"></p>";
	}
	else
	{
		echo "<p>Нет картинки</p><p>";
	}
	?>
	<p>Загрузить новое изображение<input type="file" name="image_new"></p>
	<button type="submit">Сохранить</button>
</form>