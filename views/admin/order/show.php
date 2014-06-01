<ul>
<li>ID: <?php echo $order['id'] ?></li>
<li>Сумма: <?php echo $order['products_sum_price'] ?></li>
<li>Время: <?php echo $order['time'] ?></li>
</ul>
<p>Товары:</p>
<table>
	<tr>
		<td>Наименование</td>
		<td>Кол-во</td>
		<td>Сумма</td>
	</tr>
<?php foreach ($products as $product) {?>
	<tr>
		<td><?php echo $product['title']; ?></td>
		<td><?php echo $product['count']; ?></td>
		<td><?php echo $product['sum_price']; ?></td>
	</tr>
<?php
}
?>
</table>