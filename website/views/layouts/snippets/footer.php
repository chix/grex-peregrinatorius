<div class="grex-wave"></div>
<footer class="mdl-mini-footer grex-footer">
	<div class="mdl-mini-footer__left-section">
		<div class="mdl-logo">Grex Peregrinatorius</div>
		<ul class="mdl-mini-footer__link-list">
			<?foreach($this->mainNavigation as $url => $title):?>
				<li><a href="<?=$url;?>"><?=$title;?></a></li>
			<?endforeach;?>
		</ul>
	</div>
</footer>
