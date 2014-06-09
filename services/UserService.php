<?php

class UserService extends ModelService
{
	public function checkUser($username, $password)
	{
		$user = $this->getUserByName($username);
		if($user)
		{
			//if(crypt($password, 'abc123') == $user['password'])
			if($password == $user['password'])
			{
				return $user;
			}
		}
		return false;
	}

	public function checkAdmin($username, $password)
	{
		$user = $this->getUserByName($username);
		if($user)
		{
			//if(crypt($password, 'abc123') == $user['password'])
			if($password == $user['password'] && $user['is_admin'])
			{
				return $user;
			}
		}
		return false;
	}

	public function getUserById($id)
	{
		$sth = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$sth->execute(['id' => $id]);
		return $sth->fetch();
	}

	public function getUserByName($name)
	{
		$sth = $this->db->prepare("SELECT * FROM users WHERE username = :username");
		$sth->execute(['username' => $name]);
		return $sth->fetch();
	}

	public function getUsers()
	{
		$sth = $this->db->prepare("SELECT * FROM users");
		$sth->execute();
		return $sth->fetchAll();
	}

	public function updateUser($user)
	{
		$sql = "UPDATE users SET
		username = :username,
		password = :password,
		is_admin = :is_admin
		WHERE id=:id";
		$sth = $this->db->prepare($sql);

		return $sth->execute($user);
	}

	public function addUser($user)
	{
		$sql = "INSERT INTO users(username, password, is_admin) VALUES
		(:username, :password, :is_admin)";
		$sth = $this->db->prepare($sql);

		if($sth->execute($user))
			return $this->db->lastInsertId();
		else
			return false;
	}

	public function deleteUserById($id)
	{
		$sql = "DELETE FROM users WHERE id = :id";

		$sth = $this->db->prepare($sql);

		return $sth->execute(['id' => $id]);
	}
}

?>