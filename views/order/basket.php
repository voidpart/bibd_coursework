<?php echo $this->app->urlFor('Order/Basket'); ?>
<?php //var_dump($products); ?>
<h3>Всего товаров: <?php echo $basket['products_count']; ?></h3>
<h4>Сумма: <?php echo $basket['products_sum_price']; ?></h4>
<ul>
<?php foreach($products as $product){?>
	<li><a href="#"> <?php echo $product['title']; ?></a> x <?php echo $product['count']; ?>
		= <?php echo $product['sum_price']; ?>
		<form action="/~h8x/catalog/basket/delete" method="POST">
			<input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
			<button type="submit">Remove</button>
		</form>
	</li>
<?php }?>

<form action="/~h8x/catalog/basket/add" method="POST">
	<input type="text" name="product_id" value="1">
	<input type="number" name="count" value="1">
	<button type="submit">Add</button>
</form>

<form action="/~h8x/catalog/basket/order" method="GET">
	<button type="submit">Order</button>
</form>

</ul>