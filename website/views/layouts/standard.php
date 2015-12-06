<!DOCTYPE html>
<html lang="<?=$this->language;?>">
	<head>
		<title>
			<?=sprintf('%s%s%s',
				$this->document->getTitle(),
				$this->document->getProperty('titleSeparator'),
				$this->document->getProperty('titlePostfix')
			);?>
		</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">

		<link rel="shortcut icon" href="images/favicon.png">
		<?if($this->canonicalUrl):?>
			<link rel="canonical" href="<?=$this->canonicalUrl;?>">
		<?endif;?>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.brown-blue.min.css" />
		<link rel="stylesheet" type="text/css" href="/static/css/styles<?if(!PIMCORE_DEBUG) echo '.min';?>.css">

		<script type="text/javascript" src="/static/js/scripts<?if(!PIMCORE_DEBUG) echo '.min';?>.js"></script>
	</head>
	<body>
		<div class="grex mdl-layout mdl-js-layout mdl-layout--fixed-header">
			<?=$this->render('snippets/header.php');?>
			<main class="mdl-layout__content">
				<div class="mdl-grid grex__posts">
					<?=$this->layout()->content;?>
				</div>
			</main>
			<?=$this->render('snippets/footer.php');?>
		</div>
	</body>
</html>
