<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 02/01/2018
 * Time: 18:03
 */

class Chapter
{
	protected $id;
	protected $author;
	protected $pubid;
	protected $num;
	protected $title;
	protected $content;
	protected $date_created;
	protected $date_modified;
	protected $userid;
	protected $extrait;

	const AUTEUR_INVALIDE = 1;
	const TITRE_INVALIDE = 2;
	const CONTENU_INVALIDE = 3;


	/**
	 * @return bool
	 */
	public function isValid()
	{
		return !(empty($this->author) || empty($this->title) || empty($this->content));
	}

	public function __construct($valeurs = [])
	{
		if (!empty($valeurs)) {
			$this->hydrate($valeurs);
			Echo 'construction ok';
		}
		return ($valeurs);
	}

	public function hydrate($donnees)
	{
		foreach ($donnees as $attribute => $value) {
			$method = 'set' . ucfirst($attribute);
			if (is_callable([$this, $method])) {
				$this->$method($value);
			}
		}
		echo 'ok';
	}


//list des setters à faire

	public function setId($id)
	{
		$this->id = (int)$id;
	}

	public function setAuthor($author)
	{
		$this->author = (int)$author;
	}

	public function setPubid($pubid)
	{
		$this->pubid = (int)$pubid;
	}

	public function setNum($num)
	{
		$this->num = (int)$num;
	}

	public function setTitle($title)
	{
		if (!is_string($title) || empty($title)) {
			echo 'Veuillez entrer un titre valide svp !';
		} else {
			$this->title = $title;
		}
	}

	public function setContent($content)
	{
		if (!is_string($content) || empty($content)) {
			echo 'contenu invalide';

		}
		$this->$content = $content;
	}

	public function setDate_Created(\DateTime $date_created)
	{
		$this->$date_created = $date_created;
	}

	public function setDate_Modified(\DateTime $date_modified)
	{
		$this->$date_modified = $date_modified;
	}


	//liste des getters

	public function getId()
	{
		return $this->id;
	}

	public function getAuthor()
	{
		return $this->author;
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


