<?php snippet('header'); ?>
<?php $coverPage = $page->parent()->children()->filterBy('intendedTemplate', 'cover')->first()?>
<?php $chapters = $page->parent()->children()->filterBy('intendedTemplate', 'inside')->children()->listed();?>

<header>
	<h1><?= $coverPage->titleCouv() ?></h1>
	<nav id="toc">
		<div id="toc-heading">
	      Table Of Contents
	  </div>
	</nav>
</header><!-- /header -->
<main id="contents">
	<?php foreach($chapters as $chapter):?>
		<div class="chapter-left-page">
			<?php if($chapter->link()->isNotEmpty()):?>
				<!-- /////// S T O R Y  /////// -->
				<?php if($chapter->intendedTemplate() == "story"):?>
					<?php foreach ($chapter->children() as $story): ?>
						<figure class="image-cover">
				    	<img src="<?= $story->cover() ?>" alt="">
				    </figure>
				  <?php endforeach?>
				<?php endif ?>
			<?php endif ?>
		</div>
		<div class="chapter <?= $chapter->uid() ?> <?php if($chapter->intendedTemplate() == "story"): echo "story"; elseif($chapter->intendedTemplate() == "logbook"): echo "logbook"; else: echo "default"; endif; ?>">
			<!-- get chapter from atlas website -->
			<?php if($chapter->link()->isNotEmpty()):?>
				<!-- /////// S T O R Y  /////// -->
				<?php if($chapter->intendedTemplate() == "story"):?>
					<?php foreach ($chapter->children() as $story): ?>
						<!-- <figure class="image-cover">
				    	<img src="<?= $story->cover() ?>" alt="">
				    </figure> -->
				    <h1><?= $story->title() ?></h1>
				    <p class="date-added">Added <?= date('m/d/Y', $logbook->added()->toDate())?></p>
				    <p class="label"><span class="chapter-number"><?= $chapter->num()?></span><span class="icon"><img src="<?= $site->url()?>/assets/stories.svg"></span><?= $story->label() ?></p>
				    <div class="meta">
					    <div class="contributors">
					    	<?php foreach($story->contributors() as $contributors):?>
						    	<h5>Contributors</h5>
						    	<ul>
						    	<?php foreach($contributors as $contributor):?>
										<li class="author-index" data-book-index="<?= $contributor->first_name ?> <?= $contributor->last_name ?>"><?= $contributor->first_name ?> <?= $contributor->last_name ?></li>
						    	<?php endforeach;?>
						    	</ul>
					    	<?php endforeach ?>
					    </div>
	<!-- 				    <div class="location">
					    	<h5>Location</h5>
					    	<p class="city"><?= $story->location()?></p>
					    	<p class="coordinates">
					    		<?php foreach($story->coordinates() as $coordinates):?>
					    			<?= $coordinates[0]?> / <?= $coordinates[1]?>
					    		<?php endforeach;?>
					    	</p>

					    	
					    </div> -->
					    <!-- fetch article tags -->
					    <div class="tags">
					    	<h5>Tags</h5>
					    	<ul>
						    <?php foreach($story->tags() as $tags):?>
						    	<?php foreach($tags as $tag):?>
						    		<li class="book-index" data-book-index="<?= $tag ?>"><?= $tag ?></li> 
						    	<?php endforeach ?>
						    <?php endforeach ?>
						  	</ul>
					   	</div>
				   	</div>
				   	<div class="story-content">
					   	<!-- fetch content of article -->
					   	<?php foreach($story->text() as $textArray):?>
					   		<?php foreach($textArray as $text):?>
					   			<!-- fetch text content -->
					   			<?php if($text->type == 'text'):?>
					   				<div class="story-content-text">
					   					<?= $text->value ?>
					   				</div>
					   			<!-- fetch image content -->
					   			<!-- trouver comment afficher les images -->
					   			<?php elseif($text->type == 'image'):?>
					   				<figure>
					   					<img src="<?= $text->value->image->id->meta->download_url ?>" alt="<?= $text->value->image->id->title ?>">
					   					<figcaption><?= $text->value->caption ?></figcaption>
					   				</figure>
					   			<?php elseif($text->type == 'embed'):?>
		<!-- 			   				<iframe width="200" height="113" src="<?= $text->value ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> -->
					   			<?php else: ?>
					   					
					   			<?php endif; ?>
					   			
					   		<?php endforeach ?>
					   	<?php endforeach ?>
					  <?php endforeach ?>
					</div>
				<!--  /////// L O G B O O K /////// -->
				<?php elseif($chapter->intendedTemplate() == "logbook"):?>
					<?php foreach ($chapter->children() as $logbook): ?>
				    <h1><?= $logbook->title() ?></h1>
				    <p class="date-added">Added <?= date('m/d/Y', $logbook->added()->toDate())?></p>
				    <p class="label"><span class="chapter-number"><?= $chapter->num()?></span><span class="icon"><img src="<?= $site->url()?>/assets/logbooks.svg"></span><?= $logbook->label() ?></p>
				    <!-- fetch article tags -->
				    <div class="meta">
					    <div class="contributors">
					    	<?php foreach($logbook->contributors() as $contributors):?>
						    	<h5>Contributors</h5>
						    	<ul>
						    	<?php foreach($contributors as $contributor):?>
										<li class="author-index" data-book-index="<?= $contributor->first_name ?> <?= $contributor->last_name ?>"><?= $contributor->first_name ?> <?= $contributor->last_name ?></li>
						    	<?php endforeach;?>
						    	</ul>
					    	<?php endforeach ?>
					    </div>
					    <!-- fetch article tags -->
					    <div class="tags">
					    	<h5>Tags</h5>
					    	<ul>
						    <?php foreach($logbook->tags() as $tags):?>
						    	<?php foreach($tags as $tag):?>
						    		<li class="book-index" data-book-index="<?= $tag ?>"><?= $tag ?></li> 
						    	<?php endforeach ?>
						    <?php endforeach ?>
						  	</ul>
					   	</div>
				   	</div>
				   	<div class="description">
				   		<?= $logbook->description() ?>
				   	</div>
				   	<!-- GET ALL ARTICLES FROM LOGBOOKS -->
				   	<?php foreach($logbook->articles() as $articles): ?>
				   		<?php foreach($articles as $article): ?>
				   			<div class="logbook-article">			   			
						   		<h2><?= $article->title?></h2>
						   		<?php //print_r($article[0]->body)?>
						   		<div class="logbook-content">
						   			<?php $textVal = '';?>
								   	<!-- fetch content of article -->
								   	<?php foreach($article->body as $textArray):?>
								   		<!-- fetch text content -->
							   			<?php if($textArray->type == 'text'):?>
							   				<div class="logbook-content-text">
							   					<?= $textArray->value ?>
							   					<?php $textVal = $textVal . $textArray->value;?>
							   				</div>
							   			<!-- fetch image content -->
							   			<?php elseif($textArray->type == 'image'):?>
							   				<figure class="<?php if(strlen($textVal) < 900): echo 'absolute'; endif;?>">
							   					<img src="<?= $textArray->value->image->id->meta->download_url ?>" alt="<?= $textArray->value->image->id->title ?>">
							   					<figcaption><?= $textArray->value->caption ?></figcaption>
							   				</figure>
							   			<?php else:?>
							   					
							   			<?php endif; ?>
								   	<?php endforeach ?>
									</div>
								</div>
							<?php endforeach ?>
				   	<?php endforeach ?>
				  <?php endforeach; ?>
				<?php endif; ?>
			<!-- if link in page is empty -->
			<?php else:?>
				<!-- create new page from authors pas -->
				<?php if($chapter->intendedTemplate() == "authors"):?>
					<div class="author-page">
						<h1><?= $chapter->title() ?></h1>
						<?php foreach ($chapter->children() as $authors): ?>
							<div class="content">
						    <h2><?= $authors->title() ?></h2>
						    <h3><?= $authors->subtitle() ?></h3>
						    <?= $authors->bio() ?>
					  	</div>
						<?php endforeach ?>
					</div>
				<?php else:?>
					<!-- create new page from atlas website -->
					<div class="default-page">
						<!-- create new page from atlas website -->
						<h1><?= $chapter->title() ?></h1>
						<h2><?= $chapter->subtitle() ?></h2>
						<section class="content">
							<?= $chapter->text()->toBlocks() ?>
						</section>
					</div>
				<?php endif?>
			<?php endif?>
		</div>	
	<?php endforeach ?>
</main>


<?php snippet('footer'); ?>