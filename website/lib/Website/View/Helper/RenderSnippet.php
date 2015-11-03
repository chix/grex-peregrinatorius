<?php

/**
 * Renders a \Pimcore\Model\Document\Snippet skipping another dispatch process
 * 
 * @author Martin Kuric <martin.kuric@portadesign.cz>
 */

namespace Website\View\Helper;

class RenderSnippet extends \Zend_View_Helper_Abstract
{

	public $view;

	protected function _run()
	{
		
	}

	public function setView(\Zend_View_Interface $view)
	{
		parent::setView($view);

		$this->view = $view;
	}

	/**
	 * @param string $snippet path to the snippet in document tree
	 * 
	 * @return void
	 */
	public function renderSnippet($snippet)
	{
		$editModeBackup = $this->view->editmode;
		$documentBackup = $this->view->document;
		$snippet = \Pimcore\Model\Document\Snippet::getByPath($snippet);
		$this->view->editmode = false;
		$this->view->document = $snippet;
		echo $this->view->render($snippet->controller . '/' . $snippet->action . '.php');
		$this->view->document = $documentBackup;
		$this->view->editmode = $editModeBackup;
	}

}
