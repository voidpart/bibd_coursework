<?php

/**
* 
*/
class View
{
	public $name;
	public $app;
	function __construct($name)
	{
		$this->name = $name;
	}

	public function render($vars = array())
	{
		foreach ($vars as $key => $value) {
			$$key = $value;
		}
		$vars = NULL;
		ob_start();
		include('views/'.$this->name.'.php');
		$content = ob_get_contents();
		ob_clean();
		return $content;
	}
}
?>