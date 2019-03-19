'use strict';

module.exports = grunt => {
    const files = [{
        expand: true,
        cwd:  '<%= config.assetSrc %>js/',
        src:  [
            '**/*.js',
            '!**/*.backup.js',
            '!**/*.min.js',
            '!**/_*.js',
            '!**/_*.min.js',
            '!**/_*.min.backup.js',
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
