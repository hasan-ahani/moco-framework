const gulp 			= require( 'gulp' ),
	fancylog 		= require( 'fancy-log' ),
	browserSync 	= require( 'browser-sync' ),
	server 			= browserSync.create(),
	yargs       	= require('yargs'),
	args        	= yargs.argv,
	sass 			= require( 'gulp-sass' ),
	postcss 		= require( 'gulp-postcss' ),
	pkg         	= require('./package'),
	fs 				= require( 'fs' ),
	rename 			= require('gulp-rename'),
	sourcemaps 		= require( 'gulp-sourcemaps' ),
	rtlcss 			= require('gulp-rtlcss'),
	autoprefixer 	= require( 'autoprefixer' ),
    path            = require('path'),
	//dev_url 		= 'http://moco.me',
	plugins 		= [
		autoprefixer(),
		cssnano(),
	],
	paths 			= {
		styles: {
			src: './src/scss/app.scss',
			dest: './assets/css'
		},
		scripts: {
			src: './src/js/app.js',
			dest: './assets/js'
		},
		icon: {
			src: './src/icon/**/*.svg',
			dest: './assets/icon/',
		},
		fonts: {
			src: './src/fonts/**/*.{ttf,woff,woff2,eot,svg}',
			dest: './assets/fonts'
		}
	};


function script() {
	const compiler = require( 'webpack' ),
		webpackStream = require( 'webpack-stream' );

	return gulp.src( paths.scripts.src )
		.pipe(
			webpackStream({
				config: require( './webpack.config.js' )
				},
				compiler
			)
		)
		.pipe(
			gulp.dest( paths.scripts.dest )
		)
		/*.pipe(
			server.stream() // Browser Reload
		)*/;
}
function style() {
	return gulp.src( paths.styles.src )
		.pipe(
			sourcemaps.init()
		)
		.pipe(
			sass()
				.on( 'error', sass.logError )
		)
		.pipe(
			postcss(plugins)
		)
		.pipe(
			sourcemaps.write( './' )
		)
		.pipe(
			gulp.dest( paths.styles.dest )
		)
		/*.pipe(
			server.stream() // Browser Reload
		)*/;
}
function rtl() {
	return gulp.src( paths.styles.src )
		.pipe(
			sourcemaps.init()
		)
		.pipe(
			sass()
				.on( 'error', sass.logError )
		)
		.pipe(
			postcss(plugins)
		)
		.pipe(rtlcss())
		.pipe(rename({ suffix: '-rtl' }))
		.pipe(
			sourcemaps.write( './' )
		)
		.pipe(
			gulp.dest( paths.styles.dest )
		)
		/*.pipe(
			server.stream() // Browser Reload
		)*/;
}
function icon() {
	return gulp.src( paths.icon.src )
		.pipe(
			rename(function(opt) {
				console.log(opt.basename);
				opt.basename = opt.basename.toString().toLowerCase().split(' ').join('');
				return opt;
			})
		)
		.pipe(
			gulp.dest( paths.icon.dest )
		);
}
function fonts() {
	return gulp.src( paths.fonts.src )
		.pipe(
			gulp.dest( paths.fonts.dest )
		);
}
function watch() {
	server.init();

	gulp.watch( [paths.scripts.src, './src/js/**/*.js' ], script );
	gulp.watch( [ paths.styles.src, './src/scss/**/*.scss' ],  gulp.series([style, rtl]));
	gulp.watch( [ paths.fonts.src ],  fonts);
}


gulp.task('icon', icon);
gulp.task('default', gulp.series([script, style, rtl, fonts, watch]));


