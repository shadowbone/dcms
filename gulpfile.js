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
    gulp.src([
        'src/resources/assets/js/lib/ace-extra.min.js',
        'src/resources/assets/js/lib/jquery-2.1.4.min.js',
        'src/resources/assets/js/lib/jquery.form.js',
        'src/resources/assets/js/lib/bootstrap.min.js',
        'src/resources/assets/js/lib/jquery-ui.custom.min.js',
        'src/resources/assets/js/lib/jquery.ui.touch-punch.min.js',
        'src/resources/assets/js/lib/jquery.easypiechart.min.js',
        'src/resources/assets/js/lib/jquery.sparkline.index.min.js',
        'src/resources/assets/js/lib/jquery.flot.min.js',
        'src/resources/assets/js/lib/jquery.flot.pie.min.js',
        'src/resources/assets/js/lib/jquery.flot.resize.min.js',
        'src/resources/assets/js/lib/jquery.dataTables.min.js',
        'src/resources/assets/js/lib/jquery.dataTables.bootstrap.min.js',
        'src/resources/assets/js/lib/jquery.gritter.min.js',
        'src/resources/assets/js/lib/jquery.nestable.min.js',
        'src/resources/assets/js/lib/ace-elements.min.js',
        'src/resources/assets/js/lib/ace.min.js',
        'assets/bootstrap-modal/js/bootstrap-modal.js',
        'assets/bootstrap-modal/js/bootstrap-modalmanager.js'
        ])
        .pipe(concat('scripts.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

gulp.task('scripts-custom', function () {
    gulp.src([
        'assets/custom/my-form.js',
        'assets/custom/my-dataTabels.js'
        ])
        .pipe(concat('dcms.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

elixir(function(mix) {
    mix.browserify('main.js','assets/js','src/resources/assets/js');
});