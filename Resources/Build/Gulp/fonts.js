/**
 * Dependencies
 */
const gulp = require('gulp');
const packageJson = require('../package.json');

/**
 * Copy fonts
 */
gulp.task('fonts', function () {
    'use strict';
    return gulp.src(`${packageJson.config.path.src}Fonts/**/*`)
        .pipe(gulp.dest(`${packageJson.config.path.dest}Fonts`))
});
