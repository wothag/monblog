<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 18/12/2017
 * Time: 19:14
 */

class ChapterManager extends BdManager
{
	/**
	 *
	 */
	public function showAllbillets()
	{
		$chapters = array();

		$q = $this->db->query('SELECT * FROM chapter');
		while
		($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$chapters[] = new Chapter($donnees);
		}
		return $chapters;
	}

	public function ShowBillets()
	{
		$chapters = array();

		$q = $this->db->query('SELECT * FROM chapter WHERE publicationid = 2');
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$chapters[] = new Chapter($donnees);
		}
		return $chapters;
	}
}



