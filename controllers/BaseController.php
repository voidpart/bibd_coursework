<?php

trait LoginMixin
{
	public function userLogin($user)
	{
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['is_admin'] = $user['is_admin'];
 	}

	public function userLogout()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['is_admin']);
	}

	public function isUserLogged()
	{
		return isset($_SESSION['user_id']);
	}

	public function userId()
	{
		return $_SESSION['user_id'];
	}

	public function isAdminLogged()
	{
		return $this->isUserLogged() && $_SESSION['is_admin'];
	}
}

class BaseController extends Controller
{
	use LoginMixin;

	function __construct() {
		$this->default_layout = 'layout';		
	}
}

?>