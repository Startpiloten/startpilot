const merge = require('webpack-merge');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const baseConfig = require('./webpack.common.js');

const developConfig = {
    mode: 'development',
    devtool: "source-map",
    module: {
        rules: [
            {
                enforce: "pre",
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "eslint-loader",
                options: {
                    configFile: '.eslintrc.json'
                }
            },
        ]
    },
    plugins: [
        new StyleLintPlugin({
            configFile: ".stylelintrc.json",
            emitErrors: false,
            syntax: 'scss',
            files: '**/*.scss',
            failOnError: false,
            quiet: false,
        }),
    ]
};

module.exports = merge.smart(baseConfig, developConfig);
