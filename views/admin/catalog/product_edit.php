<?php
	$service = $this->app->makeService('Catalog');
	$categories = $service->getAllCategories();
?>
<h2>Изменить товар: <?php echo $product['title'] ?></h2>
<form enctype="multipart/form-data" method="POST">
	<div class="form-group">
    	<label for="formTitle">Имя</label>
    	<input type="text" name="title" class="form-control" id="formTitle" value="<?php echo $product['title'] ?>">
 	</div>
 	<div class="form-group">
    	<label for="formPrice">Цена</label>
    	<input type="number" name="price" class="form-control" id="formPrice"  value="<?php echo $product['price'] ?>">
 	</div>
	<div class="form-group">
    	<label for="formDescription">Описание</label>
    	<textarea class="form-control" id="formDescription" name="description"><?php echo $product['description'] ?></textarea>
 	</div>
 	<div class="form-group">
 		<label>Категория</label>
 		<select name="category_id" class="form-control">
		<?php
			foreach ($categories as $category) {
				$title = $category['title'];
				$id = $category['id'];
				echo "<option value=\"$id\">$title</option>";
			}
		?>
		</select>
	</div>
 	<div class="form-group">
    	<label for="formImage">Изображение</label>
    	<input type="hidden" name="image" value="<?php echo $product['image'] ?>">
    	<input type="file" class="form-control" id="formImage" name="image_new">
 	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Сохранить</button>
	</div>
</form>