<?php snippet('header'); ?>

<?php $chapters = $site->find('interieur')->children()->listed();?>
<?php foreach($chapters as $chapter):?>
	<div class="chapter-left-page">

	</div>
	<div class="chapter <?= $chapter->uid() ?>">
		<!-- get chapter from atlas website -->
		<?php if($chapter->link()->isNotEmpty()):?>
			<?= $chapter->link()->html()?>
			<?php foreach ($chapter->children() as $existing): ?>
		    <h1><?= $existing->title() ?></h1>
		    <!-- fetch article tags -->
		    <p>
		    <?php foreach($existing->tags() as $tags):?>
		    	<?php foreach($tags as $tag):?>
		    		<?= $tag ?> /
		    	<?php endforeach ?>
		    <?php endforeach ?>
		   	</p>
		   	<!-- fetch content of article -->
		   	<?php foreach($existing->text() as $textArray):?>
		   		<?php foreach($textArray as $text):?>
		   			<!-- fetch text content -->
		   			<?php if($text->type == 'text'):?>
		   				<?= $text->value ?>
		   			<!-- fetch image content -->
		   			<!-- trouver comment afficher les images -->
		   			<?php elseif($text->type == 'image'):?>
		   				<figure>
		   					<img src="<?= $text->value->image->id->meta->download_url ?>" alt="<?= $text->value->image->id->title ?>">
		   					<figcaption><?= $text->value->image->id->title ?></figcaption>
		   				</figure>
		   			<?php else: ?>
		   					
		   			<?php endif; ?>
		   			
		   		<?php endforeach ?>
		   	<?php endforeach ?>
		  <?php endforeach ?>
			<!-- create new page from atlas website -->
		<?php else:?>
			<h1><?= $chapter->title() ?></h1>
			<h2><?= $chapter->subtitle() ?></h2>
			<section class="content">
				<?= $chapter->text()->toBlocks() ?>
			</section>
		<?php endif?>
	</div>
<?php endforeach ?>

<?php snippet('footer'); ?>