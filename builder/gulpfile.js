// Variables
const gulp                = require( 'gulp' );
const config =
{
    scss:   "../assets/scss/",
    js:     "../assets/javascript/",
    assets: "../assets/",
    dist:   "../dist/"
};

// Tools dependencies
gulp_rename         = require( 'gulp-rename' ),
gulp_plumber        = require( 'gulp-plumber' ),
gulp_notify         = require( 'gulp-notify' ),
gulp_sourcemaps     = require( 'gulp-sourcemaps' ),

// Image depedency
gulp_imagemin       = require( 'gulp-imagemin' );

// Style dependencies
gulp_sass           = require( 'gulp-sass' ),
gulp_autoprefixer   = require( 'gulp-autoprefixer' ),
gulp_cssnano        = require( 'gulp-cssnano' ),

// Javascript dependencies
gulp_concat         = require( 'gulp-concat' );
gulp_uglify         = require( 'gulp-uglify' );


// Default task
gulp.task( 'default', ['watch'], function(){} );

// Compile SCSS into CSS, create a sourcemaps, autoprefix the code and put the file into dist folder
gulp.task( 'style', function()
{
    return gulp.src(config.scss + 'main.scss')
        .pipe( gulp_plumber(
            { errorHandler: gulp_notify.onError('SASS Erro <%= error.message %>') }
        ) )
        .pipe( gulp_sourcemaps.init() )
        .pipe( gulp_sass(
            { outputStyle: 'compressed' }).on('error', gulp_sass.logError) )
        .pipe( gulp_autoprefixer(
            {
                browsers: ['last 2 versions'],
                cascade: false
            }
        ) )
        .pipe( gulp_cssnano() )
        .pipe( gulp_sourcemaps.write() )
        .pipe( gulp_rename('style.min.css') )
        .pipe( gulp.dest(config.dist + 'css') )
        .pipe( gulp_notify("style is cool !") )
} );


gulp.task( 'javascript', function()
{
    return gulp.src( config.js + '*.js' )
        .pipe( gulp_plumber(
            { errorHandler: gulp_notify.onError('JS Erro <%= error.message %>') }
        ) )
        .pipe( gulp_sourcemaps.init() )
        .pipe( gulp_concat('script.js') )
        .pipe( gulp_uglify() )
        .pipe( gulp_sourcemaps.write() )
        .pipe( gulp_rename('script.min.js') )
        .pipe( gulp.dest(config.dist + 'js') )
        .pipe( gulp_notify("js is cool !") )
} );

// Minifies images
gulp.task( 'images', function()
{
    return gulp.src(config.assets + 'images/*')
        .pipe( gulp_imagemin() )
        .pipe( gulp.dest(config.dist + 'img') )
        .pipe( gulp_notify('minified !') )
} );

// Replace font into dist folder
gulp.task( 'fonts', function()
{
    return gulp.src(config.assets + 'fonts/*')
        .pipe( gulp.dest(config.dist + 'fonts') )
} );

// Watch all my task
gulp.task( 'watch', ['style', 'javascript', 'images', 'fonts'], function()
{
    gulp.watch(config.scss + '**/*.scss', ['style']);
    gulp.watch(config.js + '*.js', ['javascript']);
    gulp.watch(config.assets + 'images/*', ['images']);
    gulp.watch(config.assets + 'fonts/*', ['fonts']);
} );
