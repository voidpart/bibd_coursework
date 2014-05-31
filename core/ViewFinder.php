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
		return new View($dir.$name);
	}
}

?>