<header class="mdl-layout__header mdl-layout__header--scroll grex-header">
	<div class="mdl-layout__header-row grex-header__row-100">
		<a href="/">
			<img class="grex__logo" src="/static/img/logo.png">
		</a>
		<div class="mdl-layout-spacer"></div>
		<?=$this->partial('snippets/nav-partial.php', array('header' => true));?>
	</div>
	<div class="grex__zigzag-bottom"></div>
</header>
<div class="mdl-layout__drawer grex-drawer">
	<span class="mdl-layout-title">Navigation</span>
	<?=$this->partial('snippets/nav-partial.php');?>
</div>
