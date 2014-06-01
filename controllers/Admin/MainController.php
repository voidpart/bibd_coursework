<?php

require(__DIR__.'/AdminBaseController.php');

class MainController extends AdminBaseController
{
	public function Index($params)
	{
		return $this->render('admin/index');
	}
}

?>