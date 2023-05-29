<?php snippet('header') ?>

<main>
  <?php $logbook = $page; ?>
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
</main>

<?php snippet('footer') ?>