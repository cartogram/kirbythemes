<?php
echo '<script type="text/ng-template" id="about.html">';

    echo '<div class="page">';

            echo '<div class="soft-double--top formatted text-left">';

                echo $site->about()->kirbytext();

            echo '</div>';

        echo '</div>';


    echo '</div>';

echo '</script>';
?>
