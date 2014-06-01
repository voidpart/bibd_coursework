<form method="POST">
	<p><input type="text" name="username" value="<?php echo $user['username'] ?>"></p>
	<p><input type="password" name="password" value="<?php echo $user['password'] ?>"></p>
	<p>Admin: <input type="checkbox" name="is_admin" <?php echo $user['is_admin'] ? "checked" : "" ?>></p>
	<button type="submit">Сохранить</button>
</form>