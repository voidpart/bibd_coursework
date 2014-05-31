<?php //var_dump($orders) ?>
<?php foreach($orders as $order){?>
	<li><?php echo $order['time'];?> x <?php echo $order['products_sum_price'];?> 
	</li>
<?php }?>