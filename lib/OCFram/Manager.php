<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 30/12/2017
 * Time: 14:15
 */

namespace OCFram;




abstract class Manager
{
	protected $dao;

	public function __construct($dao)
	{
		$this->dao = $dao;
	}
}
