<?php
	$service = $this->app->makeService('Catalog');
	$categories = $service->getAllCategories();
?>
<form enctype="multipart/form-data" method="POST">
	<p><input type="text" name="title"></p>
	<p><textarea name="description"></textarea></p>
	<p><input type="text" name="price"></p>
	<p><select name="category_id">
		<?php
			foreach ($categories as $category) {
				$title = $category['title'];
				$id = $category['id'];
				echo "<option value=\"$id\">$title</option>";
			}
		?>
	</select></p>
	<p><input type="file" name="image"></p>
	<button type="submit">Сохранить</button>
</form>