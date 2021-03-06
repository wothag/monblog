<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 30/12/2017
 * Time: 14:29
 */


namespace OCFram;

abstract class Entity implements \ArrayAccess
{
	use Hydrator;

	protected $errors = [];
	protected $id;

	public function __construct($donnees = [])
	{
		if (!empty($donnees))
		{
			$this->hydrate($donnees);
		}
	}


	public function isNew()
	{
		return empty($this->id);
	}

	public function errors()
	{
		return $this->errors;
	}

	public function id()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $attribut => $valeur)
		{
			$methode = 'set'.ucfirst($attribut);

			if (is_callable([$this, $methode]))
			{
				$this->$methode($valeur);
			}
		}
	}

	public function offsetGet($var)
	{
		if (isset($this->$var) && is_callable([$this, $var]))
		{
			return $this->$var();
		}
	}

	public function offsetSet($var, $value)
	{
		$method = 'set'.ucfirst($var);

		if (isset($this->$var) && is_callable([$this, $method]))
		{
			$this->$method($value);
		}
	}

	public function offsetExists($var)
	{
		return isset($this->$var) && is_callable([$this, $var]);
	}

	public function offsetUnset($var)
	{
		throw new \Exception('Impossible de supprimer une quelconque valeur');
	}
}