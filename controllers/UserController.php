<?php

require(__DIR__.'/BaseController.php');

class UserController extends BaseController
{
	public function Index($params)
	{
		if(!isset($_SESSION['user_id']))
		{
			return $this->redirectPath('User/Login');
		}

		$service = $this->app->makeService('User');
		$user = $service->getUserById($_SESSION['user_id']);

		return $this->render('user/index', ['user' => $user]);
	}

	public function Login($params)
	{
		if(isset($_SESSION['user_id']))
		{
			return $this->redirectLocal('/user');
		}
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$service = $this->app->makeService('User');
			$user = $service->checkUser($_POST['username'], $_POST['password']);
			
			if($user)
			{
				$_SESSION['user_id'] = $user['id'];
				return $this->redirectPath('User/Index');
			}
			else
			{
				return $this->render('user/login',['error' => 'Wrong name or password']);
			}
		}
		else
		{
			return $this->render('user/login');
		}
	}

	public function Logout($params)
	{
		unset($_SESSION['user_id']);
		return $this->redirectPath('User/Login');
	}
}

?>