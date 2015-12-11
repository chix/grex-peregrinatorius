<?php

namespace Website\Controller;

class Action extends \Pimcore\Controller\Action\Frontend
{

	protected $language;
	protected $defaultLanguage;

	/**
	 * sets the \Zend_Locale and language links for controllers and views
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
		\Pimcore\Model\Cache::setForceImmediateWrite(true);

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
	}

}
