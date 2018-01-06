<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 18/12/2017
 * Time: 19:24
 */


class Chapter
{
	protected $id;
	protected $pubid;
	protected $num;
	protected $title;
	protected $content;
	protected $date_created;
	protected $date_modified;
	protected $userid;
	protected $extrait;

	/**
	 * Chapter constructor.
	 * @param $valeurs
	 */



	public function __construct($valeurs=[])
	{
		if (!empty($valeurs))
		{
			$this->hydrate($valeurs);
			Echo 'construction ok';
		}
		return($valeurs);
	}

	public function hydrate($donnees)
	{
		foreach ($donnees as $attribute => $value)
		{
			$method = 'set' . ucfirst($attribute);
			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
		echo 'ok';
	}


//list des setters à faire

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setPubid($pubid)
	{
		$this->pubid = (int) $pubid;
	}

	public function setNum($num)
	{
		$this->num = (int) $num;
	}

	public function setTitle($title)
	{
		if(!is_string($title))
			{
			echo'Veuillez entrer un titre valide svp !';
			}
		else
			{
			$this->title = $title;
			}
	}

	public function setContent($content)
	{
		$this->$content = $content;
	}


	//liste des getters

	public function getId()
	{
		return $this->id;
	}

	public function getNum()
	{
		return $this->$this->num;
	}

	public function pubId()
	{
		return $this->$this->pubId;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getDate_created()
	{
		return $this->date_created;
	}

	public function getDate_modified()
	{
		return $this->date_modified;
	}

}