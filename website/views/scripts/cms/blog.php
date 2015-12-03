<?$this->layout()->setLayout('standard');?>

<?foreach((array)$this->posts as $post):?>
	<?=$this->partial('cms/snippets/post-partial.php', array('post' => $post));?>
<?endforeach;?>
