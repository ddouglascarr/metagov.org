<?php

return function ($page, $pages, $site, $kirby) {
  syslog(LOG_WARNING, "foobar");
  $shared = $kirby->controller('site', compact('page', 'pages', 'site', 'kirby'));
  $titleTag = $site->title();
  $metaDescription = $site->seoDescription();
  $windows = $page->windows()->toStructure();
  $chaosHeight = count($windows) * 125;
  return A::merge($shared, compact('titleTag', 'metaDescription', 'windows', 'chaosHeight'));
};
