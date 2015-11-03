<?php

namespace Website\View\Helper;

class Editable extends \Zend_View_Helper_Abstract
{	
	public $view;
	protected $containerWidth = 940;

	protected function _run()
	{
	}
	
	public function editable($key, $method, $config = array())
	{
		$defaultConfigs = array(
			'input' => array(
				'width' => $this->containerWidth,
				'htmlspecialchars' => true
			),
			'numeric' => array(
				'width' => $this->containerWidth,
				'minValue' => 0
			),
			'textarea' => array(
				'width' => $this->containerWidth,
				'height' => 100,
				'nl2br' => true,
				'htmlspecialchars' => true
			),
			'wysiwyg' => array(
				'width' => $this->containerWidth,
				'height' => 100,
				'inline' => true,
				'enterMode' => 1,
				'customConfig' => '/plugins/Backend/static/js/cke_config_document_loader.js'
			),
			'image' => array(
				'hidetext' => true,
				'reload' => true, 
				'thumbnail' => 'ArticleGalleryThumbnail',
				'uploadPath' => '/dokumenty'
			),
			'multihref' => array(
				'width' => $this->containerWidth,
				'uploadPath' => '/dokumenty',
				'thumbnail' => null
			),
			'href' => array(
				'width' => $this->containerWidth
			),
			'checkbox' => array(
				'reload' => false
			),
			'date' => array(
				'format' => 'd.m.Y'
			),
			'select' => array(
				'reload' => false,
				'store' => array(array('dummy', 'dummy'))
			),
			'table' => array(
				'width' => $this->containerWidth,
				'defaults' => array('cols' => 1, 'rows' => 1, 'data' => array(array('dummy')))
			),
			'multiselect' => array(
				'width' => $this->containerWidth,
				'store' => array(array('dummy', 'dummy'))
			)
		);
		if ($method == 'image' && $this->view->editmode) {
			$defaultConfigs['image']['width'] = $this->containerWidth;
		}

		if (array_key_exists($method, $defaultConfigs)) {
			if ($this->view->editmode || $method == 'image') { // test on image, because we do not want to throw away the thumbnail key in frontend
				return $this->view->$method($key, $this->replaceConfigDefaults($defaultConfigs[$method], $config));
			} else {
				return $this->view->$method($key);
			}
		}
	}

	public function setView(\Zend_View_Interface $view) {
		parent::setView($view);
		
		$this->view = $view;
	}

	private function replaceConfigDefaults($defaultConfig, $config = array())
	{
		foreach (array_keys($defaultConfig) as $key) {
			if (isset($config[$key])) {
				if ($config[$key]) $defaultConfig[$key] = $config[$key];
				else unset($defaultConfig[$key]);
			} elseif (isset($this->view->$key)) {
				if ($this->view->$key) $defaultConfig[$key] = $this->view->$key;
				else unset($defaultConfig[$key]);
			}
		}

		return $defaultConfig;
	}
}
