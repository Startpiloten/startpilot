const merge = require('webpack-merge');
const baseConfig = require('./webpack.common.js');

const productionConfig = {
    mode: 'production',
    performance: {hints: false}
};

module.exports = merge.smart(baseConfig, productionConfig);
