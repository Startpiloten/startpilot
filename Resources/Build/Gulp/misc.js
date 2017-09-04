/**
 * Dependencies
 */
const gulp = require('gulp');
const packageJson = require('../package.json');

/**
 * Copy misc
 */
gulp.task('misc', function () {
    'use strict';
    return gulp.src(packageJson.config.path.src + '/Misc/**/*')
        .pipe(gulp.dest(packageJson.config.path.dest + './Misc'))
});
