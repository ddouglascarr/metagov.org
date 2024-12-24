
<?php foreach ($filters as $filter) : ?>
  <label class="p-2 hover:bg-brand/15 filter-checkbox flex justify-between items-center cursor-pointer text-brand" >
    <?= $filter ?>
    <input class="peer" data-value="<?= $filter ?>" data-group="<?= $group ?>" type="checkbox" x-on:change="toggleFilter" />
    <svg class="filter-checkbox-svg invisible peer-checked:visible" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3C13.72 3 13.47 3.11 13.29 3.29L6 10.59L2.71 7.29C2.53 7.11 2.28 7 2 7C1.45 7 1 7.45 1 8C1 8.28 1.11 8.53 1.29 8.71L5.29 12.71C5.47 12.89 5.72 13 6 13C6.28 13 6.53 12.89 6.71 12.71L14.71 4.71C14.89 4.53 15 4.28 15 4C15 3.45 14.55 3 14 3Z" fill="#00CC99" />
    </svg>
  </label>
<?php endforeach ?>
