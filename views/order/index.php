<h2>Мои заказы</h2>
<table>
	<tr>

		<td>ID</td>
		<td>Сумма</td>
		<td>Время</td>

	</tr>
<?php foreach($orders as $order){?>
	<tr>

		<td><?php echo $order['id'] ?></td>
		<td><?php echo $order['products_sum_price'] ?></td>
		<td><?php echo $order['time'] ?></td>

	</tr>
<?php }?>

</table>