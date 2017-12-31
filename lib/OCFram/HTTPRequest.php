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

	public function cookieData($key)
	{
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
	}

	public function cookieExists($key)
	{
		return isset($_COOKIE[$key]);
	}

	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}

	public function getExists($key)
	{
		return isset($_GET[$key]);
	}

	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}

	public function postExists($key)
	{
		return isset($_POST[$key]);
	}

	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
}