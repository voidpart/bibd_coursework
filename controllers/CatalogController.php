<?php

require(__DIR__.'/BaseController.php');

class CatalogController extends BaseController
{
	public function before($method, $params)
	{
		$res = parent::before($method, $params);
		if($res)
			return $res;

		$this->service = $this->app->makeService('Catalog');

		return false;
	}

	public function Index($params)
	{
		$categories = $this->service->getAllCategories();

		return $this->render('catalog/index', ['categories' => $categories]);
	}

	public function Category($params)
	{
		// echo $params['id'];
		$id = $params['id'];

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$products_per_page = 12;


		$products = $this->service->getProductsForCategoryId($id, ($page-1)*$products_per_page, $products_per_page);
		$category = $this->service->getCategoryById($id);
		$page_count = (int)($category['products_count'] / $products_per_page + 1);

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

		$product = $this->service->getProductById($id);

		return $this->render('catalog/product', ['product' => $product]);
	}

	public function Search($params)
	{
		$search = $_GET['search'];

		$products = $this->service->searchProducts($search);

		return $this->render('catalog/search', ['products' => $products, 'search' => $search]);
	}
}

?>