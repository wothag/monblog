<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 02/01/2018
 * Time: 18:00
 */

<?php
namespace App\Frontend\Modules\Chapters;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapters;
use \Form\FormBuilder\ChaptersFormBuilder;
use \Form\FormHandler;



class ChaptersController extends BackController
{
		public function executeHome(HTTPRequest $request)
		{
			$nbChapters = $this->app->config()->get('nb_chapters');
			$nbCarac = $this->app->config()->get('nb_carac');

			// On ajoute une définition pour le titre.
			$this->page->addVar('title', 'Liste des ' . $nbChapters . ' derniers chapitres');
			// On récupère le manager des chapitres.
			$manager = $this->managers->getManagerOf('Chapters');
			$chaptersList = $manager->getList(0, $nbChapters);

				foreach ($chaptersList as $chapters) 
				{
						if (strlen($chapters->content()) > $nbCarac) 	
							{
								$debut = substr($chapters->content(), 0, $nbCarac);
								$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
								$chapters->setContent($debut);
							}
				}
			$this->page->addVar('chaptersList', $chaptersList);
		}
	}

/**
* About page controller
* @param HTTPRequest $request
*/


		public function executeAbout(HTTPRequest $request)
		{
			$this->page->addVar('title', 'A propos');
		}

/**
* SHOW Controller
* @param HTTPRequest $request
*/

		public function executeShow(HTTPRequest $request)
		{
			$chapters = $this->managers->getManagerOf('Chapters')->find($request->getData('id'));
			$commentId = $request->getData('id');
				if (empty($chapters)) 
				{
					$this->app->httpResponse()->redirect404();
				}


		$this->page->addVar('title', $chapters->title());
		$this->page->addVar('chapters', $chapters);
		$this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($chapters->id()));
		}
/**
* Last 5 Chapters controller
* @param HTTPRequest $request
*/
		public function executeLast(HTTPRequest $request)
		{
			$nbChapters = $this->app->config()->get('nb_chapters');
			$nbCarac = $this->app->config()->get('nb_carac');
			// On ajoute une définition pour le titre.
			$this->page->addVar('title', 'Liste des ' . $nbChapters . ' derniers chapitres');
			// On récupère le manager des chapitres.
			$manager = $this->managers->getManagerOf('Chapters');
			$chaptersList = $manager->getList(0, $nbChapters);

				foreach ($chaptersList as $chapters) 
				{
					if (strlen($chapters->content()) > $nbCarac) {
					$debut = substr($chapters->content(), 0, $nbCarac);
					$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
					$chapters->setContent($debut);
				}
		}

		$this->page->addVar('chaptersList', $chaptersList);
		$this->page->addVar('nbChapters', $nbChapters);
		}


/**
* List of ALL chapters
* @param HTTPRequest $request
*/
	
	public function executeAll(HTTPRequest $request)
	{
			$manager = $this->managers->getManagerOf('Chapters');
			$chaptersList = $manager->findAll();
			$nbChapters = $manager->count();

				foreach ($chaptersList as $chapters) 
				{
					if (strlen($chapters->content()) > 200) {
					$debut = substr($chapters->content(), 0, 200);
					$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
					$chapters->setContent($debut);
				}
	}
	$this->page->addVar('title', 'Tous les ' . $nbChapters . ' chapitres');
	$this->page->addVar('nbChapters', $nbChapters);
	$this->page->addVar('chaptersList', $chaptersList);
	}
}
