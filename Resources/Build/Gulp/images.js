/**
 * Dependencies
 */
const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
const packageJson = require('../package.json');

/**
 * Compress and copy images
 */
gulp.task('image', function () {
    'use strict';
    return gulp.src([
        packageJson.config.path.src + '/Images/**/*.gif',
        packageJson.config.path.src + '/Images/**/*.jpg',
        packageJson.config.path.src + '/Images/**/*.png',
        packageJson.config.path.src + '/Images/**/*.svg'])
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.svgo({plugins: [{removeViewBox: true}]}),
            imagemin.optipng({optimizationLevel: 5})
        ], {
            verbose: true
        }))
        .pipe(gulp.dest(packageJson.config.path.dest + './Images'))
});
