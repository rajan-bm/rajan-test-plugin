const gulp = require('gulp');
const sass = require('gulp-dart-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const plumber = require('gulp-plumber');
const gulpif = require('gulp-if');

// Environment configuration
const isProd = process.env.NODE_ENV === 'production';

// Path configurations
const paths = {
    styles: {
        src: 'src/scss/mystyle.scss',
        watch: ['src/scss/mystyle.scss', 'src/scss/modules/**/*.scss'],
        dest: 'assets/css'
    },
    scripts: {
        src: 'src/js/myscript.js',
        watch: 'src/js/**/*.js',
        dest: 'assets/js'
    }
};

// Error Handler
const errorHandler = function(error) {
    notify.onError({
        title: 'Gulp Error',
        message: '<%= error.message %>',
        sound: 'Beep'
    })(error);
    
    console.error(error.toString());
    this.emit('end');
};

// Styles task
const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(plumber({
            errorHandler: errorHandler
        }))
        .pipe(gulpif(!isProd, sourcemaps.init()))
        .pipe(sass({
            outputStyle: isProd ? 'compressed' : 'expanded',
            includePaths: ['src/scss/modules']
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: !isProd
        }))
        .pipe(rename('mystyles.css'))
        .pipe(gulpif(!isProd, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.styles.dest));
};

// Scripts task
const scripts = () => {
    return browserify({
        entries: paths.scripts.src,
        debug: !isProd
    })
    .transform(babelify, {
        presets: ['@babel/preset-env'],
        global: true,
        ignore: [/\/node_modules\/(?!@mycompany\/)/]
    })
    .bundle()
    .on('error', errorHandler)
    .pipe(source('myscript.js'))
    .pipe(buffer())
    .pipe(gulpif(!isProd, sourcemaps.init({ loadMaps: true })))
    .pipe(gulpif(isProd, uglify()))
    .pipe(gulpif(!isProd, sourcemaps.write('.')))
    .pipe(gulp.dest(paths.scripts.dest));
};

// Watch task
const watch = () => {
    gulp.watch(paths.styles.watch, styles);
    gulp.watch(paths.scripts.watch, scripts);
};

// Build task
const build = gulp.parallel(styles, scripts);

// Development task
const dev = gulp.series(build, watch);

// Export tasks
exports.styles = styles;
exports.scripts = scripts;
exports.build = build;
exports.watch = watch;
exports.default = dev;