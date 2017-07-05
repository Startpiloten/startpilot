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
    gulp.watch(packageJson.config.path.src + '/Scss/**/*.scss', gulp.series('css'));
    gulp.watch(packageJson.config.path.src + '/Images/**/*', gulp.series('image'));
    gulp.watch(packageJson.config.path.src + '/Fonts/**/*', gulp.series('fonts'));
    const miscWatcher = gulp.watch(packageJson.config.path.src + '/Misc/**/*', gulp.series('misc'));
    gulp.watch([packageJson.config.path.src + '/JavaScript/**/*.js', packageJson.config.path.src + '/JavaScript/**/*.json'], gulp.series('javascript'));


    /*
        @TODO add watcher to delete files in dist…
    */
    miscWatcher.on('unlink', function(src) {
        if(path.basename(src) != '.DS_Store') {
            const file = src.replace('Assets/', '');
            log('red', 'File ' + file + ' was removed.');

            let destFilePath = path.relative(path.resolve(packageJson.config.path.dest), src);
                destFilePath = '../' + destFilePath.replace('Build/Assets/', 'Resources/Public/')
            log('blue', 'File ' + destFilePath + ' should be removed…');
            del.sync(destFilePath, { force: true });
        }
    });
});


gulp.task('build', gulp.parallel('clean', 'css', 'fonts', 'misc', 'image', 'javascript'));
gulp.task('ci', gulp.parallel('css-lint', 'build'));
gulp.task('default', gulp.series('build', gulp.parallel('watch')));
