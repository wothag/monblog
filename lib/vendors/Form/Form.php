<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 14:58
 */


namespace Form;
use \OCFram\Entity;
use \Form\Field\Field;
class Form
{
	protected $entity;
	protected $fields = [];



	public function __construct(Entity $entity)
	{
		$this->setEntity($entity);
	}
	public function add(Field $field)
	{
		$attr = $field->name();
		$field->setValue($this->entity->$attr());
		$this->fields[] = $field;
		return $this;
	}
	public function createView()
	{
		$view = '';
		foreach ($this->fields as $field)
		{
			$view .= $field->build().'<br />';
		}
		return $view;
	}
	public function isValid()
	{
		$valid = true;
		foreach ($this->fields as $field)
		{
			if (!$field->isValid())
			{
				$valid = false;
			}
		}
		return $valid;
	}
	public function entity()
	{
		return $this->entity;
	}
	public function setEntity(Entity $entity)
	{
		$this->entity = $entity;
	}
}