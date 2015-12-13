<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header"<?
	if(!$this->editmode) {
		echo sprintf(' style="background-image: url(\'%s\');"',
			$this->editable('headerImage', 'image')->getImage()
		);
	}
?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="<?=(isset($this->headerType) ? $this->headerType . '-heading' : 'page-heading');?>">
					<?if($this->editmode):?>
						<?=$this->editable('headerImage', 'image');?>
					<?endif;?>
					<h1><?=$this->editable('title', 'input');?></h1>
					<?if($this->headerType != 'post'):?>
						<hr class="small">
					<?endif;?>
					<?
						$subTitleClass = ($this->headerType == 'post') ? 'h2' : 'span';
					?>
					<<?=$subTitleClass;?> class="subheading"><?=$this->editable('subTitle', 'input');?></<?=$subTitleClass;?>>
					<?if($this->headerType == 'post'):?>
						<?if($this->editmode):?>
							<?=$this->editable('author', 'href');?>
							<hr>
							<?=$this->editable('createdOn', 'date');?>
						<?else:?>
							<?=$this->partial('cms/snippets/post-meta-partial.php', array('post' => $this->document));?>
						<?endif;?>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
</header>
