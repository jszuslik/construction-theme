var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('watch', ['browserSync'], function(){
    gulp.watch('./**/*.css', browserSync.reload);
    gulp.watch('./**/*.js', browserSync.reload);
    gulp.watch('./**/*.php', browserSync.reload);
});
gulp.task('browserSync', function(){
    browserSync.init({
        logPrefix: 'pinnacle.dev',
        proxy: 'pinnacle.dev',
        port: 8080
    })
});