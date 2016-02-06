'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefix = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');

gulp.task('sass', function () {
  	return gulp.src('./assets/scss/**/*.scss')
		.pipe(sass())
    	.pipe(autoprefix({
    		browsers: 'last 5 versions'
    	}))
    	.pipe(cssnano())
    	.pipe(gulp.dest('./assets/css'));
});
 
gulp.task('scripts', function() {
	return gulp.src('./assets/js/src/*.js')
    	.pipe(concat('scripts.js'))
    	.pipe(gulp.dest('./assets/js/build/'));
});

gulp.task('watch', function () {
	gulp.watch('./assets/scss/**/*.scss', ['sass']);
	gulp.watch('./assets/js/**/*.js', ['scripts']);
});