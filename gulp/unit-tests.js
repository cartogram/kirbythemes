'use strict';

var gulp = require('gulp');

var $ = require('gulp-load-plugins')();

var paths = gulp.paths;

function runTests (singleRun, done) {

    var bower = 'bower_components',
        scripts = [
            'assets/scripts/scripts.js',
            bower + '/angular-mocks/angular-mocks.js',
            'test/unit/*.js'
        ];

  gulp.src(scripts)
    .pipe($.karma({
      configFile: 'karma.conf.js',
      action: (singleRun)? 'run': 'watch'
    }))
    .on('error', function (err) {
      // Make sure failed tests cause gulp to exit non-zero
      throw err;
    });
}

gulp.task('test', function (done) { runTests(true /* singleRun */, done) });
gulp.task('test:auto', function (done) { runTests(false /* singleRun */, done) });
