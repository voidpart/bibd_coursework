<?php

class OrderService extends ModelService
{
	public function makeOrderFromBasket($user_id)
	{
		$sql = "INSERT INTO orders(user_id) VALUES (:user_id)";
		$sth = $this->db->prepare($sql);
		$sth->execute(['user_id' => $user_id]);
		
		$id = $this->db->lastInsertId();

		$sql = "INSERT INTO orders_products(order_id, product_id, count)
		SELECT :order_id, product_id, count FROM basket_products
		WHERE basket_products.user_id = :user_id";

		$sth = $this->db->prepare($sql);
		$sth->execute(['order_id' => $id, 'user_id' => $user_id]);

		$sql = "DELETE FROM basket_products WHERE user_id = :user_id";

		$sth = $this->db->prepare($sql);
		$sth->execute(['user_id' => $user_id]);
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

	public function getOrdersForUser($user_id)
	{
		$sql = "SELECT orders.*,
				COUNT(orders_products.id) AS 'products_count',
				SUM(orders_products.count * products.price) AS 'products_sum_price'
				FROM orders
				LEFT OUTER JOIN orders_products ON orders_products.order_id = orders.id
				JOIN products ON orders_products.product_id = products.id
				WHERE orders.user_id = :user_id
				GROUP BY orders.id";
		$query = $this->db->prepare($sql);
		$query->execute(['user_id' => $user_id]);
		$orders = $query->fetchAll();

		return $orders;
	}

	public function getOrderById($id)
	{
		$sql = "SELECT orders.*,
		users.username,
		COUNT(orders_products.id) AS 'products_count',
		SUM(orders_products.count * products.price) AS 'products_sum_price'
		FROM orders
		LEFT JOIN users ON orders.user_id = users.id
		LEFT OUTER JOIN orders_products ON orders_products.order_id = orders.id
		LEFT JOIN products ON orders_products.product_id = products.id
		WHERE orders.id = :id
		GROUP BY orders.id
		ORDER BY orders.time";

		$sth = $this->db->prepare($sql);
		$sth->execute(['id' => $id]);

		return $sth->fetch();
	}

	public function getOrders()
	{
		$sql = "SELECT orders.*,
		users.username,
		COUNT(orders_products.id) AS 'products_count',
		SUM(orders_products.count * products.price) AS 'products_sum_price'
		FROM orders
		LEFT JOIN users ON orders.user_id = users.id
		LEFT OUTER JOIN orders_products ON orders_products.order_id = orders.id
		LEFT JOIN products ON orders_products.product_id = products.id
		GROUP BY orders.id
		ORDER BY orders.time";

		$sth = $this->db->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}

?>