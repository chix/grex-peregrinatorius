<?php

/**
 * Helper for encoding output in html
 * 
 * @author Martin Kuric <martin.kuric@portadesign.cz>
 */

namespace Website\View\Helper;

class Enc extends \Zend_View_Helper_Abstract
{

	public $view;

	protected function _run()
	{
		
	}

	/**
	 * 
	 * @param string $string string to encode
	 * @param bool $inJs output is in javascipt code
	 * @param  $jsInHtmlAttrib output is in JS in HTML attribute
	 * @return string safely HTML encoded string
	 */
	public function enc($string, $inJs = false, $jsInHtmlAttrib = false)
	{
		if ($inJs) {
			if ($jsInHtmlAttrib) {
				return htmlspecialchars(json_encode($string), ENT_QUOTES);
			} else {
				return json_encode($string);
			}
		} else {
			return htmlspecialchars($string, ENT_QUOTES);
		}
	}

	public function setView(\Zend_View_Interface $view)
	{
		parent::setView($view);

		$this->view = $view;
	}

}
