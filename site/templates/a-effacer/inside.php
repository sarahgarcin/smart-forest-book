<?php snippet('header'); ?>

<?php $chapters = $page->children()->listed();?>
<?php foreach($chapters as $chapter):?>
	<div class="chapter-left-page">

	</div>
	<div class="chapter <?= $chapter->template()?> <?= $chapter->uid() ?>">
			<h1><?= $chapter->title() ?></h1>
			<h2><?= $chapter->subtitle() ?></h2>
			<section class="content">
				<?= $chapter->text()->toBlocks() ?>
			</section>
	</div>
<?php endforeach ?>

<?php snippet('footer'); ?>