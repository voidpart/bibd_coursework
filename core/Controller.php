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