<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 21:51
 */

namespace vendors\Form\Validators;


use Form\Validators\Validator;

class NotNullValidator extends Validator
{
	public function isValid($value)
	{
		return $value != '';
	}
}
