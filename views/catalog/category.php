<h2><?php echo $category['title'] ?></h2>
<ul>
<?php foreach($products as $product){
	$url = $this->app->urlFor('Catalog/Product', ['id' => $product['id']]);
	?>
	<li><a href="<?php echo $url ?>"> <?php echo $product['title']; ?>
	<img src="<?php echo $this->app->image_helper->getFileUrl($product['image']); ?>" width="300px">
	</a></li>
<?php }?>
</ul>
<p>
<?php
	for($i=1;$i<=$page_count;$i++)
	{
		if($i === $page)
		{
			echo "<span>$i</span>";
		} else {
			echo "<a href=\"?page=$i\">$i</a>";
		}
	}
?>
</p>