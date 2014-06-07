<h2>Добавить товар</h2>
<form enctype="multipart/form-data" method="POST">
	<div class="form-group">
    	<label for="formTitle">Имя</label>
    	<input type="text" name="title" class="form-control" id="formTitle">
 	</div>
 	<div class="form-group">
    	<label for="formPrice">Цена</label>
    	<input type="number" name="price" class="form-control" id="formPrice">
 	</div>
	<div class="form-group">
    	<label for="formDescription">Описание</label>
    	<textarea class="form-control" id="formDescription" name="description"></textarea>
 	</div>
 	<div class="form-group">
    	<label for="formImage">Изображение</label>
    	<input type="file" class="form-control" id="formImage" name="image">
 	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Создать</button>
	</div>
</form>