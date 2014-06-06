<h2><?php echo $category['title'] ?></h2>

<?php include __DIR__.'/'.'_products_grid.php'; ?>

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