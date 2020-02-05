const merge = require('webpack-merge');
const baseConfig = require('./webpack.common.js');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

const developConfig = {
    mode: 'development',
    devtool: "inline-source-map",
    plugins: [
        new ImageminPlugin({
            disable: true
        }),
    ]
};

module.exports = merge.smart(baseConfig, developConfig);
