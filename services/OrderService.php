<?php

class OrderService extends ModelService
{
	public function getBasketSummary($user_id)
	{
		$sql = "SELECT users.username,
		SUM(products.price * basket_products.count) AS 'products_sum_price',
		COUNT(basket_products.product_id) AS 'products_count'
		FROM basket_products
		LEFT JOIN users ON users.id = basket_products.user_id
		JOIN products ON products.id = basket_products.product_id
		WHERE basket_products.user_id = :user_id
		GROUP BY basket_products.user_id";

		$sth = $this->db->prepare($sql);
		$sth->execute(['user_id' => $user_id]);

		return $sth->fetch();
	}

	# value - array of (product_id, count)
	public function addToBasketValues($user_id, $values)
	{
		$product_id = NULL;
		$count = NULL;

		$sql = "INSERT INTO basket_products(user_id, product_id, count) VALUES(:user_id, :product_id, :count)";
		$sth = $this->db->prepare($sql);
		$sth->bindParam('user_id', $user_id, PDO::PARAM_INT);
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
		if(!is_array($products))
		{
			$products = array($products);
		}

		$inQuery = implode(',', array_fill(0, count($products), '?'));
		$sql = "DELETE FROM basket_products WHERE user_id = ? AND product_id IN (".$inQuery.")";
		$sth = $this->db->prepare($sql);
		$sth->execute(array_merge(array($user_id), $products));
	}

	public function getBasketProducts($user_id)
	{
		$sql = "SELECT basket_products.count,
		products.*,
		basket_products.count * products.price AS 'sum_price'
		FROM basket_products
		LEFT JOIN users ON users.id = basket_products.user_id
		JOIN products ON products.id = basket_products.product_id
		WHERE basket_products.user_id = :user_id";

		$sth = $this->db->prepare($sql);
		$sth->execute(['user_id' => $user_id]);

		return $sth->fetchAll();
	}

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