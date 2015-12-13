<!--<?=\Website\Tool\Utils::image($this->post->getElement('headerImage'), $this->thumbnail);?>-->
<div class="post-preview">
	<a href="<?=$this->post->getFullPath();?>">
		<h2 class="post-title">
			<?=$this->post->getElement('title');?>
		</h2>
		<h3 class="post-subtitle">
			<?=$this->post->getElement('subTitle');?>
		</h3>
	</a>
	<?=$this->partial('cms/snippets/post-meta-partial.php', array(
		'post' => $this->post,
		'postList' => true
	));?>
</div>
