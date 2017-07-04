const gulp = require('gulp');
const plumber = require('gulp-plumber');
const packageJson = require('../package.json');

/**
 * Copy Misc
 */
gulp.task('misc', function () {
    return gulp.src(packageJson.config.path.src + '/Misc/**/*')
        .pipe(gulp.dest(packageJson.config.path.dest + './Misc'))
});
