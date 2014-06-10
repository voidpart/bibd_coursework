<h2>Добавить пользователя</h2>
<form class="form-horizontal" method="POST">
	<div class="form-group">
		<label class="col-sm-2 control-label">Имя пользователя</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="username" placeholder="Имя пользователя">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">E-mail</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" name="email" placeholder="E-mail">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Пароль</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="password" placeholder="Пароль">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Имя</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="name" placeholder="Имя">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Фамилия</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="surname" placeholder="Фамилия">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Адрес</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="address" placeholder="Адрес">
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Администратор</label>
	    <div class="col-sm-10">
	      <input type="checkbox" name="is_admin">
	    </div>
	</div>
	<div class="form-group">
	      <button type="submit" class="btn btn-default">Создать</button>
	</div>
</form>