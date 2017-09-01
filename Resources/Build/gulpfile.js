/**
 * Gulp
 */
const gulp = require('gulp');
const del = require('del');
const path = require('path');
const gutil = require('gulp-util');
const log = require('gutil-color-log')
const packageJson = require('./package.json');


require('./Gulp/styles');
require('./Gulp/images');
require('./Gulp/scripts');
require('./Gulp/fonts');
require('./Gulp/clean');
require('./Gulp/misc');

/**
 * Task
 */
gulp.task('watch', function () {
    'use strict';
    const syncDelImages = function(src) {
        if(path.basename(src) != '.DS_Store' || path.extname(src) == '.jpg' || path.extname(src) == '.svg' || path.extname(src) == '.png' || path.extname(src) == '.gif') {
            const file = src.replace('Assets/', '');
            log('red', 'File ' + file + ' was removed.');

            let destFilePath = path.relative(path.resolve(packageJson.config.path.dest), src);
            destFilePath = '../' + destFilePath.replace('Build/Assets/', 'Resources/Public/')
            log('blue', 'File ' + destFilePath + ' deleted.');
            del.sync(destFilePath, { force: true });
        }
    }

    const syncDel = function(src) {
        if(path.basename(src) != '.DS_Store') {
            const file = src.replace('Assets/', '');
            log('red', 'File ' + file + ' was removed.');

            let destFilePath = path.relative(path.resolve(packageJson.config.path.dest), src);
            destFilePath = '../' + destFilePath.replace('Build/Assets/', 'Resources/Public/')
            log('blue', 'File ' + destFilePath + ' deleted.');
            del.sync(destFilePath, { force: true });
        }
    }


    // watch styles
    const watchScss = gulp.watch(packageJson.config.path.src + '/Scss/**/*.scss', gulp.series('css'));

    // watch images
    const watchImages = gulp.watch(packageJson.config.path.src + '/Images/**/*', gulp.series('image'));
    watchImages.on('unlink', function(src) {
        syncDelImages(src);
    });

    // watch fonts
    const watchFonts = gulp.watch(packageJson.config.path.src + '/Fonts/**/*', gulp.series('fonts'));
    watchFonts.on('unlink', function(src) {
        syncDel(src);
    });

    // watch misc
    const watchMisc = gulp.watch(packageJson.config.path.src + '/Misc/**/*', gulp.series('misc'));
    watchMisc.on('unlink', function(src) {
        syncDel(src);
    });

    // watch scripts
    const watchJavaScript = gulp.watch([packageJson.config.path.src + '/JavaScript/**/*.js', packageJson.config.path.src + '/JavaScript/**/*.json'], gulp.series('javascript'));
    watchJavaScript.on('unlink', function(src) {
        syncDel(src);
    });
});


gulp.task('build', gulp.series('clean', 'css', 'fonts', 'misc', 'image', 'javascript'));
gulp.task('ci', gulp.parallel('css-lint', 'build'));
gulp.task('default', gulp.series('build', gulp.parallel('watch')));
