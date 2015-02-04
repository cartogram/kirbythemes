'use strict';

(function() {
    'use strict';

    angular.module('lw', [
        'ngAnimate',
        'ngCookies',
        'ngTouch',
        'ngSanitize',
        'ngRoute',
        'cartogram.background',
        'cartogram.fill',
        'cartogram.dimensions',
        'cartogram.scroll',
        // 'foundation'
    ])

    .run(function($log, $rootScope) {
        var $w = $(window);
        $rootScope.isReady = true;
        $rootScope.isLoaded = true;

        $rootScope.canScroll = false;
        $rootScope.viewIsLoading = false;

        //I contain the active post number in order to set the default
        //slide on route change, default to 0;
        $rootScope.activePostIndex = 0;

        FastClick.attach(document.body);

        if (!String.prototype.trim) {
            (function() {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                    return this.replace(rtrim, '');
                };
            })();
        }
    })

    .config(function ($routeProvider, $locationProvider) {
        $routeProvider
        .when('/', {
            templateUrl: 'main.html',
            controller: 'MainCtrl',
            controllerAs: 'main',
            pagename : 'main',
            reloadOnSearch:false,
            resolve : {
                loadData: function(apiService, $rootScope, $log) {
                    console.warn('step 2');

                    return apiService.getPosts();
                }
            }
        })

        .when('/about', {
            templateUrl: 'about.html',
            controller: 'PageCtrl',
            pagename : 'about'
        })

        .when('/:slug', {
            templateUrl: 'single.html',
            controller: 'MainCtrl',
            controllerAs: 'single',
            pagename: 'single',
            resolve : {
                loadData: function(apiService, $rootScope, $log) {
                    console.warn('step 2');

                    return apiService.getPosts();
                }
            }
        })


        .otherwise({
            redirectTo: '/'
        })
        ;

    //    $locationProvider.hashPrefix('!');
    })

    .controller('PageCtrl', function ($log, $rootScope, $scope) {
        $rootScope.isLoading = false;
        $rootScope.isLoaded = true;
    })

    .controller('keywordNavCtrl', function ($log,  $scope, $timeout, $location) {
        var vm = this,
            search = $location.search();



        vm.changeTagList = function(tag, method) {
            //Get the current search object
            var currentTagsArray = $location.search().tagged,
                //I contain the new array of for the search object
                newTagsArray = [],
                i;

            // If the current search object is a STRING,
            // add it to our new array
            if(typeof currentTagsArray === 'string') {
                newTagsArray.push(currentTagsArray);

                // If the current search object is a OBJECT,
                // add each key to our new array
            } else if(typeof currentTagsArray === 'object') {
                angular.forEach(currentTagsArray, function(tag) {
                    newTagsArray.push(tag);
                });

                // If the current search object is a ARRAY,
                // set it equal to our new array
            } else if(typeof currentTagsArray === 'array') {
                newTagsArray = currentTagsArray;
            } else {
                $log.info(typeof currentTagsArray);
                $log.error('Error: Could not interpret tags. Maybe there is none or we got an error of somekind?');
            }

            if (method === 'remove') {
                // Find if the tag we are trying to remove is in our new array
                i = newTagsArray.indexOf(tag);

                // if it is, we need to remove it.
                if(i !== -1) {
                    newTagsArray.splice(i, 1);
                }

                //if we have no more items, set the search object to null;
                if(newTagsArray.length === 0) {
                    newTagsArray = null;
                } else {
                    //console.log(newTagsArray.length, i, newTagsArray);
                }

            } else {
                newTagsArray.push(tag);

            }

            $location.search('tagged',newTagsArray );

            $scope.$broadcast('applyFilter', newTagsArray);

        }

        vm.taggedTag = function(tag){
            if(!$location.search().tagged) return;

            return $location.search().tagged.indexOf(tag) !== -1;
        };

        vm.init = function() {
            if(!search.tagged) return

            //vm.changeTagList(search.tagged, 'add');

        }



    })

    .directive('lwTaggedItem', function($log){
        return {
            restrict: "A",
            scope:{
                tagged: "="
            },
            link : function(scope, $elm, attrs){

                var activeTags = scope.tagged;

                angular.forEach(activeTags, function(tag) {
                    $elm.addClass('is-tagged--'+tag);
                });

                scope.$on('applyFilter', function(event, tags) {
                    console.log(tags);
                    $elm.removeClass('is-active');
                    angular.forEach(tags, function(tag) {
                        if($elm.hasClass('is-tagged--'+tag)) {
                            $elm.addClass('is-active');
                        }
                    });


                });
            }
        }
    })
    .controller('MainCtrl', function ($log, $rootScope, $route, $routeParams, $scope, loadData, $location) {
        $rootScope.test = true;

        var vm = this,
            // I contain the current tags in the search string
            currentTagsArray = $location.search().tagged;
            // I contain the tags to be used in the filter.
        //    newTagsArray = [];

        // I contain the list of projects to be rendered.
        vm.posts = [];

        // I contain the list of tags to be rendered.
        //vm.tags = [];

        // I contain the filter object.
        // vm.filter = {};
        //
        // // Interpret Search Object
        // if(typeof currentTagsArray === 'string') {
        //     newTagsArray.push(currentTagsArray);
        //
        //     // If the current search object is a OBJECT,
        //     // Turn the search object into an Array.
        // } else if(typeof currentTagsArray === 'object') {
        //     angular.forEach(currentTagsArray, function(tag) {
        //         newTagsArray.push(tag);
        //         $log.log(tag);
        //     });
        // } else {
        //     $log.info(typeof currentTagsArray);
        //     $log.error('Error: Could not interpret tags.');
        // }
        //
        // //if we have no more items, set the search object to null;
        // if(newTagsArray.length === 0) {
        //     vm.filter.tagsAsArray = '';
        // } else {
        //     //otherwise add it to the filtered object
        //     vm.filter.tagsAsArray = newTagsArray;
        // }
        //
        // $log.log(vm.filter.tagsAsArray);

        if(currentTagsArray) {
            vm.filtersIsVisible = true;
        } else {
            vm.filtersIsVisible = false;
        }

        $rootScope.isLoading = true;
        $rootScope.isLoaded = false;
        $rootScope.pagename = $route.current.pagename;

        loadInitialData($routeParams.slug);


        // ---
        // PRIVATE METHODS.
        // ---

        //route change methods.
        $rootScope.$on("$routeChangeStart", function (event, current, previous, rejection) {

            $rootScope.viewIsLoading = true;
            $log.warn(previous.pagename, current.pagename, 'step 1');
            $rootScope.isLoaded = false;


            if(!!previous && previous.pagename === "main" && !!current && current.pagename === "single") {
                    $rootScope.state = 'transition-to-single';
                    $log.info('transition to single');
            }

        });

        $rootScope.$on("$routeChangeSuccess", function (event, current, previous, rejection) {
            //$log.log('route change end');
            $rootScope.pagename = current.pagename;
            //debugger;

            $rootScope.viewIsLoading = false;

            if(!!current && current.pagename === "main") {
                $log.log('we are moving toward the main page');
            }

            if(!!previous && previous.pagename === "main" && !!current && current.pagename === "single") {
                $rootScope.state = 'transition-on-single';
                $log.info('transition on single');
            }

            $log.warn(previous.pagename, current.pagename, 'step 5');

        });
        $log.warn('step 4');
        // I load the remote data from the server.
        function loadInitialData(slug) {
            $log.warn('step 3');
        //    debugger;
            $log.log('loadInitialData() loading data');
            //debugger;

            vm.posts = loadData.data;
            vm.tags = loadData.tags;
            vm.items = loadData.items;


            if(slug) {
                $log.log(_.find(vm.posts, { 'uid': slug }));
                vm.post = _.find(vm.posts, { 'uid': slug });
                $log.log(vm.post.tagsAsArray);

            }

            $rootScope.isLoading = false;
            $rootScope.isLoaded = true;
        };


        // ---
        // HELPER METHODS.
        // ---


    })

    .service("apiService", function( $http, $q, $log ) {

            // Return public API.
            return({
                getPosts: getPosts
            });


            // ---
            // PUBLIC METHODS.
            // ---


            // I get all of the interviews in the remote collection.
            function getPosts() {

                var request = $http({
                    method: 'get',
                    url: 'api/'
                });

                return( request.then( handleSuccess, handleError ) );

            }


            // ---
            // PRIVATE METHODS.
            // ---


            // I transform the error response, unwrapping the application dta from
            // the API response payload.
            function handleError( response ) {

                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (
                    ! angular.isObject( response.data ) ||
                    ! response.data.message
                ) {

                    return( $q.reject( "An unknown error occurred." ) );

                }

                // Otherwise, use expected error message.
                return( $q.reject( response.data.message ) );

            }


            // I transform the successful response, unwrapping the application data
            // from the API response payload.
            function handleSuccess( response ) {

                return( response.data );

            }

        }
    )

    .directive('lwPost', function($window, $log, cgDimensions){
        return function(scope, $elm, attrs){

            // zum-waypoint="waypoints"
            // down="name.down"
            // up="name.up"

            var onScroll = function() {

                $log.log(cgDimensions.getOffset($elm[0]));
                $log.log(cgDimensions.inViewport($elm[0], 1));
                $log.log(cgDimensions.getViewportHeight());
                $log.log(cgDimensions.scrollY());

                if(cgDimensions.inViewport($elm[0], 1)) {
                    $elm.addClass('is-inview');
                } else {
                    $elm.removeClass('is-inview');
                }
            };

            angular.element($window).scroll( _.throttle( onScroll, 0 ));
        };
    })

    .directive('lwPostsSlides', function($window, $log, $timeout, $rootScope){

        return function(scope, $elm, attrs){

            var textSwiper,
                imagesSwiper,
                metaSwiper,
                indexSwiper;

                if(attrs.index) {
                    $rootScope.activePostIndex = parseInt(attrs.index);
                }

                if($rootScope.activePostIndex===0) {
                    $log.log('index is 0', $rootScope.activePostIndex);
                }




            function init(index) {

                textSwiper = $elm.find('.js-swiper--texts').swiper({
                    mode:'vertical',
                    loop: true,
                    mousewheelControl : true,
                    keyboardControl : true,
                    initialSlide : index,
                    onSlideChangeStart: function(swiper){
                        var sliders = [imagesSwiper, metaSwiper];

                        syncSlides(swiper.activeIndex -1, sliders);

                        //Add active class to current slide and all
                        //slides after this one.
                        $(swiper.slides).each(function(i, slide) {
                            $(slide).toggleClass('active', (i >= swiper.activeIndex));
                            console.log(slide);
                        });

                    }
                });

                // indexSwiper = $elm.find('.js-swiper--index').swiper({
                //     mode:'vertical',
                //     onlyExternal : true,
                //     slidesPerView : 'auto',
                //     centeredSlides:true,
                //     initialSlide : index
                // });

                imagesSwiper = $elm.find('.js-swiper--images').swiper({
                    mode:'horizontal',
                    loop: true,
                    onlyExternal : true,
                    initialSlide : index
                });

                metaSwiper = $elm.find('.js-swiper--meta').swiper({
                    mode:'horizontal',
                    loop: true,
                    initialSlide : index,
                    onlyExternal : true,
                });

                //Navigation
                $elm.find('.js-swipe-prev').on('click', function(e){
                    e.preventDefault()
                    textSwiper.swipePrev()
                })
                $elm.find('.js-swipe-next').on('click', function(e){
                    e.preventDefault()
                    textSwiper.swipeNext()
                });
            }



            // ---
            // Public METHODS.
            // ---

            scope.activatePost = function(index) {
                syncSlides(index, [imagesSwiper]);
            }

            // ---
            // PRIVATE METHODS.
            // ---

            function syncSlides(slide, sliders) {
                angular.forEach(sliders, function(slider) {
                    slider.swipeTo(slide);
                });
                $rootScope.activePostIndex = slide;
            }

            $timeout(function() {
                init($rootScope.activePostIndex);
            }, 0);

        };
    })



    .directive('lwInput', function($log){
        return function(scope, $elm, attrs){
            if( $elm[0].value.trim() !== '' ) {
                $elm.addClass('input--filled' );
            }

            // events:
            $elm.on( 'focus', onInputFocus );
            $elm.on( 'blur', onInputBlur );

            function onInputFocus( ev ) {
                $elm.addClass('input--filled' );
                $log.log('focus');
            }

            function onInputBlur( ev ) {
                $log.log('blur');
                if( ev.target.value.trim() === '' ) {
                    $elm.removeClass('input--filled' );
                }
            }


        };
    })



    ;


})();
