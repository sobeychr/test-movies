'use strict';

module.exports = grunt => {
    return {
        options: {
            cacheLocation: './grunt/.sass-cache',
            loadPath: './public/asset/scss/global/',
            precision: 3,
            unixNewlines: true
        },

        dev: {
            options: {
                debugInfo: true,
                sourcemap: 'file',
                style: 'expanded'
            },
            files: [{
                expand: true,
                cwd:  './asset/scss/',
                src:  ['**/*.scss'],
                dest: './public/asset/css/',
                ext:  '.css'
            }]
        },

        dist: {
            options: {
                debugInfo: false,
                sourcemap: 'none',
                style: 'compressed'
            }
        }
    };
};
