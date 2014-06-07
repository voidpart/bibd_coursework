<h2>Заказ: <?php echo $order['id'] ?></h2>
<dl>
	<dt>Пользователь</dt>
	<dd><a href="#"><?php echo $order['username'] ?></a></dd>
	<dt>Сумма заказа</dt>
	<dd><?php echo $order['products_sum_price'] ?></dd>
	<dt>Время заказа</dt>
	<dd><?php echo $order['time'] ?></dd>
</dl>

<table class="table">
	<tr>
		<th>ID товара</th>
		<th>Наименование</th>
		<th>Кол-во</th>
		<th>Сумма</th>
	</tr>

<?php foreach ($products as $product) {?>
	<tr>
		<td><?php echo $product['id']; ?></td>
		<td>
			<a href="#">
			<?php echo $product['title']; ?>
			</a>
		</td>
		<td><?php echo $product['count']; ?></td>
		<td><?php echo $product['sum_price']; ?></td>
	</tr>
<?php
}
?>
</table>