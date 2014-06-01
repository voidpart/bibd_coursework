<?php
	$service = $this->app->makeService('Catalog');
	$categories = $service->getAllCategories();
?>
<form method="POST">
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
	<button type="submit">Сохранить</button>
</form>