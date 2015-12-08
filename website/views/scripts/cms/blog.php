<?$this->layout()->setLayout('standard');?>

<?=$this->render('cms/snippets/header.php');?>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?foreach((array)$this->posts as $post):?>
				<?=$this->partial('cms/snippets/post-partial.php', array(
					'post' => $post,
					'thumbnail' => 'BlogHeaderImage'
				));?>
				<hr>
			<?endforeach;?>
		</div>
	</div>
</div>
