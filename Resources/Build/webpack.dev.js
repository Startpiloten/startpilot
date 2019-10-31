const merge = require('webpack-merge');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const baseConfig = require('./webpack.common.js');

const developConfig = {
    mode: 'development',
    devtool: "source-map"
};

module.exports = merge.smart(baseConfig, developConfig);
