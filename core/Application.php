<?php

require 'core/Router.php';
require 'core/Controller.php';
require 'core/View.php';
require 'core/ClassFinder.php';
require 'core/ModelService.php';
require 'core/ViewFinder.php';

class Application
{
	protected $router;
	protected $controller_finder;
	protected $view_finder;
	protected $service_finder;
	protected $db;
	public $url_prefix;

	function __construct($config = array())
	{
		$base_dir = isset($config['base_dir']) ? $config['base_dir'] : './';
		$service_dir = isset($config['service_dir']) ? $config['service_dir'] : $base_dir.'services/';
		$view_dir = isset($config['view_dir']) ? $config['view_dir'] : $base_dir.'views/';
		$controller_dir = isset($config['controller_dir']) ? $config['controller_dir'] : $base_dir.'controllers/';
		
		$this->router = new Router();
		$this->controller_finder = new ClassFinder($controller_dir, 'Controller');
		$this->service_finder = new ClassFinder($service_dir, 'Service');
		$this->view_finder = new ViewFinder($view_dir);

		$this->url_prefix = isset($config['url_prefix']) ? $config['url_prefix'] : '';

		$constring = isset($config['db_constring']) ? $config['db_constring'] : '';
		$dbname = isset($config['db_name']) ? $config['db_name'] : '';
		$this->db = new PDO($constring, $dbname);
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