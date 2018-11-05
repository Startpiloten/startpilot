/**
 * Dependencies
 */
const gulp = require('gulp');
const packageJson = require('../package.json');

/**
 * Copy CKEditor plugins
 */
gulp.task('ckeditor', function () {
    'use strict';
    return gulp.src(`${packageJson.config.path.src}CKEditor/**/*`)
        .pipe(gulp.dest(`${packageJson.config.path.dest}CKEditor`))
});
