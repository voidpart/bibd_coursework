<form method="POST">
	<p><input type="text" name="name" value="<?php echo $category['name'] ?>"></p>
	<p><input type="text" name="title" value="<?php echo $category['title'] ?>"></p>
	<p><textarea name="description"><?php echo $category['description'] ?></textarea></p>
	<button type="submit">Сохранить</button>
</form>