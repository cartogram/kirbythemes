<?php

echo '<header class="text-center header  " role="banner">';

    echo '<a class=" header__logo  " href="#/">';

        echo '<span class="soft-double--left milli locase  make-block">'  . $site->title()->html() . '</span>';

    echo '</a>';

    echo '<nav class="header__nav">';

        echo '<ul class="list--inline milli locase nav--global ">';

            echo '<li class="text-right" ng-class="{ \'is-active\': pagename==\'about\'}"><a class="link--primary" href="#/about">About</a></li>';

            echo '<li class="input">';

                echo '<form ng-class="{ \'has-error\' : form.EMAIL.$invalid }"  class=" form" action="//cartogram.us1.list-manage.com/subscribe/post?u=d5f1f09507f681778652f9a26&amp;id=9cf675997f" method="post" id="mc-embedded-subscribe-form" name="form" class="validate"  novalidate target="_blank" >';

                echo '<div style="position: absolute; left: -5000px;"><input type="text" name="b_d5f1f09507f681778652f9a26_9cf675997f" tabindex="-1" value=""></div>';

                    echo '<input lw-input class="input__field" required autocomplete="off" type="email" value="" ng-model="email" name="EMAIL" placeholder="Enter your email and press enter..." id="mce-EMAIL">';

                    echo '<label for="mce-EMAIL" class="text-left  input__label">';

                        echo '<span class="link--primary">Newsletter</span>';

                    echo'</label>';

                    echo '<button ng-hide="form.EMAIL.$error.email || form.EMAIL.$error.required" type="submit" name="subscribe" id="mc-embedded-subscribe" class="input__btn btn btn--animated">Subscribe</button>';

                echo '</form>';

            echo '</li>';

        echo '</ul>';

    echo '</nav>';

    echo '<div class="loader">';

        echo '<span class="meta">Loading...</span>';

    echo '</div>';

echo '</header>';

?>
