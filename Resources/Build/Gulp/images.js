/**
 * Gulp
 */

const gulp = require('gulp');
const plumber = require('gulp-plumber');
const packageJson = require('../package.json');

/**
 * Compress and copy images destination
 */
gulp.task('image', function () {
    return gulp.src(packageJson.config.path.src + '/Images/**/*')
        .pipe(gulp.dest(packageJson.config.path.dest + './Images'))
});
