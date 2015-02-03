'use strict';

var gulp = require('gulp');

gulp.task('watch', ['styles'] ,function () {
    gulp.watch('src/styles/**/*.scss', ['styles']);
    gulp.watch('src/scripts/**/*.js', ['scripts']);
    gulp.watch('src/images/**/*', ['images']);
    gulp.watch('src/svgs/**/*', ['svgs']);
    gulp.watch('src/fonts/**/*', ['fonts']);
});
