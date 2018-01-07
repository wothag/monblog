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
		foreach ($chaptersList as $chapters) {
			if (strlen($chapters->content()) > $nbCarac) {
				$debut = substr($chapters->content(), 0, $nbCarac);
				$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
				$chapters->setContent($debut);
			}
		}
		$this->page->addVar('chaptersList', $chaptersList);
	}

	public function executeAbout(HTTPRequest $request)
	{
		$this->page->addVar('title', 'A propos');
	}

	public function executeShow(HTTPRequest $request)
	{
		$chapters = $this->managers->getManagerOf('Chapters')->find($request->getData('id'));
		$commentId = $request->getData('id');
		if (empty($chapters)) {
			$this->app->httpResponse()->redirect404();
		}
		// // The variables are added to the view.
		$this->page->addVar('title', $chapters->title());
		$this->page->addVar('chapters', $chapters);
		$this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($chapters->id()));
	}

	public function executeLast(HTTPRequest $request)
	{
		$nbChapters = $this->app->config()->get('nb_chapters');
		$nbCarac = $this->app->config()->get('nb_carac');
		$this->page->addVar('title', 'Liste des ' . $nbChapters . ' derniers chapitres');
		// On récupère le manager des chapitres.
		$manager = $this->managers->getManagerOf('Chapters');
		$chaptersList = $manager->getList(0, $nbChapters);
		foreach ($chaptersList as $chapters) {
			if (strlen($chapters->content()) > $nbCarac) {
				$debut = substr($chapters->content(), 0, $nbCarac);
				$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
				$chapters->setContent($debut);
			}
		}
		$this->page->addVar('chaptersList', $chaptersList);
		$this->page->addVar('nbChapters', $nbChapters);
	}

	public function executeAll(HTTPRequest $request)
	{
		$manager = $this->managers->getManagerOf('Chapters');
		$chaptersList = $manager->findAll();
		$nbChapters = $manager->count();
		foreach ($chaptersList as $chapters) {
			if (strlen($chapters->content()) > 170) {
				$debut = substr($chapters->content(), 0, 170);
				$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
				$chapters->setContent($debut);
			}
		}
		$this->page->addVar('title', 'Tous les ' . $nbChapters . ' chapitres');
		$this->page->addVar('nbChapters', $nbChapters);
		$this->page->addVar('chaptersList', $chaptersList);
	}
}