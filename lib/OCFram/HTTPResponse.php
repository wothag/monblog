<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 29/12/2017
 * Time: 18:28
 */

namespace OCFram;


class HTTPResponse
{
	protected $page;


	public function send()
	{
		exit($this->page->getGeneratedPage());
	}

	public function setPage(Page $page)
	{
		$this->page = $page;
	}

	public function addHeader($header)
	{
		header($header);
	}

	public function redirect($location)
	{
		header('Location: '.$location);
		exit;
	}

	public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
	{
		setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
	}
}


