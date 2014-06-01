<?php

class Router
{
	public $routes = array();
	public $method = 'index';
	public $class = '';

	public function addRoute($url, $path)
	{
		$this->routes[] = array(strtolower($url), $path);
	}

	public function route($url)
	{
		$url = strtolower($url);
		foreach ($this->routes as $value) {
			if($url == $value[0])
			{
				$path = explode('/', $value[1]);
				$this->method = array_pop($path);
				$this->class = implode('/', $path);
				break;
			}
		}
	}

	public function urlFor($path, $params)
	{
		foreach ($this->routes as $value) {
			if($path == $value[1])
			{
				return $value[0];
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