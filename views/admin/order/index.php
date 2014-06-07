<h2>Заказы</h2>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Пользователь</th>
		<th>Кол-во товаров</th>
		<th>Сумма</th>
		<th>Действия</th>
	</tr>

<?php
foreach ($orders as $order) {
?>
	
	<tr>
		<td><?php echo $order['id'] ?></td>
		<td>
			<a href="#">
				<?php echo $order['username'] ?>
			</a>
		</td>
		<td>
			<?php echo $order['products_count'] ?>
		</td>
		<td>
			<?php echo $order['products_sum_price'] ?>
		</td>
		<td>
			<a href="<?php echo $this->app->urlFor('Admin/Order/Show', $order); ?>">Посмотреть</a>
		</td>
	</tr>

<?php
}
?>

</table>