var gulp = require('gulp');
var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');

gulp.task('hallo-simrs',function () {
    console.log('halo bone');
});

elixir(function(mix) {
    mix.browserify('main.js','assets/js','src/resources/assets/js');
});