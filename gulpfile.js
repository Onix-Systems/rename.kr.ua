var gulp = require('gulp');

var less = require('gulp-less');

var path = require('path');

var cssmin = require('gulp-cssmin');

var rename = require('gulp-rename');

var minify = require('gulp-minify');
 

gulp.task('compress', function() {

	gulp.src('./assets/css/*.less')
	.pipe(less({
	paths: [ path.join(__dirname, 'less', 'includes') ]
	}))
	.pipe(gulp.dest('./assets/css/'));	


	gulp.src('./assets/css/*.css')
	.pipe(cssmin())
	.pipe(rename({suffix: '.min'}))
	.pipe(minify({ignoreFiles: ['.min.js']}))
	.pipe(gulp.dest('./assets/css/'));

	
	gulp.src('./assets/js/*.js')
	.pipe(minify({
	exclude: ['tasks'],
	ignoreFiles: ['.combo.js', '*-min.js']
	}))
	.pipe(gulp.dest('./assets/js/'));

});
