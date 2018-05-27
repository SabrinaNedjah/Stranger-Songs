var gulp        = require('gulp');
var sass        = require('gulp-sass');

// Watching scss/html files
gulp.task('serve', ['sass'], function() {

    gulp.watch("app/styles/partials/*.scss", ['sass']);

});

// Compile sass into CSS 
gulp.task('sass', function() {
    return gulp.src("app/styles/partials/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("app/styles/css/styles.css"))
});

gulp.task('default', ['serve']);