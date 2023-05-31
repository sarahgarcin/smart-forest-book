<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $site->title() ?> | <?= $page->title() ?></title>
	
	<?php if(!$page->isHomePage() && $page->intendedTemplate() !="web"):?>
		<?= css("assets/preview.css")?>
		<?= css("assets/interface-0.1.css")?>
	<?php endif;?>
	<?= css("assets/style.css")?>
	<?= css("assets/web.css")?>
	<?= js("assets/typopo.min.js")?>
	<?php if(!$page->isHomePage() && $page->intendedTemplate() !="web"):?>
		<?= js("assets/paged.polyfill.js")?>
		<?= js("assets/script.js")?>
	<?php else:?>
		<?= js("assets/script-web.js")?>
	<?php endif?>
</head>
<body class="<?php echo $page->intendedTemplate()?>">