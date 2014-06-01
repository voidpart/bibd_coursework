<?php

require(__DIR__.'/AdminBaseController.php');

class OrderController extends AdminBaseController
{
	public $service;

	public function before($method, $params)
	{
		$res = parent::before($method, $params);
		if($res)
			return $res;

		$this->service = $this->app->makeService('Order');
	}

	public function Index($params)
	{
		$orders = $this->service->getOrders();

		return $this->render('admin/order/index', ['orders' => $orders]);
	}

	public function Show($params)
	{
		$id = $params['id'];

		$order = $this->service->getOrderById($id);
		$products = $this->service->getOrderProducts($id);

		return $this->render('admin/order/show', ['order' => $order, 'products' => $products]);
	}
}

?>