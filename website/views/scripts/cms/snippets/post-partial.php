<!--<?=\Website\Tool::image($this->post->getElement('headerImage'), $this->thumbnail);?>-->
<div class="post-preview">
	<a href="<?=$this->post->getFullPath();?>">
		<h2 class="post-title">
			<?=$this->post->getElement('title');?>
		</h2>
		<h3 class="post-subtitle">
			<?=$this->post->getElement('subTitle');?>
		</h3>
	</a>
	<!--<p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>-->
</div>
