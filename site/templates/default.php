<?php

snippet('head');

snippet('svg-symbols');

echo '<div kt-set-background class="main">';

foreach($pages->visible() as $section) {

  snippet('part-' . $section->uid(), array('data' => $section));

}

snippet('footer');

echo '</div>';

snippet('foot');

?>
