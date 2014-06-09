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

	public function Register($params)
	{
		if($this->isUserLogged())
		{
			return $this->redirectLocal('');
		}

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$service = $this->app->makeService('User');
			$user = array();
			$user['username'] = $_POST['username'];
			$user['password'] = $_POST['password'];
			$user['is_admin'] = false;

			$id = $service->addUser($user);

			if($id)
			{
				$user['id'] = $id;
				$this->userLogin($user);
				return $this->redirectLocal('');
			}
			else
			{
				return $this->render('user/register', ['error' => 'Ошибка']);
			}
		}
		else
		{
			return $this->render('user/register');
		}
	}

	public function Login($params)
	{
		if($this->isUserLogged())
		{
			return $this->redirectLocal('');
		}

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$service = $this->app->makeService('User');
			$user = $service->checkUser($_POST['username'], $_POST['password']);
			
			if($user)
			{
				$this->userLogin($user);
				return $this->redirectLocal('');
			}
			else
			{
				return $this->render('user/login',['error' => 'Неправильное имя пользователя или пароль']);
			}
		}
		else
		{
			return $this->render('user/login');
		}
	}

	public function Logout($params)
	{
		$this->userLogout();
		return $this->redirectPath('User/Login');
	}
}

?>