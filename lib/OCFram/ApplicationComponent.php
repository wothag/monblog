<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 29/12/2017
 * Time: 23:05
 */

namespace OCFram;



abstract class ApplicationComponent
{
	protected $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function app()
	{
		return $this->app;
	}
}
