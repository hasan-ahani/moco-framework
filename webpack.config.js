const path = require( 'path' ),
	webpack = require( 'webpack' );

module.exports = {
	context: path.resolve( __dirname, 'src/js' ),
	optimization: {
		minimize: false
	},
	entry: {
		app: [ './app.js' ],
	},
	output: {
		path: path.resolve( __dirname, 'assets/js' ),
		filename: '[name].bundle.js',
	},
	externals: {
		jquery: 'jQuery'
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		} ),
	],
	mode: 'development',
	devtool: 'source-map',
};
