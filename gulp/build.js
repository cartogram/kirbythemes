'use strict';

var gulp = require('gulp');

var argv = require('yargs').argv;

var gutil = require('gulp-util');

var $ = require('gulp-load-plugins')({
    pattern: ['gulp-*', 'main-bower-files', 'uglify-save-license', 'del']
});

var dist = "assets",
    bower = 'bower_components',
    scripts = [
        // bower + '/jquery/dist/jquery.js',
        // bower + '/jquery.easing/js/jquery.easing.js',
        bower + '/fastclick/lib/fastclick.js',
        // // bower + '/viewport-units-buggyfill/viewport-units-buggyfill.js',
        // // bower + '/tether/tether.js',
        bower + '/angular/angular.js',
        // bower + '/angular-animate/angular-animate.js',
        // bower + '/angular-cookies/angular-cookies.js',
        // bower + '/angular-sanitize/angular-sanitize.js',
        // bower + '/angular-touch/angular-touch.js',
        // bower + '/angular-route/angular-route.js',
        // bower + '/angular-filter/dist/angular-filter.js',
        // bower + '/lodash/dist/lodash.js',
        // bower + '/swiper/dist/idangerous.swiper.js',
        // // bower + '/swiper-hash-navigation/dist/idangerous.swiper.hashnav.js',
        // bower + '/angular-waypoints/dist/angular-waypoints.all.js',
        // // bower + '/foundation-apps/js/vendor/**/*.js',
        // // bower + '/foundation-apps/js/angular/**/*.js',
        // // '!' + bower + '/foundation-apps/js/angular/app.js',
        // 'src/scripts/cartogram/**/*.js',
        bower + '/pleasejs/dist/Please.js',
        'src/scripts/main.js'
    ];

function handleError(err) {
    console.error(err.toString());
    this.emit('end');
}

gulp.task('styles', ['wiredep'],  function () {

    return gulp.src('src/styles/*.scss')
    .pipe($.sass({style: 'expanded', includePaths: [bower + '/foundation-apps/scss']}))
    .on('error', handleError)
    .pipe($.autoprefixer('last 1 version'))
    .pipe($.csso())
    .pipe(gulp.dest(dist + '/styles'))
    .pipe($.size());
});

gulp.task('scripts', function () {
    var jsAppFilter = $.filter('src/scripts/**/*.js');

    return gulp.src(scripts)
    .pipe(jsAppFilter)
    .pipe($.jshint())
    .pipe($.jshint.reporter('jshint-stylish'))
    .pipe(jsAppFilter.restore())
    .pipe($.ngAnnotate())
    .pipe($.concat('scripts.js'))
    .pipe($.if(!argv.dev, $.uglify()))
    .pipe(gulp.dest(dist + '/scripts'))
    .pipe($.size());

});

gulp.task('misc', function () {

    return gulp.src('src/vendor/**/*.js')
    .pipe($.flatten())
    .pipe(gulp.dest(dist + '/scripts'))
    .pipe($.size());

});


gulp.task('images', function () {
    return gulp.src('src/assets/images/**/*')
    .pipe($.cache($.imagemin({
        optimizationLevel: 3,
        progressive: true,
        interlaced: true
    })))
    .pipe(gulp.dest(dist + '/images'))
    .pipe($.size());
});

gulp.task('fonts', function () {
    return gulp.src('src/fonts/**/*.{eot,svg,ttf,woff, woff2}')
    .pipe($.flatten())
    .pipe(gulp.dest(dist + '/fonts'))
    .pipe($.size());
});

gulp.task('svgs', function () {
    return gulp.src('src/svgs/*.svg')
    .pipe($.svgSprites({
        mode: "symbols",
        svg: {
            symbols: "snippets/svg-symbols.php",
            defs: "snippets/svg-defs.php",
        },
        preview: false
    }))
    .pipe(gulp.dest('site'));
});

gulp.task('clean', function (done) {
    $.del(['.tmp', dist ], done);
});

gulp.task('build', [ 'clean', 'styles', 'scripts', 'misc', 'images', 'svgs', 'watch']);
