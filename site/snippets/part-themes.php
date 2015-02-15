<?php

echo '<section id="themes" class="section grid-block vertical medium-horizontal">';

        // echo '<div class="content-block small-12">';
        //
        //     echo '<h1>' . $data->title()->html() . '</h1>';
        //
        //     echo $data->text()->kirbytext();
        //
        // echo '</div>';

    foreach($data->children()->visible() as $theme):

        echo '<div class="preload" style="overflow: hidden; width: 0px; height: 0px">';
            echo '<img src="' . $theme->image('site1.jpg')->url() . '" />';
            echo '<img src="' . $theme->image('site2.jpg')->url() . '" />';
            echo '<img src="' . $theme->image('site3.jpg')->url() . '" />';
            echo '<img src="' . $theme->image('site3r.jpg')->url() . '" />';
            echo '<img src="' . $theme->image('site4.jpg')->url() . '" />';
            echo '<img src="' . $theme->image('site4r.jpg')->url() . '" />';
        echo '</div>';

        echo '<div class="md-slider">';
            echo '<div class="md-device-wrapper">';
                echo '<div class="md-device md-device-1">';
                    echo '<a href="#">';
                        echo '<img src="' . $theme->image('site1.jpg')->url() . '" />';
                    echo '</a>';
                    echo '<div class="md-border-element"></div>';
                    echo '<div class="md-base-element"></div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';

        echo '<div class="content-block  text-left ">';

            //echo '<h2 class="push--bottom">' . $theme->title() . '</h2>';

            echo '<p class="lead push--bottom">' . $theme->text() . '</p>';

            echo '<a href="' . $theme->demo() . '" class="btn btn--secondary btn--full with-max push-half--bottom">Demo</a>';
            echo '<a href="' . $theme->buy() . '" class="btn btn--full with-max push-half--bottom">Buy</a>';

        echo '</div>';


    endforeach;

echo '</section>';



?>



<?php ?>
