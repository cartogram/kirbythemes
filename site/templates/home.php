<?php

snippet('head');

snippet('svg-symbols');

snippet('header');


echo '<div class="wrap fill">';

    echo '<div class="loader--view" ng-show="viewIsLoading"></div>';

    echo '<section autoscroll  class="view-animate fill" ng-class="pagename" ng-view></section>';

echo '</div>';

snippet('main');

snippet('single');

snippet('about');

snippet('feed');

snippet('foot');


?>
