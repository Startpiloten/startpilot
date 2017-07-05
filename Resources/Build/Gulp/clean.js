/**
 * Gulp
 */
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const del = require('del');
const imagemin = require('gulp-imagemin');
const packageJson = require('../package.json');

gulp.task('clean:scripts', function () {
    'use strict';
    return del(packageJson.config.path.dest + '/JavaScript/*', {force: true})
});

gulp.task('clean:styles', function () {
    'use strict';
    return del(packageJson.config.path.dest + '/Css/*', {force: true})
});

gulp.task('clean:fonts', function () {
    'use strict';
    return del(packageJson.config.path.dest + '/Fonts/*', {force: true})
});

gulp.task('clean:images', function () {
    'use strict';
    return del(packageJson.config.path.dest + '/Images/*', {force: true})
});

gulp.task('clean:misc', function () {
    'use strict';
    return del(packageJson.config.path.dest + '/Misc/*', {force: true})
});

gulp.task('clean', gulp.series(['clean:scripts', 'clean:styles', 'clean:fonts', 'clean:images', 'clean:misc']));
