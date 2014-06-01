<?php

require(__DIR__.'/BaseController.php');

class BasketController extends BaseController
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

		$this->service = $this->app->makeService('Basket');
		$this->default_layout = 'layout';

		return false;
	}

	public function Index($params)
	{
		$basket = $this->service->getBasketSummary($this->user_id);
		$products = $this->service->getBasketProducts($this->user_id);

		return $this->render('basket/index', ['products' => $products, 'basket' => $basket]);
	}

	public function Add($params)
	{
		$product_id = $_POST['product_id'];
		$count = $_POST['count'];

		$this->service->addToBasket($this->user_id, $product_id, $count);

		return $this->redirectPath('Basket/Index');
	}

	public function Delete($params)
	{
		$product_id = $_POST['product_id'];

		$this->service->removeFromBasket($this->user_id, $product_id);

		return $this->redirectPath('Basket/Index');
	}
}