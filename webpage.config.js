const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

module.exports = {
  entry: ['./assets/scripts/src/app.js', './assets/styles/src/app.scss'],
  output: {
    filename: './assets/scripts/build/app.js',
    path: path.resolve(__dirname)
  },
  module: {
    rules: [
      // perform js babelization on all .js files
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ['babel-preset-env']
          }
        }
      },
      // compile all .scss files to plain old css
      {
        test: /\.s[c|a]ss$/,
        use: ['style-loader', MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader']
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin('dist', {}),
    // extract css into dedicated file
    new MiniCssExtractPlugin({
      filename: './assets/styles/build/main.min.css',
      path: path.resolve(__dirname)
    })
  ],
  optimization: {
    minimizer: [
      // enable the js minification plugin
      new UglifyJSPlugin({
        cache: true,
        parallel: true,
        sourceMap: true
      }),
      // enable the css minification plugin
      new OptimizeCSSAssetsPlugin({
        filename: './assets/styles/build/main.min.css',
        cssProcessorOptions: { discardComments: { removeAll: true } },
        canPrint: true
      })
    ]
  }
};