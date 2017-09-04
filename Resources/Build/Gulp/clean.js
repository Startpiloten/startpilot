/**
* Dependencies
*/
const gulp = require('gulp');
const del = require('del');
const packageJson = require('../package.json');

/**
 * Partial clean tasks
 */
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

gulp.task('clean:ckeditor', function () {
  'use strict';
  return del(packageJson.config.path.dest + '/CKEditor/*', {force: true})
});


/**
 * Main clean task
 */
gulp.task('clean', gulp.series(['clean:scripts', 'clean:styles', 'clean:fonts', 'clean:images', 'clean:misc', 'clean:ckeditor']));
