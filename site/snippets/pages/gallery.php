<div id="projects" class="container max-w-[1088px] py-8">
  <div class="mb-12">
  <h1 class="text-xl font-semibold mb-2">Deliberative Tool Gallery</h1>
  </div>
  <div class="flex">
    <div class="flex-none w-64 divide-y p-2">
      <h4 class="font-extrabold text-brand p-2">Stage</h4>
      <ul>
      <?php snippet('blocks/checkboxfilter', ['filters' => $stages, 'group' => 'stage', 'label' => 'Stage']) ?>
      </ul>
      <div class="p-2">
      <input class="search w-full md:w-1/2 lg:w-auto" placeholder="Search" />
      </div>

    </div>
    <div class="flex-1">
      <ul class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6 mx-auto list">
        <?php foreach ($page->children()->sortBy('title', 'asc') as $project) : ?>
          <li class="list-none" data-title="<?= $project->title() ?>" data-status="<?= $project->projectStatus() ?? null ?>" data-type="<?= $project->type() ?? null ?>" data-category="<?= $project->category() ?? null ?>" data-stage="<?= $project->stage() ?? null ?>" data-participants="<?= ($project->seekingParticipants()->toBool()) ? 'Yes' : 'No' ?>">
            <a href="<?= $project->url() ?>">
              <?php snippet('window', ['title' => $project->title(), 'subheading' => $project->subheading()], slots: true) ?>
              <?php if ($image = $project->cover()->toFile()) : ?>
                <img class="w-full" src="<?= $image->crop(434, 235, "center")->url() ?>" srcset="<?= $image->srcset(
                                                                                                    [
                                                                                                      '1x'  => ['width' => 434, 'height' => 235, 'crop' => 'center'],
                                                                                                      '2x'  => ['width' => 868, 'height' => 470, 'crop' => 'center'],
                                                                                                      '3x'  => ['width' => 1320, 'height' => 705, 'crop' => 'center'],
                                                                                                    ]
                                                                                                  ) ?>" alt="<?= $image->alt()->esc() ?>" width="<?= $image->resize(434)->width() ?>" height="<?= $image->resize(235)->height() ?>">
              <?php endif ?>
              <?php endsnippet() ?>
            </a>
          </li>

        <?php endforeach ?>
      </ul>
    </div>
    <div id="no-result" class="hidden">
      <p>No projects found</p>
    </div>
  </div>
</div>


<script>
  var filters = {
    stage: []
  }

  var options = {
    valueNames: [{
      data: ['stage']
    }]
  }

  var projectList = new List('projects', options);
  console.log('projectList', projectList)

  projectList.on('updated', function(list) {
    if (list.matchingItems.length > 0) {
      document.getElementById("no-result").style.display = 'hidden'
    } else {
      document.getElementById("no-result").style.display = 'block'
    }
  });

  var resetFilter = () => {
    filters = {
      stage: [],
    }
    updateList()
  }

  var updateList = () => {
    projectList.filter(function(item) {
      let stage = false

      if (filters.stage.find((element) => item.values().stage.includes(element)) || filters.stage.length == 0) {
        stage = true
      } else {
        stage = false
      }

      if (stage) return true
      return false
    })
  }

  var toggleFilter = (e) => {
    const checked = e.target.checked
    const value = e.target.dataset.value
    const group = e.target.dataset.group

    if (checked) {
      filters[group].push(value)
    } else {
      const index = filters[group].indexOf(value);
      if (index > -1) {
        filters[group].splice(index, 1);
      }
    }

    updateList()
  }
</script>
