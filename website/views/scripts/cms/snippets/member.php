<?if($this->editmode):?>
	<?$this->layout()->setLayout('snippet');?>
<?endif;?>

<?
	$id = \Website\Tool\Utils::webalize($this->editable('name', 'input'));
?>
<div class="media" id="<?=$id;?>">
	<div class="row">
		<div class="col-xs-4">
			<div class="media-left">
				<a href="#<?=$id;?>" class="thumbnail">
					<?=$this->editable('photo', 'image', array(
						'thumbnail' => 'MemberPhoto',
						'uploadPath' => '/clenove'
					));?>
				</a>
			</div>
		</div>
		<div class="col-xs-8">
			<div class="media-body">
				<h3 class="media-heading"><?=$this->editable('name', 'input');?></h3>
				<?=$this->editable('description', 'wysiwyg');?>
			</div>
		</div>
	</div>
</div>