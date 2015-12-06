<?php

namespace Website\Model;

class WebsiteManager
{
	public function getMainNavigation()
	{
		if (!$navigation = \Pimcore\Model\Cache::load('website_main_navigation')) {
			$listing = new \Pimcore\Model\Document\Listing();
			$listing->setCondition("id IN (SELECT cid from properties WHERE ctype='document' AND name = 'showInNavigation' AND data = '1')");
			$listing->setOrderKey('index');

			$navigation = array();
			foreach ($listing->getDocuments() as $document) {
				$navigation[$document->getFullPath()] = $document->getTitle();
			}
			\Pimcore\Model\Cache::save(
				$navigation,
				'website_main_navigation',
				array('output')
			);
		}

		return $navigation;
	}
}
