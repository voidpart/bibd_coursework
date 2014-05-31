<?php

require(__DIR__.'/BaseController.php');

class CatalogController extends BaseController
{
	public function Index($params)
	{
		$service = $this->app->makeService('Catalog');
		$categories = $service->getAllCategories();

		return $this->render('catalog/index', ['categories' => $categories]);
	}

	public function Category($params)
	{
		$id = $_GET['id'];

		$page = isset($_GET['page']) ? $_GET['page'] : 1;

		$service = $this->app->makeService('Catalog');

		$products = $service->getProductsForCategoryId($id);

		return $this->render('catalog/category', ['products' => $products]);
	}

	public function Product($params)
	{
		$id = $_GET['id'];

		$service = $this->app->makeService('Catalog');

		$product = $service->getProductById($id);

		return $this->render('catalog/product', ['product' => $product]);
	}
}

?>