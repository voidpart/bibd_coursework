<h2>Корзина</h2>
<h3>Всего товаров: <?php echo $basket['products_count']; ?></h3>
<h4>Общая цена товаров в корзине: <?php echo $basket['products_sum_price']; ?></h4>
<ul>
<?php foreach($products as $product){?>
	<li><a href="#"> <?php echo $product['title']; ?></a> x <?php echo $product['count']; ?>
		= <?php echo $product['sum_price']; ?>
		<form action="<?php echo $this->app->urlFor('Basket/Delete'); ?>" method="POST">
			<input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
			<button type="submit">Удалить</button>
		</form>
	</li>
<?php }?>

<form action="<?php echo $this->app->urlFor('Order/MakeOrder'); ?>" method="GET">
	<button type="submit">Сделать заказ</button>
</form>

</ul>