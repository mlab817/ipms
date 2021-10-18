const path = require('path');

module.exports = {
    contentBase: './public',
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    }
};
