<?php
	if(isset($error))
	{
		echo "<p>$error</p>";
	}
?>
<form method="POST">
	<input type="text" name="username">
	<input type="password" name="password">
	<button type="submit">Войти</button>
</form>