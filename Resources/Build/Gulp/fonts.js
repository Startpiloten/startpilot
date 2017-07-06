const gulp = require('gulp');
const plumber = require('gulp-plumber');
const packageJson = require('../package.json');

/**
 * Copy Fonts
 */
gulp.task('fonts', function () {
    'use strict';
    return gulp.src(packageJson.config.path.src + '/Fonts/**/*')
        .pipe(gulp.dest(packageJson.config.path.dest + './Fonts'))
});
