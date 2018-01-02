<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 02/01/2018
 * Time: 18:00
 */


namespace App\Frontend\Modules\Chapters;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class NewsController extends BackController
{
	public function executeIndex(HTTPRequest $request)
	{
		$nombreChapters = $this->app->config()->get('nombre_chapters');
		$nombreCaracteres = $this->app->config()->get('nombre_caracteres');

		// On ajoute une définition pour le titre.
		$this->page->addVar('title', 'Liste des '.$nombreChapters.' dernières news');

		// On récupère le manager des news.
		$manager = $this->managers->getManagerOf('Chapter');

		// Cette ligne, vous ne pouviez pas la deviner sachant qu'on n'a pas encore touché au modèle.
		// Contentez-vous donc d'écrire cette instruction, nous implémenterons la méthode ensuite.
		$listeChapters = $manager->getList(0, $nombreChapters);

		foreach ($listeChapters as $chapters)
		{
			if (strlen($chapters->content()) > $nombreCaracteres)
			{
				$debut = substr($chapters->content(), 0, $nombreCaracteres);
				$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

				$chapters->setContent($chapters);
			}
		}

		// On ajoute la variable $listeNews à la vue.
		$this->page->addVar('listeChpaters', $listeChapters);
	}
}