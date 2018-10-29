const gulp = require('gulp');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');
const gutil = require('gulp-util');
const packageJson = require('../package.json');
const rename = require('gulp-rename');
const eslint = require('gulp-eslint');
const log = require('gutil-color-log');
const modernizr = require('gulp-modernizr-build');
const del = require('del');

function swallowError (error) {
  gutil.log(error.SyntaxError);
  this.emit('end')
}

gulp.task('javascript:lint', function () {
    'use strict';
    return gulp.src([packageJson.config.path.src + '/JavaScript/**/*.js', '!node_modules/**', '!'])
        .pipe(eslint({
            configFile: '.eslintrc.json'
        }))
        .pipe(eslint.format());
});

gulp.task('javascript:modernizr', function() {
    'use strict';
    if(packageJson.config.modernizr.active) {
      log('magenta', 'modernizr activated.');
      return gulp.src([packageJson.config.path.src  + '**/*.js', packageJson.config.path.dest  + '**/*.css', '!./**/modernizr*.js'])
      .pipe( modernizr('modernizr-custom.js', {
        cssPrefix: packageJson.config.modernizr.settings.cssPrefix,
        addFeatures: packageJson.config.modernizr.settings.addFeatures,
        quiet: packageJson.config.modernizr.settings.quiet
      }))
      .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'))
      .pipe(uglify())
      .pipe(rename({
        suffix: '.min'
      }))
      .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'));
    }
    else {
      return del(packageJson.config.path.dest + '/Javascript/modernizr.*', {force: true});
    }
});

gulp.task('javascript:compile', function () {
    const bundler = browserify({
        entries: packageJson.config.path.src + '/JavaScript/main.js'
    }).transform('babelify', {presets: ['@babel/env']});

    const bundle = function () {
        return bundler
            .bundle()
            .on('error', swallowError)
            .pipe(source('main.js'))
            .pipe(buffer())
            .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'))
            .pipe(uglify())
            .pipe(rename({
                suffix: '.min'
            }))
            .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'))
    };

    return bundle();
});

/**
 * Uglify javascript and copy to destination
 */
gulp.task('javascript', gulp.series('javascript:lint', 'javascript:modernizr', 'javascript:compile'));

