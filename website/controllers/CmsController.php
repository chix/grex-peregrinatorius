<?php

class CmsController extends \Website\Controller\BaseController 
{

	/*						DOCUMENT ROUTED ACTIONS							*/

	public function indexAction()
	{
		$this->enableLayout();	

		$blogManager = new \Website\Model\BlogManager();
		$this->view->posts = $blogManager->getPosts(3);
	}

	public function blogAction()
	{
		$this->enableLayout();

		$blogManager = new \Website\Model\BlogManager();
		$this->view->posts = $blogManager->getPosts();
	}

	public function blogPostAction()
	{
		$this->enableLayout();
	}

	/* 						STATIC-ROUTE ROUTED ACTIONS						*/

	/*							FORM HANDLERS								*/

}
