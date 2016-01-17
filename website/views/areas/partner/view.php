<?
	$url = (!$this->editmode && $this->link('partnerUrl') && $this->link('partnerUrl')->getHref())
		? $this->link('partnerUrl')->getHref()
		: 'javascript:void(0);';
?>
<div class="<?=$this->colClass;?>">
	<a href="<?=$url;?>" class="thumbnail" target="_blank">
		<?=$this->editable('partnerLogo', 'image', array(
			'thumbnail' => $this->thumbnail,
			'uploadPath' => '/partneri'
		));?>
	</a>
	<?if($this->editmode):?>
		<?=$this->link('partnerUrl');?>
	<?endif;?>
</div>
