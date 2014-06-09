<h2>Добавить пользователя</h2>
<form method="POST">
	<div class="form-group">
    	<label>Имя пользователя</label>
    	<input type="text" name="username" class="form-control">
 	</div>
 	<div class="form-group">
    	<label for="formPrice">Пароль</label>
    	<input type="password" name="password" class="form-control">
 	</div>
	<div class="form-group">
    	<label><input type="checkbox" name="is_admin">Администратор</label>
 	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Создать</button>
	</div>
</form>