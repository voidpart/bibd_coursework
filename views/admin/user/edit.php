<h2>Изменить пользователя: <?php echo $user['username'] ?></h2>

<form class="form-horizontal" method="POST">
	<div class="form-group">
		<label class="col-sm-2 control-label">Имя пользователя</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="username" placeholder="Имя пользователя"  value="<?php echo $user['username'] ?>">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">E-mail</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" name="email" placeholder="E-mail"  value="<?php echo $user['email'] ?>">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Пароль</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="password" placeholder="Пароль"  value="<?php echo $user['password'] ?>">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Имя</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="name" placeholder="Имя" value="<?php echo $user['name'] ?>">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Фамилия</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="surname" placeholder="Фамилия" value="<?php echo $user['surname'] ?>">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Адрес</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="address" placeholder="Адрес" value="<?php echo $user['address'] ?>">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Администратор</label>
	    <div class="col-sm-10">
	      <input type="checkbox" name="is_admin" <?php if($user['is_admin']) echo"checked"?>>
	    </div>
	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Сохранить</button>
	</div>
</form>