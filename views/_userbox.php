<?php

if ($this->controller->isUserLogged())
{
	$service = $this->app->makeService('User');
	$user = $service->getUserById($this->controller->userId());

	$service = $this->app->makeService('Basket');
	$basket = $service->getBasketSummary($this->controller->userId());
?>

<div class="row">
	<?php if($user['is_admin'])
	{
		?>
		<a href="<?php echo $this->app->urlFor('Admin/Main/Index') ?>">Админ панель</a> |
		<?php
	}
	?>
	<a href="<?php echo $this->app->urlFor('Basket/Index') ?>">Моя корзина</a> | 
	<a href="<?php echo $this->app->urlFor('Order/Index') ?>">Мои заказы</a> | 
	<a href="<?php echo $this->app->urlFor('User/Logout') ?>">Выйти</a>
</div>

<div class="row">
	<?php 
	if($basket)
		echo $basket['products_count']." товаров | ".$basket['products_sum_price']." руб.";
	else
		echo "Корзина пуста.";
	?>
</div>

<?php
}
else
{
?>

<div class="row">
	<a href="<?php echo $this->app->urlFor('User/Login') ?>">Войти</a> | 
	<a href="<?php echo $this->app->urlFor('User/Register') ?>">Зарегистрироваться</a>
</div>

<?php
}
?>