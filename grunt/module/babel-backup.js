'use strict';

module.exports = grunt => {
    const files = [{
        expand: true,
        cwd:  '<%= config.assetSrc %>js/',
        src:  [
            '**/*.js',
            '!**/*.{backup,min}.js',
            '!**/_*.js',
        ],
        dest: '<%= config.assetDest %>js/',
        ext:  '.js'
    }];

    return {
        options: {
            presets: ['@babel/preset-env']
        },

        dev: {
            files,
            options: {
                sourceMap: true
            }
        },

        dist: {
            files,
            options: {
                sourceMap: false
            }
        }
    };
};
