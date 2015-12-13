<?$this->layout()->setLayout('standard');?>

<?=$this->render('cms/snippets/header.php');?>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?=$this->areablock('content', array(
				'allowed' => array('text', 'gallery'),
				'toolbar' => true,
				'params' => array(
					'text' => array('width' => 0),
					'gallery' => array('thumbnail' => 'GalleryImage', 'width' => 0)
				)
			));?>
			<?if(!$this->editmode):?>
				<?
					$this->backupDocument = $this->document;
					foreach($this->members as $member) {
						$this->document = $member;
						echo $this->render('cms/snippets/member.php');
					}
					$this->document = $this->backupDocument;
				?>
			<?endif;?>
		</div>
	</div>
</div>
