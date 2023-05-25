const { src, dest, series, watch } = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass')(require('sass'));
const babel = require('gulp-babel');
const cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
const imagemin = require('gulp-imagemin');

function compileImages(cb) {
    cb();
    return src('src/images/*')
        .pipe(imagemin())
        .pipe(dest('assets/images/'));
}

function compileCss(cb) {
    cb();
    return src('src/scss/*.scss')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(dest('assets/css/'));
}

function compilePartsCss(cb) {
    cb();
    return src('src/scss/template-parts/**/*.scss')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(dest('template-parts/'));
}

function compileModalsCss(cb) {
    cb();
    return src('src/scss/modals/**/*.scss')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(dest('assets/css/modals/'));
}

function compileBootstrapCss(cb) {
    //cb();
    return src('node_modules/bootstrap/scss/bootstrap.scss')
        //return src('src/scss/bootstrap.scss')
        .pipe(sass())
        .pipe(cleanCSS())
        .pipe(dest('assets/css/'));
}

function compileBootstrapJS(cb) {
    //cb();
    return src(
        [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/@popperjs/core/dist/umd/popper.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.js'
        ])
        .pipe(babel())
        .pipe(concat('base.js'))
        .pipe(dest('assets/js/'));
}

function compileSwipperJS(cb) {
    //cb();
    return src(['node_modules/swiper/swiper-bundle.min.js', 'src/js/swiper-settings.js'])
        .pipe(babel())
        .pipe(concat('swiper.js'))
        .pipe(dest('assets/js/'));
}

function compileSwiperCss(cb) {
    //cb();
    return src('node_modules/swiper/swiper-bundle.min.css')
        .pipe(sass())
        .pipe(dest('assets/css/'));
}

/*
* SimpleLightbox information found in https://simplelightbox.com/
*/
function compileSimpleLightboxCss(cb) {
    //cb();
    return src('node_modules/simplelightbox/dist/simple-lightbox.css')
        .pipe(sass())
        .pipe(dest('assets/css/'));
}

function compileSimpleLightboxJs(cb) {
    //cb();
    return src('node_modules/simplelightbox/dist/simple-lightbox.js')
        .pipe(babel())
        .pipe(concat('simplelightbox.js'))
        .pipe(dest('assets/js/'));
}

//exports.build = build;
exports.default = series(compileImages, compileBootstrapCss, compileBootstrapJS,
    compileSwiperCss, compileSwipperJS,
    compileCss, compilePartsCss, compileModalsCss,
    compileSimpleLightboxCss, compileSimpleLightboxJs);
exports.watcher = function () {
    watch(['src/scss/*.scss', 'src/scss/**/*.scss', 'src/scss/template-parts/**/*.scss'], compileCss);
    watch(['src/scss/*.scss', 'src/scss/**/*.scss', 'src/scss/template-parts/**/*.scss'], compilePartsCss);
    watch('src/js/swiper-settings.js', compileSwipperJS);
    watch('src/scss/modals/**/*.scss', compileModalsCss);
};