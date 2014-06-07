<?php

require(__DIR__.'/AdminBaseController.php');

class CatalogController extends AdminBaseController
{
	public $service;

	public function before($method, $params)
	{
		$res = parent::before($method, $params);
		if($res)
			return $res;

		$this->service = $this->app->makeService('Catalog');
	}

	public function Index($params)
	{
		$categories = $this->service->getAllCategories();
		return $this->render('admin/catalog/index', ['categories' => $categories]);
	}

	public function Category($params)
	{
		$id = $params['id'];

		$category = $this->service->getCategoryById($id);
		$products = $this->service->getProductsForCategoryId($id);

		return $this->render('admin/catalog/category', ['category' => $category,'products' => $products]);
	}

	public function CategoryEdit($params)
	{
		$id = $params['id'];

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$category = array();
			$category['id'] = $id;
			$category['name'] = $_POST['name'];
			$category['title'] = $_POST['title'];
			$category['description'] = $_POST['description'];

			$this->service->updateCategory($category);

			return $this->redirectPath('Admin/Catalog/Category', ['id' => $id]);
		}

		$category = $this->service->getCategoryById($id);

		return $this->render('admin/catalog/category_edit', ['category' => $category]);
	}

	public function ProductEdit($params)
	{
		$id = $params['id'];

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$product = array();
			$product['id'] = $id;
			$product['title'] = $_POST['title'];
			$product['description'] = $_POST['description'];
			$product['price'] = $_POST['price'];
			$product['category_id'] = $_POST['category_id'];
			$product['image'] = $_POST['image'];

			if(isset($_FILES['image_new']) && $_FILES['image_new']['tmp_name'])
			{	
				$product['image'] = $this->app->image_helper->saveFile($_FILES['image_new']);
			}

			$this->service->updateProduct($product);

			return $this->redirectPath('Admin/Catalog/Category', ['id' => $product['category_id']]);
		}


		$product = $this->service->getProductById($id);

		return $this->render('admin/catalog/product_edit', ['product' => $product]);
	}

	public function ProductAdd($params)
	{
		$category_id = $params['id'];
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$product = array();
			$product['title'] = $_POST['title'];
			$product['description'] = $_POST['description'];
			$product['price'] = $_POST['price'];
			$product['category_id'] = $category_id;
			$product['image'] = $this->app->image_helper->saveFile($_FILES['image']);

			$this->service->addProduct($product);

			return $this->redirectPath('Admin/Catalog/Category', ['id' => $product['category_id']]);
		}

		return $this->render('admin/catalog/product_add');
	}

	public function CategoryAdd($params)
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$category = array();
			$category['name'] = $_POST['name'];
			$category['title'] = $_POST['title'];
			$category['description'] = $_POST['description'];

			$this->service->addCategory($category);

			return $this->redirectPath('Admin/Catalog/Index');
		}

		return $this->render('admin/catalog/category_add');
	}


	public function ExportXml()
	{
		$xml = $this->service->exportXml();

		header('Content-type: text/xml; charset=utf-8');
		echo $xml;

		return true;
	}
}

?>