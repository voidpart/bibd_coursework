<h2>Мои заказы</h2>
<table class="table">
	<tr>

		<td>ID</td>
		<td>Кол-во товаров</td>
		<td>Сумма</td>
		<td>Время</td>

	</tr>
<?php foreach($orders as $order){?>
	<tr>

		<td><?php echo $order['id'] ?></td>
		<td><?php echo $order['products_count'] ?></td>
		<td><?php echo $order['products_sum_price'] ?></td>
		<td><?php echo $order['time'] ?></td>

	</tr>
<?php }?>

</table>