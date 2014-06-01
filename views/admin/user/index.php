<p><a href="<?php echo $this->app->urlFor('Admin/User/Add') ?>">Добавить пользователя</a></p>
<table>
<?php foreach($users as $user)
{?>
	<tr>
		<td>
			<?php
				$username = $user['username'];
				$url = $this->app->urlFor('Admin/User/Edit', ['id' => $user['id']]);
				$str = "<a href=\"$url\">$username</a>";
				echo $str;
			?>
		</td>
	</tr>
<?php }
?>