<?php

echo '<section id="themes" class="section--full push-double--bottom">';

    foreach($data->children()->visible() as $theme):

        echo '<section id="intro" class="intro section text-left">';

            snippet('header');

            echo '<article class="theme__info ">';

                echo '<h1 class="push--bottom">' . 'Premium Themes<br/>for Kirby CMS' . '</h1>';

                    echo '<p class="lead push--bottom">' . $theme->text() . '</p>';

                    echo '<a href="' . $theme->demo() . '" class="btn btn--secondary btn--full with-max push-half--bottom ">Demo</a>';

                    echo '<a href="' . $theme->buy() . '" class="btn btn--full with-max push-half--bottom">Buy</a>';

            echo '</article>';

        echo '</section>';

        echo '<div class="devices">';

            echo '<div class="device  device-1">';
                echo '<a href="#">';
                    echo '<img src="' . $theme->image('site1.jpg')->url() . '" />';
                echo '</a>';
                echo '<div class="md-border-element"></div>';
                echo '<div class="md-base-element"></div>';
            echo '</div>';

            echo '<div class="device show-for-medium device-2">';
                echo '<a href="#">';
                    echo '<img src="' . $theme->image('site2.jpg')->url() . '" />';
                echo '</a>';
                echo '<div class="md-border-element"></div>';
                echo '<div class="md-base-element"></div>';
            echo '</div>';

            echo '<div class="device show-for-large device-3">';
                echo '<a href="#">';
                    echo '<img src="' . $theme->image('site3r.jpg')->url() . '" />';
                echo '</a>';
                echo '<div class="md-border-element"></div>';
                echo '<div class="md-base-element"></div>';
            echo '</div>';

            echo '<div class="device device-4">';
                echo '<a href="#">';
                    echo '<img src="' . $theme->image('site4.jpg')->url() . '" />';
                echo '</a>';
                echo '<div class="md-border-element"></div>';
                echo '<div class="md-base-element"></div>';
            echo '</div>';

        echo '</div>';



    endforeach;

echo '</section>';



?>



<?php ?>
