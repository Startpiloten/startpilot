const gulp = require('gulp');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');
const packageJson = require('../package.json');
const rename = require('gulp-rename');
const eslint = require('gulp-eslint');
const log = require('gutil-color-log');
const modernizr = require('gulp-modernizr-build');
const del = require('del');

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
    if(!packageJson.config.modernizr.deactivated) {
      log('blue', 'modernizr activated');
      return gulp.src([packageJson.config.path.dest + '/JavaScript/main.js', packageJson.config.path.dest  + '/Css/main.css', '!./**/modernizr*.js'])
      .pipe( modernizr('modernizr-custom.js', {
        cssPrefix: packageJson.config.modernizr.cssPrefix,
        addFeatures: packageJson.config.modernizr.addFeatures,
        quiet: packageJson.config.modernizr.quiet
      }))
      .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'))
      .pipe(uglify())
      .pipe(rename({
        suffix: '.min'
      }))
      .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'));
    }
    else {
      log('blue', 'modernizr activated');
      return del(packageJson.config.path.dest + '/Javascript/modernizr.*', {force: true});
    }
    
});

gulp.task('javascript:compile', function () {
    const bundler = browserify({
        entries: packageJson.config.path.src + '/JavaScript/main.js'
    }).transform('babelify', {presets: ['es2015']});

    const bundle = function () {
        return bundler
            .bundle()
            .pipe(source('main.js'))
            .pipe(buffer())
            .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'))
            // .pipe(sourcemaps.init({loadMaps: true})) // Debug
            // Add transformation tasks to the pipeline here.
            .pipe(uglify())
            // .pipe(sourcemaps.write()) // Debug
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
gulp.task('javascript', gulp.series('javascript:lint', 'javascript:compile'));

