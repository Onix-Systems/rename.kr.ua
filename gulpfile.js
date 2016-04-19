var gulp = require('gulp');

var less = require('gulp-less');

var path = require('path');

var cssmin = require('gulp-cssmin');

var rename = require('gulp-rename');

var minify = require('gulp-minify');

var minifyCss = require('gulp-minify-css');

gulp.task('build', ['less-to-css','min-js','min-css']);

gulp.task('less-to-css', function() {
	gulp.src('./assets/css/*.less')
	.pipe(less({
	paths: [ path.join(__dirname, 'less', 'includes') ]
	}))
	.pipe(gulp.dest('./assets/css/'));	
});

gulp.task('min-js',['min-css'], function() {
	gulp.src('./assets/js/*.js')
	.pipe(minify({
	exclude: ['tasks'],
	ignoreFiles: ['.combo.js', '*-min.js']
	}))
	.pipe(gulp.dest('./assets/js/'));

});

gulp.task('min-css',['less-to-css'], function() {	
     gulp.src('./assets/css/*.css')
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('./assets/css/*'));
});



	
	