/**
 * Gulp
 */
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const rimraf = require('gulp-rimraf');
const imagemin = require('gulp-imagemin');
const packageJson = require('../package.json');

gulp.task('clean:scripts', function () {
    'use strict';
    return gulp.src(packageJson.config.path.dest + '/JavaScript/**/*', {read: false})
        .pipe(rimraf({ force: true })).resume();
});

gulp.task('clean:styles', function () {
    'use strict';
    return gulp.src(packageJson.config.path.dest + '/Scss/**/*', {read: false})
        .pipe(rimraf({ force: true })).resume();
});

gulp.task('clean:fonts', function () {
    'use strict';
    return gulp.src(packageJson.config.path.dest + '/Fonts/**/*', {read: false})
        .pipe(rimraf({ force: true })).resume();
});

gulp.task('clean:images', function () {
    'use strict';
    return gulp.src(packageJson.config.path.dest + '/Images/**/*', {read: false})
        .pipe(rimraf({ force: true })).resume();
});

gulp.task('clean:misc', function () {
    'use strict';
    return gulp.src(packageJson.config.path.dest + '/Misc/**/*', {read: false})
        .pipe(rimraf({ force: true })).resume();
});

gulp.task('clean', gulp.series(['clean:scripts', 'clean:styles', 'clean:fonts', 'clean:images', 'clean:misc']));
