var gulp = require('gulp');
var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');

var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('hallo-simrs',function () {
    console.log('halo bone');
});

gulp.task('scripts', function () {
    gulp.src('src/resources/assets/js/lib/*.js')
        .pipe(concat('scripts.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

elixir(function(mix) {
    mix.browserify('main.js','assets/js','src/resources/assets/js');
});