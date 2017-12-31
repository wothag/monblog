<?php

namespace OCFram;

/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 30/12/2017
 * Time: 19:52
 */


class Config extends ApplicationComponent
{
	protected $vars = [];
	public function get($var)
	{
		if (!$this->vars)
		{
			$xml = new \DOMDocument;
			$xml->load($this->app->applicationPath().'/Config/app.xml');
			$elements = $xml->getElementsByTagName('define');
			foreach ($elements as $element)
			{
				$this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
			}
		}
		if (isset($this->vars[$var]))
		{
			return $this->vars[$var];
		}
		return null;
	}
}