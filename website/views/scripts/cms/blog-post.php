<?$this->layout()->setLayout('standard');?>

<div class="mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp">
	<div class="mdl-card__title">
		<h2 class="mdl-card__title-text">
			<?=$this->editable('title', 'input', array('width' => 500));?>
		</h2>
	</div>
	<div class="mdl-card__supporting-text">
		<?=$this->editable('perex', 'wysiwyg');?>
	</div>
	<div class="mdl-card__actions mdl-card--border">

	</div>
	<div class="mdl-card__supporting-text mdl-card--border">
		<?=$this->areablock('content', array(
			'allowed' => array('text'),
			'toolbar' => true,
			'params' => array(
				'text' => array('width' => 0)
			)
		));?>
	</div>
</div>
