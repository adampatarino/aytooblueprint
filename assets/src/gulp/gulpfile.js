'use strict';

/**
 * Libraries
 */
var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
	prefixer    = require('gulp-autoprefixer'),
	browserSync = require('browser-sync'),
	browserify  = require('browserify'),
    plumber     = require('gulp-plumber'),
    jshint      = require('gulp-jshint'),
	gutil       = require('gulp-util'),
	tap         = require('gulp-tap');

/**
 * Tasks
 */

//BrowserSync
gulp.task('browserSync', function(){
    browserSync.init({
        proxy: "",
        ghostmode: true
    });
});

// Browserify
gulp.task('browserify', function() {
    gulp.src('../js/main.js', {read: false})
        .pipe(tap(function(file) {
            var d = require('domain').create();

            d.on("error", function(err) {
                gutil.log(
                    gutil.colors.red("Browserify compile error:"),
                    err.message,
                    "\n\t",
                    gutil.colors.cyan("in file"),
                    file.path
                );
                gutil.beep();
                this.emit('end');
            });

            d.run(function() {
                file.contents = browserify({
                    entries: [file.path],
                }).bundle();
            });
        }))
        // .pipe(streamify())
        .pipe(gulp.dest('../../dist/js/'))
        .pipe(browserSync.reload({stream:true}))
});

// Sass
gulp.task('sass', function(){
    return gulp.src(['../scss/main.scss'])
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            gutil.beep();
            gutil.beep();
            this.emit('end');
        }))
        .pipe(sass())
        .pipe(prefixer())
        //.pipe(plumber.stop())
        .pipe(gulp.dest('../../dist/css'))
        .pipe(browserSync.stream())
});

/**
 * Watch
 */
gulp.task('default', ['browserSync', 'sass'], function(){
	gulp.watch('./UI/app/js/**/*.js', ['browserify']);
    gulp.watch('./UI/app/scss/**/*.scss', ['sass']);
});