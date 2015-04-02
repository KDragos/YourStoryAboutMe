var elixir = require('laravel-elixir');


var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var del = require('del');
var autoprefixer = require('gulp-autoprefixer');

gulp.task("sass", function(){
	gulp.src([
    "./public/select2dist/css/select2.css",
    "./public/scss/styles.scss"
    // "./bower_components/chosen_v1.4.1/chosen.css"
    ])
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ["last 5 versions"],
			cascade: false
		}))
	.pipe(gulp.dest("./public/css"));
});

// gulp.task('lint', function(){

  
// });

gulp.task('clean', function(){
  del(['./public/build.js']);
});


gulp.task('scripts', ['clean'], function() {
  return gulp.src([
  './bower_components/jquery/dist/jquery.js',
  // './bower_components/chosen_v1.4.1/chosen.jquery.js',
  './public/select2dist/js/select2.full.js',
  './bower_components/handlebars/handlebars.min.js',
  './node_modules/masonry-layout/dist/masonry.pkgd.js',
  '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js',
  '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.js',
  './public/js/scripts.js'
  ])  
    .pipe(concat('build.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./public')); // Just a folder name. 
});

gulp.task('watch', function() {
	gulp.watch(["./public/js/**.js"], ['scripts']);
	gulp.watch(["./public/scss/**.scss"], ['sass']);
});

gulp.task('default', ['scripts', 'watch']);