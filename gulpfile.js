/*global require*/

var gulp = require('gulp');

// Include Our Plugins
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cleanCSS = require('gulp-clean-css');

// Compile Our Sass
gulp.task('sass', function () {
    "use strict";
    return gulp.src('library/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('library/css'))
        .pipe(cleanCSS())
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('library/css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function () {
    "use strict";
    return gulp.src('library/js/*.js')
        .pipe(uglify())
        .pipe(concat('scripts.js'))
        .pipe(rename('scripts.min.js'))
        .pipe(gulp.dest('library/js/min'));
});

gulp.task('watch', function () {
    "use strict";
    gulp.watch('./library/js/*.js', ['scripts']);
    gulp.watch('./library/js/**/*.js', ['scripts']);
    gulp.watch('./library/scss/*.scss', ['sass']);
    gulp.watch('./library/scss/**/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'scripts', 'watch']);
