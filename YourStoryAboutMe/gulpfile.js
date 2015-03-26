var elixir = require('laravel-elixir');


var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var del = require('del');
var autoprefixer = require('gulp-autoprefixer');

gulp.task("sass", function(){
	gulp.src([
    "./public/scss/*.scss",
    "./bower_components/chosen_v1.4.1/chosen.css",
    ])
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ["last 5 versions"],
			cascade: false
		}))
	.pipe(gulp.dest("./public/css"));
});


gulp.task('clean', function(){
  del(['./public/build.js']);
})

gulp.task('scripts', ['clean'], function() {
  return gulp.src([
  './bower_components/jquery/dist/jquery.js',
  './bower_components/handlebars/handlebars.min.js',
  './bower_components/chosen_v1.4.1/chosen.jquery.js',
  './node_modules/masonry-layout/dist/masonry.pkgd.js',
  // '.public/js/arbor/build/tmpl/arbor-graphics.js',
  // '.public/js/arbor/demos/halfvis/renderer.js',
  // '.public/js/arbor/lib/arbor.js',
  // '.public/js/arbor/lib/arbor-tween.js',
  './public/js/*.js'
  ])  // Edit the place where we've put our js files. 
    .pipe(concat('build.js')) // This is going to be the file name.
    // .pipe(uglify())
    .pipe(gulp.dest('./public')); // Just a folder name. 
});

gulp.task('watch', function() {
	gulp.watch(["./public/js/**.js"], ['scripts']);
	gulp.watch(["./public/scss/**.scss"], ['sass']);
});

gulp.task('default', ['watch']);