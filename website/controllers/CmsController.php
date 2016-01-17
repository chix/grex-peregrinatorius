<?php

class CmsController extends \Website\Controller\BaseController 
{

	/*						DOCUMENT ROUTED ACTIONS							*/

	public function indexAction()
	{
		$this->enableLayout();	
		$this->setCanonicalUrl();

		$this->view->headerType = 'site';
		$blogManager = new \Website\Model\BlogManager();
		$this->view->posts = $blogManager->getPosts(4);
	}

	public function whoWeAreAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'page';

		$this->view->members = $this->document->getChilds();
	}

	public function memberAction()
	{
		if ($this->editmode) {
			$this->enableLayout();
			$this->renderScript('cms/snippets/member.php');
		} else {
			$name = $this->document->getElement('name')->text;
			$this->gotoUrl('/kdo-jsme#' . \Website\Tool\Utils::webalize($name), 301);
		}
	}

	public function blogAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'page';
		$blogManager = new \Website\Model\BlogManager();
		$this->view->posts = $blogManager->getPosts();
	}

	public function blogPostAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'post';
	}

	public function partnersAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'page';
	}

	public function ourPlansAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'page';
	}

	public function simplePageAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'page';
	}

	/* 						STATIC-ROUTE ROUTED ACTIONS						*/

	/*							FORM HANDLERS								*/

}
