<?php

class LayoutView extends View
{
	public $layout;

	function __construct($layout, $view)
	{
		parent::__construct($view);
		$this->layout = $layout;
	}

	public function render($vars = array())
	{
		$content = parent::render($vars);

		$layout = array();
		$layout['content'] = $content;

		return $this->includeFile($this->layout, $layout);
	}
}
?>