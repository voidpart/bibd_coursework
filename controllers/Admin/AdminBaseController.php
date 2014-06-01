<?php

require(__DIR__.'/../BaseController.php');

class AdminBaseController extends BaseController
{
	function __construct() {
		parent::__construct();
		$this->default_layout = "admin/layout";
	}

	public function before($method, $params)
	{
		$res = parent::before($method, $params);
		if($res)
			return $res;

		if(!$this->isAdminLogged())
		{
			return $this->redirectPath('Admin/Login/Index');
		}

		return false;
	}
}