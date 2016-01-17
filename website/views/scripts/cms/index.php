<?$this->layout()->setLayout('standard');?>

<?=$this->render('cms/snippets/header.php');?>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<?foreach((array)$this->posts as $post):?>
				<?=$this->partial('cms/snippets/post-partial.php', array(
					'post' => $post,
					'thumbnail' => 'BlogHeaderImageAlt'
				));?>
				<hr>
			<?endforeach;?>
			<!-- Pager -->
			<ul class="pager">
				<li class="previous">
					<a href="/blog">Další články &rarr;</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-4">
			<div class="grex-partners">
				<?=$this->areablock('partners', array(
					'allowed' => array('text', 'partner'),
					'toolbar' => true,
					'params' => array(
						'text' => array('width' => 0),
						'partner' => array('thumbnail' => 'PartnerLogo', 'width' => 0)
					)
				));?>
				<ul class="pager">
					<li class="previous">
						<a href="/partneri">Všichni partneři &rarr;</a>
					</li>
				</ul>
			</div>
			<div class="grex-twitter">
				<a class="twitter-timeline" href="https://twitter.com/grex_pere" data-widget-id="674288983434772480">Tweets by @grex_pere</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
	</div>
</div>
