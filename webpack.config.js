const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');

/* eslint-disable no-unused-vars */
const {BundleAnalyzerPlugin} = require('webpack-bundle-analyzer');
/* eslint-enable no-unused-vars */

module.exports = {
    mode: 'production',
    devtool: false,
    entry: {
        main: ['./src/scripts/main']
    },
    output: {
        path: path.resolve(__dirname, './build/'),
        filename: '[name].js',
        publicPath: '/project/frontend/build/'
    },
    optimization: {
        splitChunks: {
            cacheGroups: {
                vendors: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendor',
                    chunks: 'all',
                    enforce: true
                }
            }
        },
        runtimeChunk: {
            name: 'runtime'
        }
    },
    plugins: [
        // new BundleAnalyzerPlugin({
        //     analyzerMode: 'static',
        //     openAnalyzer: false
        // })
    ],
    module: {
        rules: [
            {
                test: /\.(js|mjs)$/,
                exclude: [
                    /\bcore-js\b/,
                    /\bwebpack\/buildin\b/
                ],
                use: {
                    loader: 'babel-loader',
                    options: {
                        cacheDirectory: true
                    }
                }
            },
            {
                test: require.resolve('jquery'),
                use: [
                    {
                        loader: 'expose-loader',
                        options: {
                            exposes: ['$', 'jQuery']
                        }
                    }
                ]
            }
        ]
    }
};