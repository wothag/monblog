<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 02/01/2018
 * Time: 18:03
 */


use \OCFram\Entity;

class Chapters extends Entity


{
	protected $id;
	protected $author;
	protected $title;
	protected $content;
	protected $dateCreate;
	protected $lastModif;
	protected $userid;
	protected $extrait;

	const INVALID_AUTHOR = 1;
	const INVALID_TITLE= 2;
	const INVALID_CONTENT = 3;

	public function isValid()
	{
		return !( empty($this->title) || empty($this->content) || empty($this->author));
	}

	/**
	 * @return bool
	 */
	public function id()
	{
		return $this->id;
	}
	public function title()
	{
		return $this->title;
	}
	public function content()
	{
		return $this->content;
	}
	public function author()
	{
		return $this->author;
	}
	public function dateCreate()
	{
		return $this->dateCreate;
	}
	public function lastModif()
	{
		return $this->lastModif;
	}
	// SETTERS //
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setTitle($title)
	{
		if (!is_string($title) || empty($title))
		{
			$this->errors[] = self::INVALID_TITLE;
		}
		$this->title = $title;
	}
	public function setContent($content)
	{
		if (!is_string($content) || empty($content))
		{
			$this->errors[] = self::INVALID_CONTENT;
		}
		$this->content = $content;
	}
	public function setAuthor($author)
	{
		if (!is_string($author) || empty($author))
		{
			$this->errors[] = self::INVALID_AUTHOR;
		}
		$this->author = $author;
	}
	public function setDateCreate(\DateTime $dateCreate)
	{
		$this->dateCreate = $dateCreate;
	}
	public function setLastModif(\DateTime $lastModif)
	{
		$this->lastModif = $lastModif;
	}
}
