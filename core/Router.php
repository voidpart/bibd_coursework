<?php

class Router
{
	public $routes = array();
	public $method = 'index';
	public $class = '';

	public function addRoute($url, $controller, $method = 'index')
	{
		$this->routes[] = array($url, $controller, $method);
	}

	public function route($url)
	{
		foreach ($this->routes as $value) {
			if($url == $value[0])
			{
				$this->class = $value[1];
				$this->method = $value[2];
				break;
			}
		}
	}

	public function getClass()
	{
		return $this->class;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getParams()
	{
		return array();
	}
}

?>