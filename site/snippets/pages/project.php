<div class="container max-w-3xl">
  <div class="mb-8">
    <div class="flex gap-4 items-center">
      <h1 class="text-xl font-semibold"><?= $project->title()->esc() ?></h1>
      <?php foreach ($project->projectStatus()->split() as $key => $status) : ?>
        <?php if ($key == 0) : ?>
          <span class="tag active"><?= $status ?></span>
        <?php else : ?>
          <span class="tag secondary active"><?= $status ?></span>
        <?php endif ?>
      <?php endforeach ?>
    </div>
    <h2 class="text-large font-serif font-normal">
      <?= $project->subHeading()->esc() ?>
    </h2>
  </div>

  <img class="mb-8" src="<?= $project->image()->url() ?>" alt="<?= $project->image()->alt()->esc() ?>">


  <div class="mb-8 grid grid-cols-3 justify-evenly gap-6">
    <div class="">
      <h3 class="text-small font-medium">LINKS</h3>
      <div>
        <?php
        $links = $project->links()->toStructure();
        foreach ($links as $link) : ?>
          <a class="inline-block mr-2" href="<?= $link->content()->url() ?>" target="_blank">
            <?= $link->content()->text() ?>
          </a>
        <?php endforeach ?>
      </div>
    </div>
    <div class="space-y-1">
      <h3 class="text-small font-medium">PROJECT TYPE</h3>
      <?php foreach ($project->type()->split() as $type) : ?>
        <span class="tag"><?= $type ?></span>
      <?php endforeach ?>
    </div>
    <div>
      <div class="mb-4">
        <h3 class="text-small font-medium">WORKING GROUP</h3>
        <Link href="">DAOStar One</Link>
      </div>
      <div>
        <h3 class="text-small font-medium">PRINCIPLE CONTACT</h3>
        <Link href="">Josh Tan</Link>
      </div>
    </div>
  </div>

  <div class="mb-8">
    <?= $project->about()->kt() ?>
  </div>

  <div class="mb-8">
    <h3 class="text-small font-medium">DESCRIPTION</h3>
    <div class="font-serif">
      <?= $project->description()->kt() ?>
    </div>
  </div>

  <div>
    <h3 class="text-small font-medium">PATHS TO PARTICIPATION</h3>
    <div class="font-serif">
      <?= $project->participation()->kt() ?>
    </div>
  </div>

</div>