var gulp = require('gulp');
var less = require('gulp-less');
var gutil = require('gulp-util');
var autoprefixer = require('gulp-autoprefixer');
 
gulp.task('default', function () {
    return gulp.src('./styles/*.less')
	    .pipe(less({
	          // paths: [ path.join(__dirname, 'less', 'includes') ]
	        }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions','IE >= 8']
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('./css'))

});

var watcher = gulp.watch('./styles/*.less', ['default']);