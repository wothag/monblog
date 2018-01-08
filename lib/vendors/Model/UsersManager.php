<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 21:53
 */

namespace vendors\Model;
use \Entity\Users;
use \OCFram\Manager;


abstract class UsersManager extends Manager
{

	abstract protected function insert(Users $user);

	public function save(Users $user)
	{
		if ($user->isValid())
		{
			$user->isNew() ? $this->insert($user) : $this->update($user);
		}
		else
		{
			throw new \RuntimeException('L\'utilisateur doit être validée pour être enregistrée');
		}
	}

	abstract public function find($id);

	abstract public function findByUsername($username);

	abstract public function findAll();

	abstract public function count();

	abstract protected function update(Users $user);

	abstract public function delete($id);

	abstract public function switchUserRole($id);

	abstract public function checkUserForRegister($id, $username);
}