<?php
echo '<script type="text/ng-template" id="single.html">';
    /**
    *   Sliders
    */

    echo '<section class="posts-single"
        cg-fill-view-port
        lw-posts-slides
        index="{{single.post.index}}"
        ng-class="{
            \'is-active\' : content.entered,
            \'is-not-active\' : content.exited
        }">';

        /**
        *   Text
        */

        echo '<section class="posts-texts-wrapper " cg-background-image="{{single.post.feature_image}}">';

            // echo '<div class="post-text"">';
            //
            //     echo '<div class="post-text__mast on-left" >';
            //
            //         echo '<div class=" centered--vertical post-text__title ">';
            //
            //             echo '<h1 class="make-block" ng-bind="single.post.title"></h1>';
            //
            //         echo '</div>';
            //
            //         echo '<div class="post-mast__meta ">';
            //
            //             echo '<ul class="list--inline  ">';
            //
            //                echo '<li><span ng-bind="single.post.parent"></span></li>';
            //
            //             echo '</ul>';
            //
            //         echo '</div>';
            //
            //     echo '</div>';
            //
            //     echo '<div class="post-text__mast on-right" >';
            //
            //         echo '<div class=" centered--vertical post-text__summary medium-text-left ">';
            //
            //                 echo '<div ng-bind-html="single.post.summary">';
            //
            //                 echo '</div>';
            //
            //         echo '</div>';
            //
            //         echo '<div class="post-mast__meta on-right ">';
            //
            //             echo '<ul class="milli list--inline  ">';
            //
            //                 echo '<li ><</li>';
            //
            //             echo '</ul>';
            //
            //         echo '</div>';
            //
            //
            //     echo '</div>';
            //
            // echo '</div>';

            echo '<a cg-scroll-on-click wrapper=".posts-single" class="link--view-single split--both link--block" >';

                echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-down"></svg></i>';

            echo '</a>';

        echo '</section>';

        echo '<div id="js-anchor--content" class="posts-single__content "
            zum-waypoint="content"
            down="entered"
            up="exited"
            offset="20%">';

            echo '<header class="heading-block split--right">';

                echo '<h1 class="beta soft-double--top soft-half--bottom  " ng-bind-html="single.post.title"></h1>';

                echo '<ul class="milli list--inline soft-double--bottom ">';

                echo '<li><span class="meta">in</span></li>';

                echo '<li ng-if="single.post.tagsAsArray.length > 1" ng-repeat="tag in single.post.tagsAsArray"><span class="meta split--full" ng-bind="tag"></span></li>';

                echo '<li><span class="meta split--full" ng-bind="single.post.parent"></span></li>';

                echo '</ul>';

            echo '</header>';

            echo '<div class="formatted soft-double--bottom">';

                echo '<div ng-bind-html="single.post.text"></div>';

            echo '</div>';

            echo '<ul class="milli list--inline text-center soft-double--top  soft-double--bottom  ">';

            echo '<li><span class="meta">share on </span></li>';

                echo '<li><a class="locase link--primary " ng-href="http://twitter.com/share?url=' . '{{single.post.url}}' . '&text=' . '{{single.post.title}}' . ' via @USERNAME" target="_blank">Twitter</a></li>';
                echo '<li><a class="locase link--primary " ng-href="http://www.facebook.com/sharer.php?u=' . '{{single.post.url}}' . '" >Facebook</a></li>';
                echo '<li><a class="locase link--primary " ng-href="https://plus.google.com/share?url=' . '{{single.post.url}}' . '"  >Google +</a></li>';

            echo '</ul>';

            echo '<nav class="nav--next-prev text-center">';

                echo '<a ng-if="single.post.previous" ng-class="{\' is-disabled \': !single.post.previous}" ng-href="#/{{single.post.previous.uid}}" class="next-prev--prev" >';

                    echo '<div class="next-prev__image" cg-background-image="{{single.post.previous.feature_image}}"></div>';

                    echo '<div class="next-prev__text">';

                    echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-left"></svg></i>';

                    echo '<span class="meta make-block">Previous in {{single.post.parent}}</span>';

                    echo '<h1 class="gamma soft--top soft-half--bottom  " ng-bind-html="single.post.previous.title"></h1>';

                    echo '</div>';

                echo '</a>';

                echo '<a ng-if="single.post.next" ng-class="{\' is-disabled \': !single.post.next}"  ng-href="#/{{single.post.next.uid}}" class="next-prev--next" >';

                    echo '<div class="next-prev__image" cg-background-image="{{single.post.next.feature_image}}"></div>';

                    echo '<div class="next-prev__text">';

                    echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-right"></svg></i>';

                    echo '<span class="meta  make-block">Next in {{single.post.parent}}</span>';

                    echo '<h1 class="gamma soft--top soft-half--bottom  " ng-bind-html="single.post.next.title"></h1>';

                    echo '</div>';

                echo '</a>';

            echo '</nav>';


            /**
            *   Grid
            */

            // echo '<section class="section section--grid" >';
            //
            //     echo '<a class="grid__item" ng-href="#/{{post.uid}}" ng-repeat="post in single.posts | filter:{parent : single.post.parent }">';
            //
            //         echo '<div class="grid__item__image" cg-background-image="{{post.feature_image}}"></div>';
            //
            //         echo '<h4 class="grid__item__title soft-double--top soft-half--bottom  " ng-bind-html="post.title"></h4>';
            //
            //     echo '</a>';
            //
            // echo '</section>';

            echo '<a cg-scroll-on-click distance="0" class="link--to-top split--both link--block">';

                echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-up"></svg></i>';

            echo '</a>';

        echo '</div>';

        /**
        *   Meta Slider
        */

        echo '<aside class="js-swiper--meta  swiper-container  posts-meta-wrapper side-left " role="aside">';

            echo '<div class="swiper-wrapper ">';

                echo '<div class="swiper-slide post-meta" ng-repeat="post in single.posts">';

                    echo '<span class="posts-count__index meta " ng-bind="post.index + 1"></span>';

                echo '</div>';

            echo '</div>';

            echo '<span class="posts-count__total meta" ng-bind="single.items"></span>';


        echo '</aside>';


        /**
        *   Feed Link
        */

        echo '<div class="text-center side-right " >';

        echo '</div>';

    echo '</section>';



echo '</script>';
?>
