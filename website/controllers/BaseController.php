<?php

namespace Website\Controller;

class BaseController extends \Pimcore\Controller\Action\Frontend
{

	protected $language;
	protected $defaultLanguage;

	/** @var \Pimcore\Translate\Website */
	protected $translator = null;
	protected $currentUrl = null;
	protected $canonicalUrl = null;

	/**
	 * sets currentUrl and cache keys for code snippets which should be output cached on each URL
	 */
	public function init()
	{
		//init session the pimcore way, so there are no conflicts
		if (!\Pimcore\Tool::isFrontentRequestByAdmin()) {
			\Pimcore\Tool\Session::get('FlashMessenger');
			\Pimcore\Tool\Session::get('openid');
			\Pimcore\Tool\Session::get('Zend_Auth');
			\Pimcore\Tool\Session::get('Zend_Amf');
			\Pimcore\Tool\Session::get('Zend_File_Transfer_Adapter_Http_ProgressBar');
			\Pimcore\Tool\Session::get('Zend_Form_Element_Hash_salt_csrf');
			\Pimcore\Tool\Session::get('zend_openid');
			\Pimcore\Tool\Session::get('Website\\Model\\Cart');
		}

		parent::init();

		//add action helpers
		\Zend_Controller_Action_HelperBroker::addPath(PIMCORE_WEBSITE_PATH.'/controllers/Action/Helper', '\\Website\\Controller\\Action\\Helper');
		//add view helpers
		$this->view->addHelperPath(PIMCORE_WEBSITE_PATH.'/views/helpers', '\\Website\\View\\Helper');
		//to avoid cache misses in some cases
		\Pimcore\Cache::setForceImmediateWrite(true);
		//language setup
		if (\Zend_Registry::isRegistered("Zend_Locale")) {
			$locale = \Zend_Registry::get("Zend_Locale");
		} else {
			$language = $this->document->getProperty('language');
			//just in case the document property is not set, should not happen though
			if (!$language) {
				\Website\Tool\Utils::getDefaultLanguage();
			}

			$locale = new \Zend_Locale($language);
			\Zend_Registry::set("Zend_Locale", $locale);
		}
		$this->view->language = $locale->getLanguage();
		$this->language = $locale->getLanguage();
		$this->defaultLanguage = \Website\Tool\Utils::getDefaultLanguage();
		$this->view->defaultLanguage = $this->defaultLanguage;
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
		$this->view->metaOgTags = $websiteManager->getDocumentMetaTags(1);
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
