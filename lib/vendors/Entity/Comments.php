<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 07/01/2018
 * Time: 14:40
 */

namespace vendors\Entity;
use \OCFram\Entity;
use datetime;



class Comments extends Entity
{

	protected $chapter;
	protected $author;
	protected $content;
	protected $dateCreate;
	protected $flag;
	const INVALID_AUTHOR = 1;
	const INVALID_CONTENT = 2;


	public function isValid()
	{
		return !(empty($this->author) || empty($this->content));
	}
	// SETTERS //
	public function setChapter($chapter)
	{
		$this->chapter = (int) $chapter;
	}
	public function setAuthor($author)
	{
		if (!is_string($author) || empty($author))
		{
			$this->errors[] = self::INVALID_AUTHOR;
		}
		$this->author = $author;
	}
	public function setContent($content)
	{
		if (!is_string($content) || empty($content))
		{
			$this->errors[] = self::INVALID_CONTENT;
		}
		$this->content = $content;
	}

	public function setDateCreate(DateTime $dateCreate)
	{
		$this->dateCreate = $dateCreate;
	}
	public function setFlag( $flag)
	{
		$flag = (int) $flag;
		$this->flag = $flag;
	}
	// GETTERS //
	public function chapter()
	{
		return $this->chapter;
	}
	public function author()
	{
		return $this->author;
	}
	public function content()
	{
		return $this->content;
	}
	public function dateCreate()
	{
		return $this->dateCreate;
	}
	public function flag()
	{
		return (int) $this->flag;
	}
}