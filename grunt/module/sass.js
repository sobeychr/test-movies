'use strict';

module.exports = grunt => {
    const files = [{
        expand: true,
        cwd:  '<%= config.assetSrc %>scss/',
        src:  ['**/*.scss'],
        dest: '<%= config.assetDest %>css/',
        ext:  '.css'
    }];

    return {
        options: {
            cacheLocation: './grunt/.sass-cache',
            loadPath: '<%= config.assetSrc %>scss/global/',
            precision: 3,
            unixNewlines: true
        },

        dev: {
            files,
            options: {
                debugInfo: true,
                sourcemap: 'file',
                style: 'expanded'
            }
        },

        dist: {
            files,
            options: {
                debugInfo: false,
                sourcemap: 'none',
                style: 'compressed'
            }
        }
    };
};
