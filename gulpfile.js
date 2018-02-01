'use strict';

var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');

gulp.task('font', function() {
  return gulp.src('./src/scss/fonts.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(minifyCss({compatibility: 'ie8'}))
  .pipe(rename('fonts.min.css'))
  .pipe(gulp.dest('./dist/css'))
});

gulp.task('sass', function() {
  return gulp.src('./src/scss/app.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(autoprefixer({browsers: ['last 2 versions'], cascade: false}))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest('./dist/css'));
});

gulp.task('minifySass', ['sass'], function() {
  return gulp.src('./dist/css/app.css')
  .pipe(minifyCss({compatibility: 'ie8'}))
  .pipe(rename('app.min.css'))
  .pipe(gulp.dest('./dist/css'));
});

gulp.task('concatScripts', function() {
  return gulp.src([
    './src/js/vendor/_wow.js',
    './src/js/components/_pageTransition.js',
    './src/js/components/_parallax.js',
    './src/js/init.js'
  ])
  .pipe(concat('toptree.js'))
  .pipe(gulp.dest('./dist/js'));
});

gulp.task('minifyScripts', ['concatScripts'], function() {
  return gulp.src('dist/js/toptree.js')
  .pipe(uglify())
  .pipe(rename('toptree.min.js'))
  .pipe(gulp.dest('./dist/js'));
});

gulp.task('build', ['font', 'minifySass', 'minifyScripts']);

gulp.task('watch', function() {
  gulp.watch('./src/scss/**/*.scss', ['font', 'minifySass']);
  gulp.watch('./src/js/**/*.js', ['minifyScripts']);
});

gulp.task('default', ['build', 'watch']);
