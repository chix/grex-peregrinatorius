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
				<li class="next">
					<a href="/blog">Další články &rarr;</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-4">
			<div class="grex-twitter">
				<a class="twitter-timeline" href="https://twitter.com/grex_pere" data-widget-id="674288983434772480">Tweets by @grex_pere</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<!--
			<div class="grex-facebook">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/cs_CZ/sdk.js#xfbml=1&version=v2.5&appId=891053160991486";
					fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-page" data-href="https://www.facebook.com/grex.pere1" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/grex.pere1"><a href="https://www.facebook.com/grex.pere1">Grex Peregrinatorius</a></blockquote></div></div>
			</div>
   			-->
		</div>
	</div>
</div>


<!--
-->
