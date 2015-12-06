<?$this->layout()->setLayout('standard');?>

<div class="mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp">
	<div class="mdl-card__media">
		<?=$this->editable('headerImage', 'image', array('thumbnail' => 'BlogHeaderImage'));?>
	</div>
	<div class="mdl-card__supporting-text">
		<h2 class="mdl-typography--display-1-color-contrast">
			<?=$this->editable('title', 'input', array('width' => 800));?>
		</h2>
		<?=$this->editable('perex', 'wysiwyg');?>
	</div>
	<div class="mdl-card__actions mdl-card--border">

	</div>
	<div class="mdl-card__supporting-text grex-text mdl-card--border">
		<?=$this->areablock('content', array(
			'allowed' => array('text'),
			'toolbar' => true,
			'params' => array(
				'text' => array('width' => 0)
			)
		));?>
	</div>
</div>
