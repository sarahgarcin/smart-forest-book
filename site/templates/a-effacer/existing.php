<?php snippet('header') ?>

<main>
  <header>
    <h1><?= $page->title() ?></h1>
  </header>
  <ul>
    <?php foreach ($page->children() as $existing): ?>
    <li>
      <h2><?= $existing->title() ?></h2>
    </li>
    <?php endforeach ?>
  </ul>
</main>

<?php snippet('footer') ?>