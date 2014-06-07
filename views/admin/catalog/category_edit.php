<h2>Изменить категорию: <?php echo $category['title'] ?></h2>
<form method="POST">
	<div class="form-group">
    	<label for="formTitle">Имя</label>
    	<input type="text" name="title" class="form-control" id="formTitle" value="<?php echo $category['title'] ?>">
 	</div>
	<div class="form-group">
    	<label for="formDescription">Описание</label>
    	<textarea class="form-control" id="formDescription" name="description"><?php echo $category['description'] ?></textarea>
 	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Создать</button>
	</div>
</form>