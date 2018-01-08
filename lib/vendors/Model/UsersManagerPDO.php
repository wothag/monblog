<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 21:55
 */

namespace vendors\Model;

use \Entity\Users;


class UsersManagerPDO extends UsersManager
{
	/**
	 * Get a user by id.
	 * @param int $id
	 * @return mixed
	 */
	public function find($id)
	{
		$q = $this->dao->prepare('SELECT * FROM user WHERE id = :id');
		$q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
		$q->execute();
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');
		return $q->fetch();
	}
	/**
	 * Get a user by the username
	 * @param string $username
	 * @return mixed
	 */
	public function findByUsername($username)
	{
		$q = $this->dao->prepare('SELECT * FROM user WHERE username = :username');
		$q->bindValue(':username', $username);
		$q->execute();
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');
		return $q->fetch();
	}
	/**
	 * Check if exist a user in BDD
	 * @param object $user
	 * @return mixed
	 */
	public function checkUserForRegister($id, $username)
	{
		$q = $this->dao->prepare('SELECT * FROM user WHERE username = :username AND id != :id');
		$q->bindValue('username', $username);
		$q->bindValue('id', $id);
		$q->execute();
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');
		if(empty($q->fetch()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/**
	 * Get all users in the DB
	 * @return array
	 */
	public function findAll()
	{
		$q = $this->dao->query('SELECT * FROM user ORDER BY role, username ');
		$q->execute();
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');
		return $users = $q->fetchAll();
	}
	/**
	 * Return a list for all Users
	 * @param int $debut
	 * @param int $limite
	 * @return array List Users Objects
	 */
	public function getList($debut = -1, $limite = -1)
	{
		$sql = "SELECT * FROM user";
		if($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT ' . (int) $limite . ' OFFSET ' . (int) $debut;
		}
		$requete = $this->dao->query($sql);

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');
		$usersList = $requete->fetchAll();
		foreach ($usersList as $user)
		{
			$user->setInscription(new \DateTime($user->inscription()));
		}
		$requete->closeCursor();
		return $usersList;
	}
	/**
	 * Count the Users
	 * @return mixed
	 */
	public function count()
	{
		return $this->dao->query('SELECT COUNT(*) FROM user ')->fetchColumn();
	}
	/**
	 * Add a user un the Db
	 * @param \Entity\Users $user
	 */
	protected function insert(Users $user)
	{
		$q = $this->dao->prepare('INSERT INTO user SET username = :username, email = :email, password = :password, role = :role, inscription = NOW() ');
		$q->bindValue(':username', $user->username());
		$q->bindValue(':email', $user->email());
		$q->bindValue(':password', $user->password());
		$q->bindValue(':role', $user->role());
		$q->execute();
	}
	/**
	 * Update un users
	 * @param \Entity\Users $user
	 */
	protected function update(Users $user)
	{
		$q = $this->dao->prepare('UPDATE user SET id = :id, username = :username, email = :email, password = :password, role = :role, inscription = :inscription WHERE id = :id');
		$q->bindValue(':username', $user->username());
		$q->bindValue(':email', $user->email());
		$q->bindValue(':password', $user->password());
		$q->bindValue(':role', $user->role());
		$q->bindValue(':inscription', $user->inscription());
		$q->bindValue(':id', $user->id());
		$q->execute();
	}
	/**
	 * Delete user by id
	 * @param int $id
	 */
	public function delete($id)
	{
		$this->dao->exec('DELETE FROM user WHERE id = '.(int) $id);
	}
	public function switchUserRole( $id )
	{
		$user = $this->find($id);
		if($user->role() == 'ADMIN')
		{
			$user->setRole('USER');
			$this->save($user);
		}
		elseif($user->role() == 'USER')
		{
			$user->setRole('ADMIN');
			$this->save($user);
			$_SESSION['role'] = 'ADMIN';
		}
	}
}
