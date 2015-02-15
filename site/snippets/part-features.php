<?php

echo '<section id="features" class="section grid-block vertical medium-horizontal">';

        // echo '<div class="content-block small-12">';
        //
        //     echo '<h1>' . $data->title()->html() . '</h1>';
        //
        //     echo $data->text()->kirbytext();
        //
        // echo '</div>';

    foreach($data->children()->visible() as $feature):

        echo '<div class="content-block small-12 medium-6 ">';

            echo '<div class="soft-double">';

                echo '<h3 class="push--bottom">' . $feature->heading() . '</h3>';

                echo $feature->text()->kirbytext();

            echo '</div>';

        echo '</div>';

    endforeach;

echo '</section>';

?>
