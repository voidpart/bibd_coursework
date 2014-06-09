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
		category_id = :category_id,
		image = :image
		WHERE id=:id";
		$sth = $this->db->prepare($sql);

		$sth->execute($product);
	}

	public function addProduct($product)
	{
		$sql = "INSERT INTO products(title, description, price, category_id, image) VALUES
		(:title, :description, :price, :category_id, :image)";
		$sth = $this->db->prepare($sql);

		$sth->execute($product);
	}

	public function addCategory($category)
	{
		$sql = "INSERT INTO categories(title, description) VALUES
		(:title, :description)";
		$sth = $this->db->prepare($sql);

		$sth->execute($category);
	}


	public function searchProducts($search)
	{
		$sql = "SELECT * FROM products WHERE title LIKE :title";

		$sth = $this->db->prepare($sql);

		$sth->execute(['title' => "%$search%"]);

		return $sth->fetchAll();	
	}

	public function exportXml()
	{
		$categories = $this->getAllCategories();

		$x=new XMLWriter();
		$x->openMemory();
		$x->startDocument('1.0','UTF-8');
		$x->startElement('catalog');

		foreach ($categories as $category) {
			$products = $this->getProductsForCategoryId($category['id']);

			$x->startElement('category');
			$x->writeAttribute('id', $category['id']);
			
			$x->startElement('title');
			$x->text($category['title']);
			$x->endElement();

			$x->startElement('description');
			$x->text($category['description']);
			$x->endElement();

			$x->startElement('products');
			
			foreach ($products as $product) {
				$x->startElement('product');
				$x->writeAttribute('id', $product['id']);
				
				$x->startElement('title');
				$x->text($product['title']);
				$x->endElement();

				$x->startElement('description');
				$x->text($product['description']);
				$x->endElement();

				$x->startElement('price');
				$x->text($product['price']);
				$x->endElement();

				$x->startElement('image');
				$x->text($product['image']);
				$x->endElement();

				$x->endElement();
			}

			$x->endElement();
		}

		$x->endElement();
		$x->endDocument();
		return $x->outputMemory();
	}

	public function deleteProductById($id)
	{
		$sql = "DELETE FROM products WHERE id = :id";

		$sth = $this->db->prepare($sql);

		return $sth->execute(['id' => $id]);	
	}

	public function deleteProductsByCategoryId($id)
	{
		$sql = "DELETE FROM products WHERE category_id = :id";

		$sth = $this->db->prepare($sql);

		return $sth->execute(['id' => $id]);
	}

	public function deleteCategoryById($id)
	{
		$sql = "DELETE FROM categories WHERE id = :id";

		$sth = $this->db->prepare($sql);

		$sth->execute(['id' => $id]);

		return $this->deleteProductsByCategoryId($id);
	}
}

?>