<?php

/**
* 
*/
class ClassFinder
{
	public $directory = '';
	public $suffix = '';

	function __construct($dir, $suffix = '')
	{
		$this->directory = $dir;
		$this->suffix = $suffix;
	}

	public function find($class)
	{
		$segments = explode('/', $class);
		$classname = array_pop($segments).$this->suffix;
		if(!class_exists($classname))
		{
			$classpath = implode('/', $segments);
			require $this->directory."/$classpath/$classname.php";
		}
		return new $classname();
	}
}

?>