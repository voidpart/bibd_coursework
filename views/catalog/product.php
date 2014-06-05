<?php
	$title = $product['title'];
	$description = $product['description'] ? $product['description'] : "Нет описания";
?>
<h2><?php echo $title ?></h2>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<img src="<?php echo $image_url; ?>" width="100%">
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<p>
		<?php echo $description ?>
		</p>
		<p>Стоимость:
		<?php echo $product['price'] ?>
		</p>
		<form action="<?php echo $this->app->urlFor('Basket/Add') ?>" method="POST">
			<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
			<input type="hidden" name="count" value="1">
			<button type="sumbit">Добавить в корзину</button>
		</form>
	</div>
</div>