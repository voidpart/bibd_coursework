<?php

require(__DIR__.'/AdminBaseController.php');

class UserController extends AdminBaseController
{
	public $service;

	public function before($method, $params)
	{
		$res = parent::before($method, $params);
		if($res)
			return $res;

		$this->service = $this->app->makeService('User');
	}

	public function Index($params)
	{
		$users = $this->service->getUsers();

		return $this->render('admin/user/index', ['users' => $users]);
	}

	public function Edit($params)
	{
		$id = $params['id'];

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//var_dump($_POST);
			$user = array();
			$user['id'] = $id;
			$user['username'] = $_POST['username'];
			$user['password'] = $_POST['password'];
			$user['is_admin'] = isset($_POST['is_admin']);

			$this->service->updateUser($user);

			return $this->redirectPath('Admin/User/Index');
		}

		$user = $this->service->getUserById($id);
		return $this->render('admin/user/edit', ['user' => $user]);
	}

	public function Add($params)
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = array();
			$user['username'] = $_POST['username'];
			$user['password'] = $_POST['password'];
			$user['is_admin'] = isset($_POST['is_admin']);

			$this->service->addUser($user);

			return $this->redirectPath('Admin/User/Index');
		}

		return $this->render('admin/user/add');
	}

	public function Show($params)
	{
		$id = $params['id'];

		$user = $this->service->getUserById($id);

		return $this->render('admin/user/show', ['user' => $user]);
	}
}

?>