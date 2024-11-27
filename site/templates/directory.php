<?php snippet('header') ?>

<h1>The Directory</h1>

<ul>
<?php foreach($page->children()->sortBy('title', 'asc') as $item): ?>
  <li>
    <a href="<?= $item->url() ?>">
      <?= $item->title()->esc() ?>
    </a>
  </li> 
<?php endforeach ?>
</ul>

<?php snippet('footer') ?>
