<?$this->layout()->setLayout('standard');?>

<?=$this->render('cms/snippets/header.php');?>

<!-- Post Content -->
<article>
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
				<!--
				<h2 class="section-heading">Reaching for the Stars</h2>
				<a href="#">
					<img class="img-responsive" src="img/post-sample-image.jpg" alt="">
				</a>
				<span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
				-->
			</div>
		</div>
	</div>
</article>
