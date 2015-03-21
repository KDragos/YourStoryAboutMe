var elixir = require('laravel-elixir');


var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task("sass", function(){
	gulp.src("./public/scss/*.scss")
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ["last 5 versions"],
			cascade: false
		}))
	.pipe(gulp.dest("./public/css"));
});


gulp.task('watch', function() {
	gulp.watch(["./js/src/*.js"], ['scripts']);
	gulp.watch(["./public/scss/*.scss"], ['sass']);
});

gulp.task('scripts', function() {
  return gulp.src([
  './bower_components/jquery/dist/jquery.js',
  './bower_components/handlebars/handlebars.js',
  './bower_components/chosen_v1.4.1/chosen.jquery.js',
  './node_modules/masonry-layout/dist/masonry.pkgd.js',
  './public/js/*.js'
  ])  // Edit the place where we've put our js files. 
    .pipe(concat('build.js')) // This is going to be the file name.
    // .pipe(uglify())
    .pipe(gulp.dest('./public/js/')); // Just a folder name. 
});

gulp.task('default', ['watch', 'scripts', 'sass']);