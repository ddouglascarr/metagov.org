
<?php snippet('header') ?>

<table>
<tr>
<th>Foo</th>
<td><?= $page->foo()->esc() ?></td>
</tr>
</table>

<?php if ($page->People()->count()) : ?>
  <h2>People</h2>
  <?php foreach($page->People()->toPages() as $person) : ?>
    <a href="<?= $person->url() ?>"><?= $person->title()->esc() ?></a>
  <?php endforeach ?>
<?php endif ?>

<?php snippet('footer') ?>
