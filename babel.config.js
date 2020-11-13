module.exports = function (api) {
    api.cache(true);

    return {
        presets: [
            ['@babel/preset-env', {
                useBuiltIns: 'usage',
                corejs: {
                    version: 3
                }
            }]
        ],
        sourceType: 'unambiguous'
    };
};