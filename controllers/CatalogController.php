<?php

require(__DIR__.'/BaseController.php');

class CatalogController extends BaseController
{
	function __construct()
	{
		parent::__construct();
		$this->default_layout = 'layout';
	}

	public function Index($params)
	{
		$service = $this->app->makeService('Catalog');
		$categories = $service->getAllCategories();

		return $this->render('catalog/index', ['categories' => $categories]);
	}

	public function Category($params)
	{
		// echo $params['id'];
		$id = $params['id'];

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$products_per_page = 10;

		$service = $this->app->makeService('Catalog');

		$products = $service->getProductsForCategoryId($id, ($page-1)*$products_per_page, $products_per_page);
		$category = $service->getCategoryById($id);
		$page_count = $category['products_count'] / $products_per_page + 1;

		return $this->render('catalog/category', [
			'products' => $products, 
			'category' => $category, 
			'page' => $page,
			'page_count' => $page_count
		]);
	}

	public function Product($params)
	{
		$id = $params['id'];

		$service = $this->app->makeService('Catalog');

		$product = $service->getProductById($id);

		return $this->render('catalog/product', ['product' => $product]);
	}
}

?>