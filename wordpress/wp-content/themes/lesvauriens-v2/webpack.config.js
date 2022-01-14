const path                     = require( 'path' );
const fs                       = require( 'fs' );
const webpack                  = require( 'webpack' );
//const terser                   = require( 'terser' );
const merge                    = require( 'webpack-merge' );
const liveReloadPlugin         = require( 'webpack-livereload-plugin' );
const browserSyncPlugin        = require( 'browser-sync-webpack-plugin' );
const extractTextPlugin        = require( 'extract-text-webpack-plugin' );
const cssUrlRelativePlugin     = require( 'css-url-relative-plugin' );
const ExtractTextWebpackPlugin = require( "extract-text-webpack-plugin" );
const copyWebpackPlugin        = require( 'copy-webpack-plugin' );
const imageminPlugin           = require( 'imagemin-webpack-plugin' ).default;
//const iconfontPlugin           = require( 'iconfont-plugin-webpack' );
//const terserPlugin             = require( 'terser-webpack-plugin' );
const optimizeCssAssetsPlugin  = require( 'optimize-css-assets-webpack-plugin' );
const compressionPlugin        = require( "compression-webpack-plugin" );
const dashboardPlugin          = require( "webpack-dashboard/plugin" );
const stylelintPlugin          = require( 'stylelint-webpack-plugin' );
const baseURL                  = 'http://localhost:8888/wordpress';
const arrayBasePath            = [
	path.resolve( __dirname ) + '/'
];
const jsInputFile              = 'assets/src/js/app.js';
const jsOutputFile             = 'js/[name].min.js';
const jsOutputPath             = 'assets/dist/';
const cssOutput                = 'css/app.min.css';
const extractCssTheme          = new extractTextPlugin( cssOutput );

const extractCssArray     = [
	[
		extractCssTheme,
	],
];

const commonModuleRules   = [
	{
		test: /\.(svg|ttf|eot|woff|woff2|png|jpe?g|gif|svg)$/,
		exclude: /dist/,
		include: [/src/],
		use: [
			{
				loader: 'file-loader',
				options: {
					name: '[name].[ext]',
					useRelativePath: true,
					emitFile: false
				}
			}
		]
	},
	{
		test: /\.(svg|ttf|eot|woff|woff2|png|jpe?g|gif|svg)$/,
		exclude: /dist/,
		include: [/node_modules/],
		use: [
			{
				loader: 'file-loader',
				options: {
					name: '[name].[ext]',
					useRelativePath: true,
					emitFile: true
				}
			}
		]
	}
];
const moduleRulesArray    = [
	[
		...commonModuleRules,
		{
			test: /app.(scss)$/,
			use: extractCssTheme.extract( {
				fallback: 'style-loader',
				use: [
					'css-loader',
					'postcss-loader',
					'sass-loader',
				]
			} )
		}
	]
];
const basePlugins         = [
	new dashboardPlugin(),
	new liveReloadPlugin(),
	new browserSyncPlugin( {
		proxy: baseURL,
		open: false,
		notify: true
	}, {
		reload: false
	} ),
	// new stylelintPlugin( {
	// 	files: 'assets/src/scss/**/*.scss'
	// } )
];
const entryPoints         = [
	{
		'app': 'basePath' + jsInputFile,
	}
];
let allConfig             = [];

replacer = ( entryPoint, path ) => {
	let strObject = JSON.stringify( entryPoint ).replace( /basePath/g, path ).replace( /\\/g, '/' );
	return JSON.parse( strObject );
};

let generateBaseConfig     = () => {
	for ( let index in arrayBasePath ) {
		const basePath  = arrayBasePath[ index ];
		const oneConfig = {
			entry: replacer( entryPoints[ index ], basePath ),
			output: {
				filename: jsOutputFile,
				path: basePath + jsOutputPath,
			},
			plugins: [],
			module: {
				rules: [
					{
						test: /\.js$/,
						loader: 'babel-loader',
						exclude: /node_modules/,
					},
					{
						loader: "webpack-modernizr-loader",
						test: /\.modernizrrc\.js$/
					}
				]
			},
			resolve: {
				alias: {
					modernizr$: path.resolve( __dirname ).replace( /\\/g, '/' ) + "/.modernizrrc.js",
					'@lesvauriens': path.resolve( __dirname, basePath ).replace( /\\/g, '/' ) + "/assets/src"
				},
				extensions: [
					'.js',
					'.scss',
				],
				modules: ["node_modules"]
			},
			performance: {
				hints: false
			},
			watch: true,
			externals: {
				jquery: 'jQuery'
			}
		};
		allConfig.push( oneConfig );
	}
};
let generateFullConfigDev  = () => {
	for ( let index in allConfig ) {
		const basePath = arrayBasePath[ index ];
		let fonticons  = null;
		let copyImages = null;
		let copyFonts  = null;

		// Images
		if ( fs.existsSync( basePath + 'assets/src/img' ) ) {
			copyImages = new copyWebpackPlugin( [
				{
					from: basePath + 'assets/src/img',
					to: 'img',
					ignore: ['svgicons/*']
				}
			] );
		}

		// Add module rules
		allConfig[ index ].module.rules = [
			...allConfig[ index ].module.rules,
			...moduleRulesArray[ index ]
		];

		// Add plugins
		allConfig[ index ].plugins = [
			new cssUrlRelativePlugin(),
			...extractCssArray[ index ],
			new webpack.ProvidePlugin( {
				$: 'jquery',
				jQuery: 'jquery',
				"window.jQuery": "jquery"
			} ),
		];

		if ( copyImages !== null ) {
			allConfig[ index ].plugins = [
				...allConfig[ index ].plugins,
				copyImages
			];
		}

		// Add source map
		allConfig[ index ].devtool = 'cheap-module-source-map';
	}

	// Add common plugins
	allConfig[ 0 ].plugins = [
		...basePlugins,
		...allConfig[ 0 ].plugins
	];
};
let generateFullConfigProd = () => {
	for ( let index in allConfig ) {
		const basePath = arrayBasePath[ index ];
		let fonticons  = null;
		let copyImages = null;
		let copyFonts  = null;

		// Images
		if ( fs.existsSync( basePath + 'assets/src/images' ) ) {
			copyImages = new copyWebpackPlugin( [
				{
					from: basePath + 'assets/src/images',
					to: 'images',
					ignore: ['svgicons/*']
				}
			] );
		}

		// Fonts
		if ( fs.existsSync( basePath + 'assets/src/fonts' ) ) {
			copyFonts = new copyWebpackPlugin( [
				{
					from: basePath + 'assets/src/fonts',
					to: 'fonts'
				}
			] );
		}

		// Add module rules
		allConfig[ index ].module.rules = [
			...allConfig[ index ].module.rules,
			...moduleRulesArray[ index ]
		];

		// Add optimization
		allConfig[ index ].optimization = {
			minimizer: [
				new terserPlugin( {
					cache: true,
					parallel: true,
					sourceMap: false,
					terserOptions: {
						ecma: 6,
						warnings: false,
						parse: {},
						compress: {},
						mangle: true,
						module: false,
						output: {
							comments: false,
						},
						toplevel: false,
						nameCache: null,
						ie8: false,
						keep_classnames: undefined,
						keep_fnames: false,
						safari10: false,
					},
				} )
			]
		};

		// Add plugins
		allConfig[ index ].plugins = [
			new cssUrlRelativePlugin(),
			...extractCssArray[ index ],
			new optimizeCssAssetsPlugin( {
				cssProcessor: require( 'cssnano' ),
				cssProcessorPluginOptions: {
					preset: [
						'default',
						{ discardComments: { removeAll: true } }
					],
				},
				canPrint: false
			} ),
			new webpack.ProvidePlugin( {
				$: 'jquery',
				jQuery: 'jquery',
				"window.jQuery": "jquery"
			} )
		];

		if ( copyImages !== null ) {
			allConfig[ index ].plugins = [
				...allConfig[ index ].plugins,
				copyImages
			];
		}
		if ( copyFonts !== null ) {
			allConfig[ index ].plugins = [
				...allConfig[ index ].plugins,
				copyFonts
			];
		}

		// Add compression and imagemin
		allConfig[ index ].plugins = [
			...allConfig[ index ].plugins,
			new compressionPlugin( {
				test: /\.(svg|ttf|eot|woff|woff2|png|jpe?g|gif|svg|css|js)$/,
			} ),
			new imageminPlugin( { test: /\.(jpe?g|png|gif|svg)$/i } )
		];

		// Disable watcher
		allConfig[ index ].watch = false;
	}
};

module.exports = ( env, argv ) => {
	generateBaseConfig();

	if ( argv.mode === 'development' ) {
		generateFullConfigDev();
	}

	if ( argv.mode === 'production' ) {
		generateFullConfigProd();
	}

	return merge.multiple( allConfig );
};
