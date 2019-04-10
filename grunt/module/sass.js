'use strict';

module.exports = grunt => {
    const files = [{
        expand: true,
        cwd:  '<%= config.assetSrc %>scss/',
        src:  [
            '**/*.scss',
            '!**/*.backup.scss',
        ],
        dest: '<%= config.assetDest %>css/',
        ext:  '.css'
    }];

    return {
        options: {
            cacheLocation: './grunt/.sass-cache',
            debugInfo: false,
            loadPath: '<%= config.assetSrc %>scss/global/',
            precision: 3,
            unixNewlines: true
        },

        dev: {
            files,
            options: {
                sourcemap: 'file',
                style: 'expanded'
            }
        },

        dist: {
            files,
            options: {
                sourcemap: 'none',
                style: 'compressed'
            }
        }
    };
};
