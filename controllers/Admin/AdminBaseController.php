<?php

require(__DIR__.'/../BaseController.php');

trait AdminLoginMixin
{
	public function adminLogin($user)
	{
		$_SESSION['admin_id'] = $user['id'];
 	}

	public function adminLogout()
	{
		unset($_SESSION['admin_id']);
	}

	public function isAdminLogged()
	{
		return isset($_SESSION['admin_id']);
	}

	public function userId()
	{
		return $_SESSION['admin_id'];
	}
}

class AdminBaseController extends BaseController
{
	use AdminLoginMixin;

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