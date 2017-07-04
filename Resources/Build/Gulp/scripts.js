const gulp = require('gulp');

// eslint-disable-next-line no-unused-consts
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');
const packageJson = require('../package.json');
const rename = require('gulp-rename');
const eslint = require('gulp-eslint');
const concat = require('gulp-concat');

gulp.task('javascript:lint', function () {
    return gulp.src([packageJson.config.path.src + '/JavaScript/**/*.js', '!node_modules/**', '!'])
        .pipe(eslint({
            configFile: '.eslintrc.json'
        }))
        .pipe(eslint.format());
});

gulp.task('javascript:copy-json', function() {
    return gulp.src(packageJson.config.path.src + '/JavaScript/**/*.json').pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'));
});

gulp.task('javascript:compile', function () {
    return gulp.src([packageJson.config.path.src + '/JavaScript/**/*.js'])
        .pipe(buffer())
        .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'))
        // .pipe(sourcemaps.init({loadMaps: true})) // Debug
        // Add transformation tasks to the pipeline here.
        .pipe(uglify())
        // .pipe(sourcemaps.write()) // Debug
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(packageJson.config.path.dest + '/JavaScript'));
});

/**
 * Uglify javascript and copy to destination
 */
gulp.task('javascript', gulp.series('javascript:lint', 'javascript:compile', 'javascript:copy-json'));

