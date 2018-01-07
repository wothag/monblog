<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 02:56
 */


namespace Entity;
use \OCFram\Entity;
class Users extends Entity
{

	protected $id;

	protected $username;

	protected $email;

	protected $password;

	protected $inscription;

	protected $role;

	const INVALID_USERNAME = 1;
	const INVALID_PASSWORD = 2;
	const INVALID_ROLE = 3;
	const INVALID_SALT = 4;
	const INVALID_EMAIL = 5;
	const INVALID_INSCRIPTION = 6;

	public function isValid()
	{
		return !(empty($this->username) || empty($this->password) || empty($this->salt) || empty($this->role));
	}


	public function id()
	{
		return $this->id;
	}
	public function username()
	{
		return $this->username;
	}
	public function email()
	{
		return $this->email;
	}
	public function password()
	{
		return $this->password;
	}

	public function role()
	{
		return $this->role;
	}
	public function inscription()
	{
		return $this->inscription;
	}

	public function setId($id)
	{
		if (is_integer($id) && $id > 0) {
			$this->id = $id;
		}
	}
	public function setUsername($username)
	{
		if (!is_string($username) || empty($username) || strlen($username) > 30) {
			$this->errors[] = self::INVALID_USERNAME;
		}
		$this->username = $username;
	}
	public function setEmail($email)
	{
		if (!is_string($email) || empty($email) ) {
			$this->errors[] = self::INVALID_EMAIL;
		}
		$this->email = $email;
	}
	public function setPassword($password)
	{
		if (!is_string($password) || empty($password)) {
			$this->errors[] = self::INVALID_PASSWORD;
		}
		$this->password = $password;
	}

	public function setRole($role)
	{
		if (!is_string($role) || empty($role)) {
			$this->errors[] = self::INVALID_ROLE;
		}
		$this->role = $role;
	}
	public function setInscription( \DateTime $inscription)
	{
		if( !empty( $inscription ) ) {
			$this->inscription = $inscription;
		}
		else
		{
			$this->errors[] = self::INVALID_INSCRIPTION;
		}
		return $this;
	}
}