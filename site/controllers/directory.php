<?php

return function ($page, $pages, $site, $kirby) {
  $shared = $kirby->controller('site', compact('page', 'pages', 'site', 'kirby'));
  $categories = $page->children()->pluck("category", ",", true);
  $stages = $page->children()->pluck("stage", ",", true);
  // $types = $page->children()->pluck("type", ",", true);
  // $status = $page->children()->pluck("project_status", ",", true);;
  // $seekingParticipants = ['Yes', 'No'];

  return A::merge($shared, compact('categories', 'stages', /*, 'types', 'status', 'seekingParticipants' */));
};
