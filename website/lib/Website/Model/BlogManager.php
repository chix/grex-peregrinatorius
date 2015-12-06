<?php

namespace Website\Model;

class BlogManager
{
	public function getPosts($limit = false)
	{
		$blogRoot = \Pimcore\Model\WebsiteSetting::getByName('blogRoot');
		if (!$blogRoot) return null;

		$listing = new \Pimcore\Model\Document\Listing();
		$listing->addConditionParam('parentId = ?', $blogRoot->getData());
		$listing->addConditionParam('type = ?', 'page');
		$listing->setOrderKey('index');
		if ($limit) {
			$listing->setLimit($limit);
		}

		return $listing->getDocuments();
	}
}
