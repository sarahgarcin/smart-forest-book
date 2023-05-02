<?php snippet('header'); ?>


	<div class="backcover">
		<?= $page->summary()->kt() ?>
	</div>

	<div class="back" style="width:<?= $page->back(); ?>mm; height: 24cm">
		<h1><?= $page->titleCouv() ?></h1>
	</div>

	<div class="cover">
		<h1><?= $page->titleCouv() ?></h1>
	</div>


<?php snippet('footer'); ?>