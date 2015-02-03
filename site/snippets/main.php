<?php
echo '<script type="text/ng-template" id="main.html">';

    // echo '<section class="section section--intro intro"
    // cg-fill-view-port>';
    //
    //     echo '<a class="intro__text make-block" cg-scroll-on-click="#posts">Introduction</a>';
    //
    // echo '</section>';

    /**
    *   Sliders
    */

    echo '<section id="posts"
        class="section--main posts-sliders "
        lw-posts-slides
        cg-fill-view-port
        ng-class="{
            \'filters-is-visible\' : main.filtersIsVisible
        }">';

        /**
        *   Image Slider
        */

        echo '<section class="js-swiper--images swiper-container posts-images-wrapper ">';

            echo '<div class="swiper-wrapper ">';

                echo '<div class="swiper-slide post-image" ng-repeat="post in main.posts">';

                    echo '<a href="#/{{post.uid}}"  class="post-image__image" cg-background-image="{{post.feature_image}}" ></a>';

                echo '</div>';

            echo '</div>';

        echo '</section>';

        /**
        *   Text Slider
        */

        echo '<section
            class="js-swiper--texts swiper-container posts-texts-wrapper "
            ng-class="main.posts[activePostIndex].parent"
            >';

            echo '<div class="swiper-wrapper ">';

                echo '<div class="swiper-slide post-text" ng-repeat="post in main.posts" data-hash="{{post.uid}}">';

                    echo '<div class="post-text__mast on-left" >';

                        echo '<div class=" centered--vertical post-text__title ">';

                            echo '<h1><a href="#/{{post.uid}}" class="make-block" ng-bind="post.title"></a></h1>';

                            echo '<ul class="milli list--inline soft--top ">';

                            echo '<li><span class="meta">in</span></li>';

                            echo '<li ><a class="meta split--full" href="#/{{post.uid}}" ng-bind="post.parent"></a></li>';

                            echo '</ul>';
                        echo '</div>';

                    echo '</div>';

                    echo '<a href="#/{{post.uid}}" class="text-center link--view " >';

                        echo '<span class=" link--view__trigger top-half" href="' . url() . '">';

                            echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-right"></svg></i>';

                        echo '</span>';

                    echo '</a>';

                echo '</div>';

            echo '</div>';

        echo '</section>';

        /**
        *   Meta Slider
        */

        echo '<aside class="js-swiper--meta  swiper-container  posts-meta-wrapper side-left " role="aside">';

            echo '<div class="swiper-wrapper ">';

                echo '<div class="swiper-slide post-meta" ng-repeat="post in main.posts">';

                    echo '<span class="posts-count__index meta   " ng-bind="post.index + 1"></span>';

                echo '</div>';

            echo '</div>';

            echo '<span class="posts-count__total meta" ng-bind="main.items"></span>';

        echo '</aside>';

        /**
        *   Feed Link
        */

        echo '<div
            class="text-center side-right " >';

            echo '<div class="micro  side-right__text">';

            echo '<ul class="list--inline milli locase flush nav--global ">';

            echo '<li class="force-full-width" ng-class="{ \'is-active\': pagename==\'index\'}"><a class="link--primary " ng-click="main.filtersIsVisible = !main.filtersIsVisible">index</a></li>';

            echo '</ul>';

            echo '</div>';

        echo '</div>';

        /**
        *   Drawer
        */

        echo '<section class="drawer" ng-controller="keywordNavCtrl as keywordNav" ng-init="keywordNav.init()">';

            echo '<section class="posts-feed text-left">';

                echo '<ul class="posts-feed__list">';

                    echo '<li lw-tagged-item class="js-index__item posts-feed__list__item" ng-repeat="post in main.posts"  tagged="post.tagsAsArray" >';

                        echo '<a class="posts-feed__list__link" ng-href="#/{{post.uid}}"   ng-mouseover="activatePost($index)">';

                            echo '<span class="epsilon" ng-bind="post.title" ></span>';

                        echo '</a>';

                        echo '<ul class="posts-feed__list__tag-list">';

                            echo '<li ng-if="post.tagsAsArray.length > 1" ng-repeat="tag in post.tagsAsArray">';

                                echo '<a ng-class="{\'is-active\' : keywordNav.taggedTag(tag)}" ng-click="keywordNav.changeTagList(tag, \'add\')" class="meta" ng-bind="tag"></a>';

                                // echo '<a ng-if="keywordNav.tagged(tag)" ng-click="keywordNav.changeTagList(tag, \'remove\')">';
                                //
                                //     echo '<i class="icon icon--nano soft-half--left"><svg viewBox="0 0 64 64"><use xlink:href="#close"></svg></i>';
                                //
                                // echo '</a>';

                            echo '</li>';

                        //    echo '<li><a class="meta " href="#" ng-bind="post.parent"></a></li>';

                        echo '</ul>';

                    echo '</li>';

                echo '</ul>';

            echo '</section>';

        echo '</section>';



        echo '<div class="footer">';

            echo '<div class="footer__left">';

                echo '<a class="js-swipe-next link--swipe-next split--both link--block">';

                    echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-down"></svg></i>';

                echo '</a>';

            echo '</div>';

            echo '<div class="footer__right">';

                echo '<a  class="js-swipe-prev link--swipe-prev split--both link--block">';

                    echo '<i class="icon icon--micro"><svg viewBox="0 0 64 64"><use xlink:href="#arrow-up"></svg></i>';

                echo '</a>';

            echo '</div>';

        echo '</div>';


    echo '</section>';

echo '</script>';
?>
