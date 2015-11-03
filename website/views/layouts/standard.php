<!DOCTYPE html>
<html lang="<?= $this->language; ?>">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/static/css/styles<?if(!PIMCORE_DEBUG) echo '.min';?>.css">
		<script type="text/javascript" src="/static/js/scripts<?if(!PIMCORE_DEBUG) echo '.min';?>.js"></script>
	</head>
	<body>
		<?= $this->layout()->content; ?>
	</body>
</html>
