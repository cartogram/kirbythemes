<?php
echo '<script type="text/ng-template" id="feed.html">';

    echo '<section class="posts-sliders" lw-posts-slides   cg-fill-view-port>';

            /**
            *   Image Slider
            */

        echo '<section class="js-swiper--images swiper-container posts-images-wrapper posts-images-wrapper--feed ">';

            echo '<div class="swiper-wrapper ">';

                echo '<div class="swiper-slide post-image" ng-repeat="post in feed.posts | filter:feed.filter">';

                    echo '<a href="#/{{post.uid}}"  class="post-image__image" cg-background-image="{{post.feature_image}}" ></a>';

                echo '</div>';

            echo '</div>';

        echo '</section>';

        echo '<section class="posts-feed text-left">';

            echo '<nav ng-controller="keywordNavCtrl as keywordNav">';

                echo '<ul class="js-feed-filters posts-feed__filters">';

                    echo '<li class="micro" ng-repeat="tag in feed.tags">';

                        echo '<a ng-class="{active:keywordNav.tagged(tag)}" ng-click="keywordNav.changeTagList(tag, \'add\')"><span class="" ng-bind="tag" ></span></a>';

                        echo '<a ng-if="keywordNav.tagged(tag)" ng-click="keywordNav.changeTagList(tag, \'remove\')">';

                            echo '<i class="icon icon--nano soft-half--left"><svg viewBox="0 0 64 64"><use xlink:href="#close"></svg></i>';

                        echo '</a>';

                    echo '</li>';


                echo '</ul>';

                echo '<a ng-click="keywordNav.showKeywordNav()" class="micro js-view-filters link--view-filters">';

                    echo '<i class="icon icon--micro soft--right"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-up"></svg></i>';

                    echo 'Filter by keyword ';

                echo '</a>';

            echo '</nav>';

            echo '<ul class="posts-feed__list">';

                echo '<li class="" ng-repeat="post in feed.posts | filter:feed.filter">';

                    echo '<a ng-href="#/{{post.uid}}"   ng-mouseover="activatePost($index)">';

                        echo '<span class="gamma" ng-bind="post.title" ></span>';

                        echo '<span  class="micro make-block soft-half--top">';

                            echo '<span ng-bind="post.year" class="soft--right"  ></span>';

                            echo '<span class="soft-half--right" ng-repeat="tag in post.tagsAsArray" ng-bind="tag"></span>';

                            echo '<span ng-bind="post.parent" class="soft-half--left" ></span>';

                        echo '</span>';
                    echo '</a>';

                echo '</li>';

            echo '</ul>';

        echo '</section>';


    echo '</section>';

echo '</script>';
?>
