const gulp = require("gulp");
const rename = require("gulp-rename");
const sass = require("gulp-sass");

const styleSRC = "./src/scss/style.scss";
const styleURL = "./assets/";

gulp.task("style", function() {
  // compile scss
  return gulp
    .src(styleSRC)
    .pipe(
      sass({
        errorLogToConsole: true,
        outputStyle: "compressed"
      })
    )
    .on("error", console.error.bind(console))
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest(styleURL));
});
