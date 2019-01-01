const gulp = require("gulp");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
const sourcemaps = require("gulp-sourcemaps");

const browserify = require("browserify");
const babelify = require("babelify");
const source = require("vinyl-source-stream");
const buffer = require("vinyl-buffer");
const uglify = require("gulp-uglify");

const assetURL = "./assets/";
const styleSRC = "./src/scss/style.scss";
// watch for all files in this folder
const styleWatch = "./src/scss/**/*.scss";

const jsSRC = "./src/js/main.js";
const jsWatch = "./src/js/**/*.js";

gulp.task("style", function() {
  // compile scss
  return gulp
    .src(styleSRC)
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        errorLogToConsole: true,
        outputStyle: "compressed"
      })
    )
    .on("error", console.error.bind(console))
    .pipe(autoprefixer({ browsers: ["last 2 versions"], cascade: false }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(assetURL));
});

gulp.task("js", function() {
  return browserify({
    entries: [jsSRC]
  })
    .transform(babelify, {
      presets: ["env"]
    })
    .bundle()
    .pipe(source("main.js"))
    .pipe(rename({ extname: ".min.js" }))
    .pipe(buffer())
    .pipe(
      sourcemaps.init({
        loadMaps: true
      })
    )
    .pipe(uglify())
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(assetURL));
});

gulp.task("default", gulp.series(["style", "js"]));

gulp.task("watch", function() {
  gulp.watch(styleWatch, gulp.series("style"));
  gulp.watch(jsWatch, gulp.series("js"));
});
