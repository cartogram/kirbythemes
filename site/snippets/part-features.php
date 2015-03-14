<?php

echo '<section id="features" class="push-double--ends soft-double--ends features section--full grid-block vertical medium-horizontal">';

        echo '<div class="section grid-block vertical medium-horizontal">';


    foreach($data->children()->visible() as $feature):

        echo '<div class="content-block small-12 medium-6 text-left ">';

            echo '<div class="soft-double">';

                echo '<h3 class="push--bottom">' . $feature->heading() . '</h3>';

                echo $feature->text()->kirbytext();

            echo '</div>';

        echo '</div>';

    endforeach;
    echo '</div>';

echo '</section>';

?>
