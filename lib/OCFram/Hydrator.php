<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 31/12/2017
 * Time: 16:29
 */

namespace OCFram;
trait Hydrator
{
	/**
	 * @param $data
	 */
	public function hydrate($data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
	}
}