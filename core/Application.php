<?php

require 'core/Router.php';
require 'core/Controller.php';
require 'core/View.php';
require 'core/LayoutView.php';
require 'core/ClassFinder.php';
require 'core/ModelService.php';
require 'core/ViewFinder.php';
require 'core/UploadManager.php';

class Application
{
	protected $router;
	protected $controller_finder;
	public $view_finder;
	protected $service_finder;
	protected $db;
	public $url_prefix;
	public $image_helper;

	function __construct($config = array())
	{
		$this->url_prefix = isset($config['url_prefix']) ? $config['url_prefix'] : '';

		$base_dir = isset($config['base_dir']) ? $config['base_dir'] : '';
		$service_dir = isset($config['service_dir']) ? $config['service_dir'] : $base_dir.'services/';
		$view_dir = isset($config['view_dir']) ? $config['view_dir'] : $base_dir.'views/';
		$controller_dir = isset($config['controller_dir']) ? $config['controller_dir'] : $base_dir.'controllers/';
		$images_dir = isset($config['images_dir']) ? $config['images_dir'] : $base_dir.'media/';
		$images_url = isset($config['images_url']) ? $config['images_url'] : $images_dir;
		
		$this->router = new Router();
		$this->controller_finder = new ClassFinder($controller_dir, 'Controller');
		$this->service_finder = new ClassFinder($service_dir, 'Service');
		$this->view_finder = new ViewFinder($view_dir);
		$this->image_helper = new UploadManager($images_dir, $this->url_prefix.'/'.$images_url);

		$constring = isset($config['db_constring']) ? $config['db_constring'] : '';
		$dbuser = isset($config['db_user']) ? $config['db_user'] : '';
		$dbpass = isset($config['db_pass']) ? $config['db_pass'] : '';
		$this->db = new PDO($constring, $dbuser, $dbpass);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function addRoute($url, $controller, $method = 'Index')	
	{
		return $this->router->addRoute($url, $controller, $method);
	}

	public function urlFor($path, $params=array())
	{
		return $this->url_prefix.'/'.$this->router->urlFor($path, $params);
	}

	public function makeView($name)
	{
		return $this->view_finder->find($name);
	}

	public function makeController($name)
	{
		$obj = $this->controller_finder->find($name);
		$obj->app = $this;
		return $obj;
	}

	public function makeService($name)
	{
		$obj = $this->service_finder->find($name);
		$obj->db = $this->db;
		return $obj;
	}

	public function dispatchRequest($url)
	{
		$this->router->route($url);

		$class = $this->router->getClass();
		$method = $this->router->getMethod();
		$params = $this->router->getParams();

		$controller = $this->makeController($class);
		$controller->_call($method, $params);
	}
}

?>