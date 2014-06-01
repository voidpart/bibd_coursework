<?php

require(__DIR__.'/AdminBaseController.php');

class LoginController extends BaseController
{
	use AdminLoginMixin;

	public function Index($params)
	{
		$error = NULL;

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$service = $this->app->makeService('User');
			$user = $service->checkAdmin($username, $password);
			if($user)
			{
				$this->adminLogin($user);
				return $this->redirectPath('Admin/Main/Index');
			}
			else 
			{
				$error = "Wrong password or username!";
			}
		}

		return $this->render('admin/login', ['error' => $error]);
 	}

 	public function Logout($params)
 	{
 		$this->adminLogout();
 		return $this->redirectPath('Admin/Login/Index');
 	}
}