<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 18/12/2017
 * Time: 19:09
 */


namespace Model;

use Chapter;

class ChapterManagerPDO extends ChapterManager
{
	public function getList($debut = -1, $limite = -1)
	{
		$sql = 'SELECT id, author, pubid, num, content, date_created FROM chapter ORDER BY id DESC';

		if ($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
		}

		$requete = $this->dao->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapter');

		$listeChapters = $requete->fetchAll();

		foreach ($listeChapters as $Chapter)
		{
			$Chapter->setDate_created(new \DateTime($Chapters->date_created()));
			$Chapter->setDate_Modified(new \DateTime($Chapters->date_Modified()));
		}

		$requete->closeCursor();

		return $listeChapters;
	}
}
