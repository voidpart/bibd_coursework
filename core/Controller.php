<?php

class Controller
{
	public $app;
	
	public function _call($method, $params)
	{
		return $this->$method($params);
	}

	public function render($name,$params = array())
	{
		$view = new View($name);
		echo $view->render($params);
	}

	public function redirect($url)
	{
		header('Location: '.$url);
		return;
	}

	public function redirectLocal($url)
	{
		return $this->redirect($_SERVER['CONTEXT_PREFIX'].'/'.$url);
	}
}

?>