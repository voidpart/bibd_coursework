<?php

/**
* 
*/
class CatalogService extends ModelService
{
	public function getProductsForCategoryId($category_id, $start = NULL, $count = 10)
	{
		$sql = "SELECT * FROM products WHERE category_id = :category_id";
		if($start !== NULL)
		{
			$sql .= " LIMIT $start, $count";
		}
		$sth = $this->db->prepare($sql);
		$sth->execute(['category_id' => $category_id]);

		return $sth->fetchAll();
	}

	public function getProductsCount($category_id = NULL)
	{
		$sql = "SELECT COUNT(*) FROM products";
		if($category_id !== NULL)
		{
			$sql .= " WHERE category_id = :category_id";
		}
		$sth = $this->db->prepare($sql);
		$sth->execute(['category_id' => $category_id]);

		return $sth->fetchColumn();
	}

	public function getProductById($id)
	{
		$sql = "SELECT * FROM products WHERE id = :id";
		$sth = $this->db->prepare($sql);
		$sth->execute(['id' => $id]);

		return $sth->fetch();
	}

	public function getCategoryById($id)
	{
		$sql = "SELECT categories.*,
		COUNT(products.id) as 'products_count'
		FROM categories
		LEFT JOIN products ON categories.id = products.category_id
		WHERE categories.id = :id
		";
		$sth = $this->db->prepare($sql);
		$sth->execute(['id' => $id]);

		return $sth->fetch();
	}

	public function getAllCategories()
	{
		$sql = "SELECT * FROM categories";
		return $this->db->query($sql)->fetchAll();
	}
}

?>