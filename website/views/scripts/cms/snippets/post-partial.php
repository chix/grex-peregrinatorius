<div class="mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp">
	<a href="<?=$this->post->getFullPath();?>">
		<?=\Website\Tool::image($this->post->getElement('headerImage'), $this->thumbnail);?>
	</a>
	<div class="mdl-card__title">
		<h2 class="mdl-card__title-text">
			<a href="<?=$this->post->getFullPath();?>">
				<?=$this->post->getElement('title');?>
			</a>
		</h2>
	</div>
	<div class="mdl-card__supporting-text">
		<?=$this->post->getElement('perex');?>
	</div>
	<div class="mdl-card__actions mdl-card--border">
		<a href="<?=$this->post->getFullPath();?>" class="mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Číst více
		</a>
	</div>
</div>