<div class="row">
<?php foreach($products as $product){
	$url = $this->app->urlFor('Catalog/Product', ['id' => $product['id']]);
	if($product['image'])
	{
		$image_url = $this->app->image_helper->getFileUrl($product['image']);
	} else {
		$image_url = "none.jpg";
	}
	?>

	<div class="col-lg-3 col-md-3 col-sm-6">
		<a href="<?php echo $url ?>"> <?php echo $product['title']; ?>
		<div class="imgbox">
		<img src="<?php echo $image_url; ?>" width="100%"></div>
		</a>

		<?php if($this->controller->isUserLogged()) {
			?>

			<p>
			<form action="<?php echo $this->app->urlFor("Basket/Add") ?>" method="POST">
				<div class="text-center">
					<?php echo $product['price'] ?> руб.
					<input type="hidden" name="count" value="1">
					<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
					<button type="submit">Добавить в корзину</button>
				</div>
			</form></p>

			<?php
		} else {
			echo "Войдите, что бы добавить в корзину";
		}
		?>
	</div>

<?php }?>
</div>