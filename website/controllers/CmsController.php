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
		$this->view->posts = $blogManager->getPosts(3);
	}

	public function whoWeAreAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$this->view->headerType = 'page';
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

	/* 						STATIC-ROUTE ROUTED ACTIONS						*/

	/*							FORM HANDLERS								*/

}
