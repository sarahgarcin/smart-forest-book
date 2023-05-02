<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $site->title() ?></title>
	
	<?= css("assets/preview.css")?>
	<?= css("assets/style.css")?>
	<?= js("assets/paged.polyfill.js")?>
	<?= js("assets/script.js")?>
</head>
<body class="<?php echo $page->template()?>">