<?$this->layout()->setLayout('standard');?>

<?=$this->render('cms/snippets/header.php');?>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?=$this->areablock('content', array(
				'allowed' => array('text'),
				'toolbar' => true,
				'params' => array(
					'text' => array('width' => 0)
				)
			));?>
		</div>
	</div>
</div>
