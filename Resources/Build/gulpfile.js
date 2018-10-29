/**
 * Gulp
 */
const gulp = require('gulp');
const del = require('del');
const path = require('path');
const log = require('gutil-color-log');
const packageJson = require('./package.json');

require('./Gulp/styles');
require('./Gulp/images');
require('./Gulp/scripts');
require('./Gulp/fonts');
require('./Gulp/clean');
require('./Gulp/misc');
require('./Gulp/ckeditor');

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
    };

    const syncDel = function(src) {
        if(path.basename(src) != '.DS_Store') {
            const file = src.replace('Assets/', '');
            log('red', 'File ' + file + ' was removed.');

            let destFilePath = path.relative(path.resolve(packageJson.config.path.dest), src);
                destFilePath = '../' + destFilePath.replace('Build/Assets/', 'Resources/Public/');
            log('blue', 'File ' + destFilePath + ' deleted.');
            del.sync(destFilePath, { force: true });
        }
    };


    // watch styles
    const watchScss = gulp.watch('Assets/Scss/**/*.scss', gulp.series('css'));
    watchScss.on('unlink', function(src) {
        syncDelImages(src);
    });

    // watch images
    const watchImages = gulp.watch('Assets/Images/**/*', gulp.series('image'));
    watchImages.on('unlink', function(src) {
        syncDelImages(src);
    });

    // watch fonts
    const watchFonts = gulp.watch('Assets/Fonts/**/*', gulp.series('fonts'));
    watchFonts.on('unlink', function(src) {
        syncDel(src);
    });

    // watch misc
    const watchMisc = gulp.watch('Assets/Misc/**/*', gulp.series('misc'));
    watchMisc.on('unlink', function(src) {
        syncDel(src);
    });

    // watch misc
    const watchCKEditor = gulp.watch('Assets/CKEditor/**/*', gulp.series('ckeditor'));
    watchCKEditor.on('unlink', function(src) {
      syncDel(src);
    });

    // watch scripts
    const watchJavaScript = gulp.watch('Assets/JavaScript/**/*.js', gulp.series('javascript'));
    watchJavaScript.on('unlink', function(src) {
        syncDel(src);
    });
});


gulp.task('build', gulp.series('clean', 'css', 'fonts', 'misc', 'ckeditor', 'image', 'javascript'));
gulp.task('ci', gulp.series('css:format', 'css:lint', 'javascript:lint'));
gulp.task('default', gulp.series('build', gulp.parallel('watch')));
