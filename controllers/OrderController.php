<?php

require(__DIR__.'/BaseController.php');

class OrderController extends BaseController
{
	public $user_id;
	public $service;

	public function before($method, $params)
	{
		if(!isset($_SESSION['user_id']))
		{
			return $this->redirectLocal('/user/login');
		}
		$this->user_id = $_SESSION['user_id'];

		$this->service = $this->app->makeService('Order');

		return false;
	}

	public function Basket($params)
	{
		$basket = $this->service->getOrCreateBasket($this->user_id);
		$products = $this->service->getOrderProducts($basket['id']);

		return $this->render('order/basket', ['products' => $products, 'basket' => $basket]);
	}

	public function Index($params)
	{
		$orders = $this->service->getOrdersForUser($this->user_id);
		$basket = $this->service->getOrCreateBasket($this->user_id);

		return $this->render('order/index', ['orders' => $orders, 'basket' => $basket]);
	}

	public function BasketOrder($params)
	{
		$this->service->makeOrderFromBasket($this->user_id);

		return $this->redirectLocal('/catalog/basket');
	}

	public function BasketAdd($params)
	{
		$product_id = $_POST['product_id'];
		$count = $_POST['count'];

		$this->service->addToBasket($this->user_id, $product_id, $count);

		return $this->redirectLocal('/catalog/basket');
	}

	public function BasketDelete($params)
	{
		$product_id = $_POST['product_id'];

		$this->service->removeFromBasket($this->user_id, $product_id);

		return $this->redirectLocal('/catalog/basket');
	}
}