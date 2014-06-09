<h2>Изменить пользователя: <?php echo $user['username'] ?></h2>
<form method="POST">
	<div class="form-group">
    	<label>Имя пользователя</label>
    	<input type="text" name="username" class="form-control" value="<?php echo $user['username'] ?>">
 	</div>
 	<div class="form-group">
    	<label>Пароль</label>
    	<input type="password" name="password" class="form-control" value="<?php echo $user['password'] ?>">
 	</div>
	<div class="form-group">
    	<label><input type="checkbox" name="is_admin" <?php if($user['is_admin']) echo"checked"?>> Администратор</label>
 	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Сохранить</button>
	</div>
</form>