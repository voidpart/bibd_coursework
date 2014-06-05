<?php

class Controller
{
	public $app;
	public $default_layout;
	
	function __construct() {
		
	}

	public function before($method, $params)
	{
		return false;
	}

	public function _call($method, $params)
	{
		$result = $this->before($method, $params);
		if($result)
			return $result;

		return $this->$method($params);
	}

	public function render($name,$params = array())
	{
		$layout = isset($params['layout']) ? $params['layout'] : $this->default_layout;
		
		if($layout)
			$view = $this->app->view_finder->findLayout($layout, $name);
		else
			$view = $this->app->view_finder->find($name);

		$view->app = $this->app;
		$view->controller = $this;

		echo $view->render($params);
	}

	public function redirect($url)
	{
		header('Location: '.$url);
		return True;
	}

	public function redirectPath($path, $params = array())
	{
		return $this->redirect($this->app->urlFor($path, $params));
	}

	public function redirectLocal($url)
	{
		return $this->redirect($this->app->url_prefix.'/'.$url);
	}
}

?>