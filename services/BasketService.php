<?php 

class BasketService extends ModelService
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
}

?>