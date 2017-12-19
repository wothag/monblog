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



	public function __construct($donnees)
	{
		if (!empty($donnees))
		{
			return $this->hydrate($donnees);
		}
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key=>$value)
		{
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
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

	public function getDatemodified()
	{
		return $this->date_modified;
	}

	public function getUserId()
	{
		return $this->userid;
	}

	public function getExtrait()
	{
		return $this->extrait;
	}


	//liste des setters

	public function setId($id)
	{
		$id = (int)$id;
		if ($id > 0)
		{
			$this->id = $id;
		}
	}

	public function setNum($num)
	{
		$num = (int)$num;
		$this->num = $num;
	}

	public function setPubid($pubid)
	{
		$pubid = (int)$pubid;
		$this->pubid = $pubid;
	}

	public function setTitle($title)
	{
		if (is_string($title))
		{
			$this->title = $title;
		}
	}

	public function setContent($content)
	{
		if (is_string($content))
		{
			$this->content = $content;
		}
	}

	public function setDate_created($date_created)
	{
		if (is_string($date_created))
		{
			DateTime::createFromFormat('m/d/Y', $date_created);
		}

		$this->date_created = $date_created;
	}

	public function setDate_modified($date_modified)
	{
		$this->date_modified = $date_modified;
	}

	public function setUserId($userid)
	{
		$userid = (int)$userid;
		$this->userid = $userid;
	}

	public function setExtrait($extrait)
	{
		if (is_string($extrait))
		{
			$this->extrait = $extrait;
		} else
			{
			$this->extrait = NULL;
		}
	}
}
