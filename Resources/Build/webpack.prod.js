const merge = require('webpack-merge');
const baseConfig = require('./webpack.common.js');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

const productionConfig = {
    mode: 'production',
    performance: {hints: false},
    plugins: [
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            mozjpeg: {
                cacheFolder: '.cache',
                progressive: true,
                quality: '65-75',
            },
            // optipng.enabled: false will disable optipng
            optipng: {
                cacheFolder: '.cache',
                enabled: false,
            },
            pngquant: {
                cacheFolder: '.cache',
                quality: '65-75',
                speed: 4
            },
            gifsicle: {
                cacheFolder: '.cache',
                interlaced: false,
            },
            // the webp option will enable WEBP
            webp: {
                cacheFolder: '.cache',
                quality: '65-75',
            }
        }),
    ]
};

module.exports = merge.smart(baseConfig, productionConfig);
