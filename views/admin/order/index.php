<table>
<?php foreach($orders as $order)
{?>
	<tr>
		<td><a href="<?php echo $this->app->urlFor('Admin/Order/Show')."?id=".$order['id']; ?>">
		<?php echo $order['id'];?></a>
		</td>
		<td>
			<?php echo $order['username']; ?>
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