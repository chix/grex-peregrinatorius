<nav class="mdl-navigation<?if($this->header) echo ' mdl-layout--large-screen-only';?>">
	<a href="javascript:void();" class="mdl-navigation__link">Who we are</a>
	<a href="/blog" class="mdl-navigation__link">Blog</a>
	<a href="javascript:void();" class="mdl-navigation__link">Partners</a>
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
