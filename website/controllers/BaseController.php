<?php

namespace Website\Controller;

class BaseController extends Action
{
	
	/** @var \Pimcore\Translate\Website */
	protected $translator = null;
	protected $currentUrl = null;
	protected $canonicalUrl = null;
	
	/**
	 * sets currentUrl and cache keys for code snippets which should be output cached on each URL
	 */
	public function init()
	{
		parent::init();

		//current url
		$this->currentUrl = $this->getRequest()->getRequestUri();
		$this->view->currentUrl = $this->currentUrl;
	}
	
	public function preDispatch()
	{
		parent::preDispatch();
		$this->translator = \Zend_Registry::get('Zend_Translate');

		//set some document editables defaults
		$this->view->width = 0;
	}
	
	public function postDispatch()
	{
		parent::postDispatch();

		$websiteManager = new \Website\Model\WebsiteManager();
		$this->view->mainNavigation = $websiteManager->getMainNavigation();
		$this->view->canonicalUrl = $this->canonicalUrl;
	}

	protected function setCanonicalUrl($url = null)
	{
		if ($url) {
			$this->canonicalUrl = $url;
		} else {
			$this->canonicalUrl = preg_replace('/\?.*/', '', $this->view->serverUrl().$this->currentUrl);
		}

	}
	
	public function gotoUrl($url, $code = null)
	{
		if ($code) {
			$this->_helper->redirector->setCode($code);
		}
		$this->_helper->redirector->gotoUrl($url);
	}
	
	public function translate($keyword)
	{
		return $this->translator->translate($keyword);
	}

	protected function isEditOrAdminMode()
	{
		if ($this->editmode) return true;
		if (\Pimcore\Tool::isFrontentRequestByAdmin()) {
            $admin = \Pimcore\Tool\Authentication::authenticateSession();
			if ($admin instanceof User) return true;
		}
		return false;
	}

}
