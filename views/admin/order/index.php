<table>
<?php foreach($orders as $order)
{?>
	<tr>
		<td><a href="<?php echo $this->app->urlFor('Admin/Order/Show',['id' => $order['id']]); ?>">
		<?php echo $order['id'];?></a>
		</td>
		<td>
			<a href="<?php echo $this->app->urlFor('Admin/User/Show',['id' => $order['user_id']]); ?>">
		<?php echo $order['username'];?></a>
		</td>
		<td>
			<?php echo $order['time']; ?>
		</td>
		<td>
			<?php echo $order['products_sum_price']; ?>
		</td>
	</tr>
<?php }
?>