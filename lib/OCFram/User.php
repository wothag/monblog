<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 31/12/2017
 * Time: 18:19
 */

namespace OCFram;
session_start();
class User extends ApplicationComponent
{
	/**
	 * @param $attr
	 * @return null
	 */
	public function getAttribute($attr)
	{
		return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
	}

	/**
	 * @return mixed
	 */
	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
		return $flash;
	}

	/**
	 * @return bool
	 */
	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}

	/**
	 * @return bool
	 */

	public function isAuthenticated()
	{
		return isset( $_SESSION[ 'auth' ] ) && $_SESSION[ 'auth' ] === true;
	}

	/**
	 * @return bool
	 */
	public function isAdmin()
	{
		if ($this->isAuthenticated()) {
			if (isset($_SESSION['auth']) && $_SESSION['auth'] === true && isset($_SESSION['role']) && $_SESSION['role'] === 'ADMIN') {
				return true;
			} else {
				return false;
			}
		}
	}



	/**
	 * @return bool
	 */
	public function isUser()
	{
		if( isset( $_SESSION[ 'auth' ] ) && $_SESSION[ 'auth' ] === true && isset( $_SESSION[ 'role' ] ) && $_SESSION[ 'role' ] === 'USER' )
			{
				return true;
			}
		else
			{
				return false;
			}
	}
	/**
	 * @param $attr
	 * @param $value
	 */
	public function setAttribute($attr, $value)
	{
		$_SESSION[$attr] = $value;
	}

	public function setAuthenticated( $authenticated )
	{
		if( $authenticated == false ) {
			$_SESSION[ 'auth' ] = $authenticated;
			$_SESSION[ 'role' ] = '';
		}
		if( $authenticated == true ) {
			$_SESSION[ 'auth' ] = $authenticated;
		}
	}


	/**
	 * @param $admin
	 */
	public function setAdmin($admin)
	{
		if (!is_bool($admin))
		{
			throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAdmin() doit être un boolean');
		}
		$_SESSION['admin'] = $admin;
	}

	/**
	 * @param $user
	 */
	public function setUser($user)
	{
		if (!is_bool($user))
		{
			throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setUser() doit être un boolean');
		}
		$_SESSION['user'] = $user;
	}

	/**
	 * @param $value
	 */
	public function setFlash($value)
	{
		$_SESSION['flash'] = $value;
	}
}