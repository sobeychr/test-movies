'use strict';

module.exports = grunt => {
    const files = [{
        expand: true,
        cwd:  '<%= config.assetSrc %>js/',
        src:  [
            '<%= config.assetSrc %>**/*.js',
            '!<%= config.assetSrc %>**/*.backup.js',
            '!<%= config.assetSrc %>**/*.min.js',
            '!<%= config.assetSrc %>**/_*.js',
            '!<%= config.assetSrc %>**/_*.min.js',
            '!<%= config.assetSrc %>**/_*.min.backup.js',
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
