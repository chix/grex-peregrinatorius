<nav class="mdl-navigation<?if($this->header) echo ' mdl-layout--large-screen-only';?>">
	<?foreach($this->navigation as $url => $title):?>
		<a href="<?=$url;?>" class="mdl-navigation__link"><?=$title;?></a>
	<?endforeach;?>
</nav>
<?if($this->header):?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
				mdl-textfield--floating-label mdl-textfield--align-right">
		<label class="mdl-button mdl-js-button mdl-button--icon"
				for="fixed-header-drawer-exp">
			<i class="material-icons">search</i>
		</label>
		<div class="mdl-textfield__expandable-holder">
			<input class="mdl-textfield__input" type="text" name="q"
					id="fixed-header-drawer-exp">
		</div>
	</div>
<?endif;?>
