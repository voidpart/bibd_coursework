<?php

require(__DIR__.'/BaseController.php');

class OrderController extends BaseController
{
	function __construct() {
		$this->default_layout = 'layout';		
	}
	
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

	public function Index($params)
	{
		$orders = $this->service->getOrdersForUser($this->user_id);
		$basket = $this->app->makeService('Basket')->getBasketSummary($this->user_id);

		return $this->render('order/index', ['orders' => $orders, 'basket' => $basket]);
	}

	public function MakeOrder($params)
	{
		$this->service->makeOrderFromBasket($this->user_id);

		return $this->redirectPath('Order/Index');
	}
}