const path = require('path');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const StyleLintPlugin = require('stylelint-webpack-plugin');
const WebpackBar = require('webpackbar');
const CopyPlugin = require('copy-webpack-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

module.exports = {
    stats: 'none',
    entry: ['./index.js'],
    output: {
        path: path.resolve(__dirname, '../Public'),
        chunkFilename: '[name].lazy.js',
        publicPath: 'typo3conf/ext/startpilot/Resources/Public/',
    },
    optimization: {
        minimizer: [new UglifyJsPlugin()]
    },
    module: {
        rules: [
            {
                enforce: "pre",
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "eslint-loader",
                options: {
                    sourceMap: true,
                    cache: false,
                    configFile: '.eslintrc.json',
                    emitError: true,
                    emitWarning: true,
                    failOnError: false,
                    failOnWarning: false,
                }
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        sourceMap: true,
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true
                        }
                    },
                    {
                        loader: 'resolve-url-loader',
                        options: {
                            sourceMap: true
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            autoprefixer: {
                                browsers: ["> 5%"]
                            },
                            sourceMap: true,
                            plugins: [
                                require('autoprefixer'),
                                require('cssnano')
                            ],
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    },
                ]
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                loader: 'file-loader',
                options: {
                    outputPath: 'Fonts/',
                    publicPath: './Fonts/',
                }
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[path][name].[ext]',
                            outputPath: 'Images/',
                            publicPath: './Images/'
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        new webpack.ProgressPlugin(),
        new WebpackBar({
            clear: false,
            profile: true,
        }),
        new FriendlyErrorsWebpackPlugin(),
        new MiniCssExtractPlugin({}),
        new UglifyJsPlugin({
            extractComments: true,
            sourceMap: true
        }),
        new CopyPlugin(
            [{
                from: 'Assets/Images/Misc', to: 'Images/Misc',
                cache: true,
            }]
        ),
        new CopyPlugin([
            {from: 'Assets/JavaScriptLibs', to: 'JavaScriptLibs'},
            {from: 'Assets/CKEditor', to: 'CKEditor'},
        ]),
        new StyleLintPlugin({
            configFile: ".stylelintrc.json",
            syntax: 'scss',
            files: '**/*.scss',
            quiet: false,
            emitError: true,
            emitWarning: true,
            failOnError: false,
            failOnWarning: false,
        }),
    ],
};
