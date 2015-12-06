<?php

class CmsController extends \Website\Controller\BaseController 
{

	/*						DOCUMENT ROUTED ACTIONS							*/

	public function indexAction()
	{
		$this->enableLayout();	
		$this->setCanonicalUrl();

		$blogManager = new \Website\Model\BlogManager();
		$this->view->posts = $blogManager->getPosts(3);
	}

	public function whoWeAreAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();
	}

	public function blogAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();

		$blogManager = new \Website\Model\BlogManager();
		$this->view->posts = $blogManager->getPosts();
	}

	public function blogPostAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();
	}

	public function partnersAction()
	{
		$this->enableLayout();
		$this->setCanonicalUrl();
	}

	/* 						STATIC-ROUTE ROUTED ACTIONS						*/

	/*							FORM HANDLERS								*/

}
