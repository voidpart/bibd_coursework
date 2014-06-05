<h2><?php echo $category['title'] ?></h2>
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

<div class="text-center">
<ul class="pagination">

<?php
	if($page>1)
	{
		$prev_page = $page-1;
		echo "<li><a href=\"?page=$prev_page\">&laquo;</a></li>";
	} else {
		echo '<li class="disabled"><span>&laquo;</span></li>';
	}
	for($i=1;$i<=$page_count;$i++)
	{
		if($i === $page)
		{
			echo "<li class=\"active\"><span href=\"#\">$i</span></li>";
		} else {
			echo "<li><a href=\"?page=$i\">$i</a></li>";
		}
	}
	if($page < $page_count)
	{
		$next_page = $page+1;
		echo "<li><a href=\"?page=$next_page\">&raquo;</a></li>";
	} else {
		echo '<li class="disabled"><span>&raquo;</span></li>';
	}
?>
</ul>
</div>