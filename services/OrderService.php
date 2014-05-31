<?php

class OrderService extends ModelService
{
	public function getOrCreateBasket($user_id)
	{
		$order = $this->getOrdersForUser($user_id, "= 'basket'");

		if(!$order)
		{
			$sql = "INSERT INTO orders(user_id, status) VALUES(:user_id, 'basket')";
			$insert = $this->db->prepare($sql);
			$insert->execute(['user_id' => $user_id]);

			$order = $this->getOrdersForUser($user_id, "= 'basket'");
		}

		return $order[0];
	}

	# value - array of (product_id, count)
	public function addToBasketValues($user_id, $values)
	{
		$basket = $this->getOrCreateBasket($user_id);
		$order_id = $basket['id'];
		$product_id = NULL;
		$count = NULL;

		$sql = "INSERT INTO orders_products(order_id, product_id, count) VALUES(:order_id, :product_id, :count)";
		$sth = $this->db->prepare($sql);
		$sth->bindParam('order_id', $order_id, PDO::PARAM_INT);
		$sth->bindParam('product_id', $product_id, PDO::PARAM_INT);
		$sth->bindParam('count', $count, PDO::PARAM_INT);

		foreach ($values as $value) {
			$product_id = $value['product_id'];
			$count = $value['count'];
			$sth->execute();
		}
	}

	public function addToBasket($user_id, $product_id, $count)
	{
		$this->addToBasketValues($user_id, array(['product_id' => $product_id, 'count' => $count]));
	}

	public function removeFromBasket($user_id, $products)
	{
		$basket = $this->getOrCreateBasket($user_id);
		if(!is_array($products))
		{
			$products = array($products);
		}

		$inQuery = implode(',', array_fill(0, count($products), '?'));
		$sql = "DELETE FROM orders_products WHERE order_id = ? AND product_id IN (".$inQuery.")";
		$sth = $this->db->prepare($sql);
		$sth->execute(array_merge(array($basket['id']), $products));
	}

	public function getOrderProducts($order_id)
	{
		$sql = "SELECT products.*, orders_products.count,
				products.price*orders_products.count AS 'sum_price'
				FROM products, orders_products 
				WHERE products.id = orders_products.product_id
				AND orders_products.order_id = :order_id";
		$sth = $this->db->prepare($sql);
		$sth->execute(['order_id' => $order_id]);

		return $sth->fetchAll();
	}

	public function getBasketProducts($user_id)
	{
		$basket = $this->getOrCreateBasket($user_id);

		return $this->getOrderProducts($basket['id']);
	}

	public function getOrdersForUser($user_id, $status_where = "<> 'basket'")
	{
		$sql = "SELECT orders.*,
				COUNT(orders_products.id) AS 'products_count',
				SUM(orders_products.count * products.price) AS 'products_sum_price'
				FROM orders
				LEFT OUTER JOIN orders_products ON orders_products.order_id = orders.id
				LEFT JOIN products ON orders_products.product_id = products.id
				WHERE orders.user_id = :user_id
				AND orders.status $status_where
				GROUP BY orders.id";
		$query = $this->db->prepare($sql);
		$query->execute(['user_id' => $user_id]);
		$orders = $query->fetchAll();

		return $orders;
	}

	public function makeOrderFromBasket($user_id)
	{
		$basket = $this->getOrCreateBasket($user_id);

		$sql = "UPDATE orders SET status = 'order' WHERE id = :id";
		$sth = $this->db->prepare($sql);
		$sth->execute(['id' => $basket['id']]);
	}
}

?>