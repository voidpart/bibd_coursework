<h2>Пользователи</h2>
<a href="<?php echo $this->app->urlFor('Admin/User/Add') ?>">Добавить нового пользователя</a>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Действия</th>
	</tr>

<?php
foreach ($users as $user) {
?>
	
	<tr>
		<td><?php echo $user['id'] ?></td>
		<td>
			<a href="#">
				<?php echo $user['username'] ?>
			</a>
		</td>
		<td>
			<a href="<?php echo $this->app->urlFor('Admin/User/Edit', $user) ?>">Изменить</a>
			<a href="<?php echo $this->app->urlFor('Admin/User/Delete', $user) ?>">Удалить</a>
		</td>
	</tr>

<?php
}
?>
</table>