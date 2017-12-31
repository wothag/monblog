<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 29/12/2017
 * Time: 17:40
 */

namespace OCFram;


class HTTPRequest extends ApplicationComponent
{

	/**
	 * @param $key
	 * @return null
	 */
	public function cookieData($key)
	{
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
	}

	/**
	 * @param $key
	 * @return bool
	 */
	public function cookieExists($key)
	{
		return isset($_COOKIE[$key]);
	}

	/**
	 * @param $key
	 * @return null
	 */
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}

	/**
	 * @param $key
	 * @return bool
	 */
	public function getExists($key)
	{
		return isset($_GET[$key]);
	}

	/**
	 * @param $key
	 * @return null
	 */
	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}

	/**
	 * @param $key
	 * @return bool
	 */
	public function postExists($key)
	{
		return isset($_POST[$key]);
	}

	/**
	 * @return mixed
	 */
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	 * @return mixed
	 */
	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
}