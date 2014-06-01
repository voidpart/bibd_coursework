<?php

/**
* 
*/
class View
{
	public $file;
	public $app;
	function __construct($file)
	{
		$this->file = $file;
	}

	protected function includeFile($file, $vars)
	{
		foreach ($vars as $key => $value) {
			$$key = $value;
		}

		$vars = NULL;
		ob_start();
		include($file.'.php');
		$content = ob_get_contents();
		ob_clean();

		return $content;
	}

	public function render($vars = array())
	{
		return $this->includeFile($this->file, $vars);
	}
}
?>