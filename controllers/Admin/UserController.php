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

	public function Show($params)
	{
		$id = $_GET['id'];

		$user = $this->service->getUserById($id);

		return $this->render('admin/user/show', ['user' => $user]);
	}
}

?>