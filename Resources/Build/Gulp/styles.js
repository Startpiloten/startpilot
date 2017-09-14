/**
 * Dependencies
 */
const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const packageJson = require('../package.json');
const plumber = require('gulp-plumber');
const rename = require('gulp-rename');
const gulpStylelint = require('gulp-stylelint');
const stylefmt = require('gulp-stylefmt');
const sourcemaps = require('gulp-sourcemaps');

/**
 * Compile sass to css
 * Linter: stylelint
 * Compressor: clean-css
 */
gulp.task('css:compile', function () {
    return gulp.src(packageJson.config.path.src + '/Scss/**/*.scss')
      .pipe(gulpStylelint({
        reporters: [
          {formatter: 'string', console: true}
        ]
      }))
      .pipe(sourcemaps.init())
      .pipe(sass.sync())
      .pipe(cleanCSS({level: 2}))
      .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      }))
      .pipe(sourcemaps.write('./',{
        addComment: true,
        sourceRoot: '../../../Build/Assets/Scss/'
      }))
      .pipe(gulp.dest(packageJson.config.path.dest + './Css'))
      .pipe(rename({
        suffix: '.min'
      }))
      .pipe(gulp.dest(packageJson.config.path.dest + './Css'))
});

gulp.task('css:lint', function lintCssTask() {
    return gulp.src(packageJson.config.path.src + '/Scss/**/*.scss')
        .pipe(gulpStylelint({
            reporters: [
                {formatter: 'string', console: true}
            ]
        }));
});


gulp.task('css:format', function () {
    return gulp.src(packageJson.config.path.src + '/Scss/**/*.scss')
        .pipe(plumber())
        .pipe(stylefmt())
        .pipe(plumber.stop())
        .pipe(gulp.dest(packageJson.config.path.src + '/Scss/'));
});

gulp.task('css', gulp.series('css:compile'));
