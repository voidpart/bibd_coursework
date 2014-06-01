<?php

/**
* 
*/
class ViewFinder
{
	public $dir;
	function __construct($dir)
	{
		$this->dir = $dir;
	}

	public function find($name)
	{
		return new View($this->dir.$name);
	}

	public function findLayout($layout, $name)
	{
		return new LayoutView($this->dir.$layout, $this->dir.$name);
	}
}

?>