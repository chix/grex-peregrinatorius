<?$this->layout()->setLayout('standard');?>

<div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
	<?foreach((array)$this->posts as $post):?>
		<?=$this->partial('cms/snippets/post-partial.php', array(
			'post' => $post,
			'thumbnail' => 'BlogHeaderImageAlt'
		));?>
	<?endforeach;?>
</div>

<div class="mdl-cell mdl-cell--4-col mdl-cell--2-col-tablet mdl-cell--4-col-phone">
	<div class="mdl-card">
		<div class="mdl-card__title mdl-card--expand">
			<h1 class="mdl-card__title-text">Grex Peregrinatorius</h1>
		</div>
		<div class="mdl-card__supporting-text">
			Jakkoliv, kdykoliv a kdekoliv aneb o všem veselém i smutném, co naše partička zažívá na cestách a o všem, co by nemělo ujít lidem s toulavými botami.
		</div>
		<div class="mdl-card__actions mdl-card--border">
			<a href="/kdo-jsme" class="mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				Více o nás
			</a>
		</div>
	</div>
	<div class="grex-twitter">
		<a class="twitter-timeline" href="https://twitter.com/grex_pere" data-widget-id="673533551950843904">Tweets by @grex_pere</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>
