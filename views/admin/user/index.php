<table>
<?php foreach($users as $user)
{?>
	<tr>
		<td>
			<?php
				$username = $user['username'];
				$url = $this->app->urlFor('Admin/User/Show')."?id=".$user['id'];
				$str = "<a href=\"$url\">$username</a>";
				echo $str;
			?>
		</td>
	</tr>
<?php }
?>