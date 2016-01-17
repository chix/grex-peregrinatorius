<?php

namespace Website\Model;

class WebsiteManager
{
	public function getMainNavigation()
	{
		if (!$navigation = \Pimcore\Cache::load('website_main_navigation')) {
			$listing = new \Pimcore\Model\Document\Listing();
			$listing->setCondition("id IN (SELECT cid from properties WHERE ctype='document' AND name = 'showInNavigation' AND data = '1')");
			$listing->setOrderKey('index');

			$navigation = array();
			foreach ($listing->getDocuments() as $document) {
				$navigation[$document->getFullPath()] = $document->getTitle();
			}
			\Pimcore\Cache::save(
				$navigation,
				'website_main_navigation',
				array('output')
			);
		}

		return $navigation;
	}

	public function getDocumentMetaTags($pageId = 1)
	{
		$cacheKey = 'website_meta_'.$pageId;
		$metaTags = \Pimcore\Cache::load($cacheKey);
		if (!$metaTags) {
			$page = \Pimcore\Model\Document\Page::getById($pageId);
			$metaTags = '';
			foreach($page->getMetadata() as $metadata) {
				$metaTags .= vsprintf('<meta %s="%s" %s="%s"/>', array(
					$metadata['idName'],
					$metadata['idValue'],
					$metadata['contentName'],
					$metadata['contentValue']
				));
			}
			\Pimcore\Cache::save($metaTags, $cacheKey, array('output'));
		}

		return $metaTags;
	}
}
