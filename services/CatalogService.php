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

	public function updateCategory($category)
	{
		$sql = "UPDATE categories SET
		title = :title,
		name = :name,
		description = :description
		WHERE id=:id";
		$sth = $this->db->prepare($sql);

		return $sth->execute($category);
	}

	public function updateProduct($product)
	{
		$sql = "UPDATE products SET
		title = :title,
		description = :description,
		price = :price,
		category_id = :category_id
		WHERE id=:id";
		$sth = $this->db->prepare($sql);

		$sth->execute($product);
	}

	public function addProduct($product)
	{
		$sql = "INSERT INTO products(title, description, price, category_id) VALUES
		(:title, :description, :price, :category_id)";
		$sth = $this->db->prepare($sql);

		$sth->execute($product);
	}

	public function addCategory($category)
	{
		$sql = "INSERT INTO categories(name, title, description) VALUES
		(:name, :title, :description)";
		$sth = $this->db->prepare($sql);

		$sth->execute($category);
	}
}

?>