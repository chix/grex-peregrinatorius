<?
	$authorElement = $this->post->getElement('author');
	$dateElement = $this->post->getElement('createdOn');
	$meta = array();
	if ($authorElement && $authorElement->getElement()) {
		$snippet = $authorElement->getElement();
		$name = $snippet->getElement('name');
		$meta[] = vsprintf('Napsal <a href="/kdo-jsme#%s">%s</a>', array(
			\Website\Tool\Utils::webalize($name),
			$name
		));
	}
	if ($dateElement && $dateElement->getValue()) {
		$meta[] = $dateElement->getValue()->get(\Zend_Date::DATE_MEDIUM);
	}
?>
<?if(!empty($meta)):?>
	<?if(isset($this->postList)):?><p class="post-meta"><?else:?><span class="meta"><?endif;?>
		<?=implode(' <b>&middot;</b> ', $meta);?>
	<?if(isset($this->postList)):?></p><?else:?></span><?endif;?>
<?endif;?>
