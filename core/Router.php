<?php

class Router
{
	public $routes = array();
	public $method = 'index';
	public $class = '';
	public $params = array();

	public function addRoute($url, $path)
	{
		$this->routes[] = array(strtolower($url), $path);
	}

	public function route($url)
	{
		$url = strtolower($url);
		// echo $url."<br>";
		foreach ($this->routes as $value) {
			// echo $value[0]."<br>";
			$regex = preg_quote($value[0], '/');
			$regex = '/^'.preg_replace('/\\\:(\w+)/i', '(?<$1>\w+)', $regex).'$/i';
			// echo $regex."<br>";
			$matches = array();
			if(preg_match($regex, $url, $matches))
			{
				$path = explode('/', $value[1]);
				$this->method = array_pop($path);
				$this->class = implode('/', $path);
				$this->params = $matches;
				break;
			}
		}
	}

	public function urlFor($path, $params)
	{
		foreach ($this->routes as $value) {
			if($path == $value[1])
			{
				$url = $value[0];
				foreach ($params as $key => $value) {
					$url = preg_replace("/:$key/i", $value, $url);
				}
				return $url;
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
		return $this->params;
	}
}

?>