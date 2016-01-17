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

				<ul class="pager">
					<li class="previous">
						<a href="/blog">&larr; Zpět na blog</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</article>
