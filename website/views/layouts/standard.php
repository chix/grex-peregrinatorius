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
		<link rel="stylesheet" type="text/css" href="/static/css/styles<?if(!PIMCORE_DEBUG) echo '.min';?>.css">

		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<script type="text/javascript" src="/static/js/scripts<?if(!PIMCORE_DEBUG) echo '.min';?>.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?=$this->render('snippets/nav.php');?>

		<?=$this->layout()->content;?>

		<hr>

		<?=$this->render('snippets/footer.php');?>

		<?if(!$this->editmode && !\Pimcore\Tool::isFrontentRequestByAdmin()):?>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-72527137-1', 'auto');
				ga('send', 'pageview');
			</script>
		<?endif;?>
	</body>
</html>
