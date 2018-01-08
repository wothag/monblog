<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 21:45
 */


namespace Form\Validators;
abstract class Validator
{
	protected $errorMessage;
	public function __construct($errorMessage)
	{
		$this->setErrorMessage($errorMessage);
	}
	abstract public function isValid($value);
	public function setErrorMessage($errorMessage)
	{
		if (is_string($errorMessage))
		{
			$this->errorMessage = $errorMessage;
		}
	}
	public function errorMessage()
	{
		return $this->errorMessage;
	}
}