<?php

snippet('head');

snippet('svg-symbols');

echo '<div kt-set-background class="main">';

snippet('header');

echo '<section id="intro" class="section">';

    echo '<h1>' . $site->description()->html() . '</h1>';

echo '</section>';

foreach($pages->visible() as $section) {

  snippet('part-' . $section->uid(), array('data' => $section));

}

snippet('footer');

echo '</div>';

snippet('foot');

?>
