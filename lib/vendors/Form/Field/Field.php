<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 14:59
 */


namespace Form\Field;
abstract class Field
{

	use \OCFram\Hydrator;


	protected $errorMessage;
	protected $label;
	protected $name;
	protected $value;
	protected $class;
	protected $validators = [];


	public function __construct(array $options = [])
	{
		if (!empty($options))
		{
			$this->hydrate($options);
		}
	}
	abstract public function build();
	public function isValid()
	{
		foreach($this->validators as $validator)
		{
			if (!$validator->isValid($this->value))
			{
				$this->errorMessage = $validator->errorMessage();
				return false;
			}
		}
		return true;
	}
	public function label()
	{
		return $this->label;
	}
	public function length()
	{
		return $this->length;
	}
	public function name()
	{
		return $this->name;
	}
	public function value()
	{
		return $this->value;
	}
	public function validators()
	{
		return $this->validators;
	}
	public function setLabel($label)
	{
		if (is_string($label))
		{
			$this->label = $label;
		}
	}
	public function setLength($length)
	{
		$length = (int) $length;
		if ($length > 0)
		{
			$this->length = $length;
		}
	}
	public function setName($name)
	{
		if (is_string($name))
		{
			$this->name = $name;
		}
	}
	public function setValidators(array $validators)
	{
		foreach ($validators as $validator)
		{
			if ($validator instanceof Validator && !in_array($validator, $this->validators))
			{
				$this->validators[] = $validator;
			}
		}
	}
	public function setValue($value)
	{
		if (is_string($value))
		{
			$this->value = $value;
		}
	}
}