var path = require('path')
var webpack = require('webpack')

const extra = {
    file: { name: '[name].[ext]?[sha512:hash:hex:6]', outputPath: 'images/' },
    vue: { loaders: { less: 'vue-style-loader!css-loader!less-loader' } }
}

const externals = {
    vue: 'Vue',
    uikit: 'UIkit',
    _: 'lodash',
    'vue-router': 'VueRouter'
}

module.exports = {
    entry: {
        main: './src/main.js',
        app: './app/src/app.js',
    },
    output: {
        path: path.resolve(__dirname, './dist'),
        publicPath: '/dist/',
        filename: '[name].js'
    },
    externals,
    module: {
        rules: [
            { test: /\.vue$/, loader: 'vue-loader', options: extra.vue },
            { test: /\.js$/, loader: 'babel-loader', exclude: /node_modules/ },
            { test: /\.(png|jpg|gif|svg)$/, loader: 'file-loader', options: extra.file }
        ]
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            'vuex$': 'vue/dist/vuex.esm.js',
            'vue-router$': 'vue-router/dist/vue-router.esm.js'
        }
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true,
        overlay: true
    },
    performance: {
        hints: false
    },
    //devtool: '#eval-source-map'
}

if (process.env.NODE_ENV === 'production') {

    var ExtractTextPlugin = require("extract-text-webpack-plugin")
    var OptimizeCSSPlugin = require('optimize-css-assets-webpack-plugin')

    //module.exports.devtool = '#source-map'
    // http://vue-loader.vuejs.org/en/workflow/production.html

    //module.exports = module.exports[0]

    module.exports.module.rules[0].options.loaders.less = ExtractTextPlugin.extract({
        use: 'css-loader!less-loader',
        fallback: 'vue-style-loader'
    })

    module.exports.plugins = (module.exports.plugins || []).concat([
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: false,
            compress: {
                warnings: false
            }
        }),
        new webpack.LoaderOptionsPlugin({
            minimize: true
        }),
        new ExtractTextPlugin('[name].min.css'),
        new OptimizeCSSPlugin({cssProcessorOptions:{safe:true}}),
    ])
}
