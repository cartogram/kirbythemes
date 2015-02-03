'use strict';

module.exports = function(config) {

  config.set({
    basePath : '..', //!\\ Ignored through gulp-karma //!\\

    files : [ //!\\ Ignored through gulp-karma //!\\
        'src/bower_components/angular-mocks/angular-mocks.js',
        'src/bower_components/jquery/dist/jquery.js',
        'src/bower_components/jquery.easing/js/jquery.easing.js',
        'src/bower_components/fastclick/lib/fastclick.js',
        'src/bower_components/viewport-units-buggyfill/viewport-units-buggyfill.js',
        'src/bower_components/tether/tether.js',
        'src/bower_components/angular/angular.js',
        'src/bower_components/angular-animate/angular-animate.js',
        'src/bower_components/angular-cookies/angular-cookies.js',
        'src/bower_components/angular-sanitize/angular-sanitize.js',
        'src/bower_components/angular-touch/angular-touch.js',
        'src/bower_components/angular-route/angular-route.js',
        'src/bower_components/angular-filter/dist/angular-filter.js',
        'src/bower_components/lodash/dist/lodash.js',
        'src/bower_components/swiper/dist/idangerous.swiper.js',
        'src/bower_components/swiper-hash-navigation/dist/idangerous.swiper.hashnav.js',
        'src/bower_components/angular-waypoints/dist/angular-waypoints.all.js',
        'src/scripts/cartogram/**/*.js',
        'src/scripts/main.js',
        'test/unit/**/*.js'
    ],

    autoWatch : false,

    frameworks: ['jasmine'],

    browsers : ['PhantomJS'],

    plugins : [
        'karma-phantomjs-launcher',
        'karma-jasmine'
    ]
  });

};
