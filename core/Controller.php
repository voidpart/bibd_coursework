<?php

class Controller
{
	public $app;
	
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
		$view = new View($name);
		$view->app = $this->app;
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