<?if($this->editmode):?>
	<?=$this->editable('gallery', 'multihref');?>
<?else:?>
	<?
		$images = \Website\Tool\Utils::loadAssets($this->multihref('gallery')->getElements());
		$galleryRelId = (\Zend_Registry::isRegistered('document_gallery_rel_id'))
			? \Zend_Registry::get('document_gallery_rel_id') + 1
			: 1;
		\Zend_Registry::set('document_gallery_rel_id', $galleryRelId);
	?>

	<div id="gallery-<?=$galleryRelId;?>" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?foreach(array_keys($images) as $key):?>
				<li data-target="#gallery-<?=$galleryRelId;?>" data-slide-to="<?=$key;?>" class="active"></li>
			<?endforeach;?>
		</ol>

		<div class="carousel-inner" role="listbox">
			<?foreach($images as $key => $image):?>
				<?
					$title = $image->getMetadata('title', $this->language);
					$alt = $image->getMetadata('alt', $this->language);
				?>
				<div class="item<?if($key == 0) echo ' active';?>">
					<?=\Website\Tool\Utils::image($image, $this->thumbnail);?>
					<?if($title || $alt):?>
						<div class="carousel-caption">
							<?if($title):?><h4><?=$title;?></h4><?endif;?>
							<?if($alt):?><p class="grex-no-margin"><?=$alt;?></p><?endif;?>
						</div>
					<?endif;?>
				</div>
			<?endforeach;?>
		</div>

		<a class="left carousel-control" href="#gallery-<?=$galleryRelId;?>" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		</a>
		<a class="right carousel-control" href="#gallery-<?=$galleryRelId;?>" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		</a>
	</div>
<?endif;?>
