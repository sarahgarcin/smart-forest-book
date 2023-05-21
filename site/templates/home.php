<?php snippet('header'); ?>

<header>
	<h1><span>Smart</span> <span>Forests</span> <span>Atlas</span> <span>Books</span></h1>
</header>
<main>
	<ul class="books-list">
		<?php foreach($pages->listed()->filterBy('template', 'book') as $book):?>
			<li><a href="<?= $book->url()?>" title="<?= $book->title() ?>"><?= $book->title() ?></a></li>
		<?php endforeach?>
	</ul>
</main>

<?php snippet('footer'); ?>