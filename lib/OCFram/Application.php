<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 29/12/2017
 * Time: 18:50
 */

namespace OCFram;


abstract class Application
{
	protected $httpRequest;
	protected $httpResponse;
	protected $name;
	protected $user;
	protected $config;

	/**
	 * Application constructor.
	 */
	public function __construct()
	{
		$this->httpRequest = new HTTPRequest($this);
		$this->httpResponse = new HTTPResponse($this);
		$this->name = '';
		$this->user=new User;
		$this->config=new Config($this);

	}

	/**
	 * @return mixed
	 */
	public function getController()
	{
		$router = new Router;
		$xml = new \DOMDocument;

		$routes = $xml->getElementsByTagName('route');

		// Searching for routes in XML
		foreach ($routes as $route)
		{
			$vars = [];

			// Checking if we have some vars in URL
			if ($route->hasAttribute('vars'))
			{
				$vars = explode(',', $route->getAttribute('vars'));
			}

			// We add 'route' to our 'routeur' by reading 'url' 'module' and 'action'
			$router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
		}

		try
		{
			// we catch the road corresponding to URL read in httpRequest->requestURI
			$matchedRoute = $router->getRoute($this->httpRequest->requestURI());
		}
		catch (\RuntimeException $e)
		{
			if ($e->getCode() == Router::NO_ROUTE)
			{
				// if no road exists then we redirect to 404 page
				$this->httpResponse->redirect404();
			}
		}

		// adding URL vars in the array $_GET
		$_GET = array_merge($_GET, $matchedRoute->vars());

		// we instantiate the controler
		$controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
		return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
	}

	abstract public function run();

	public function httpRequest()
	{
		return $this->httpRequest;
	}

	public function httpResponse()
	{
		return $this->httpResponse;
	}

	public function name()
	{
		return $this->name;
	}

	public function config()
	{
		return $this->config;
	}
	public function user()
	{
		return $this->user;
	}
}