'use strict';

module.exports = grunt => {
    const imgExt = ['jpeg','jpg','gif','png'];

    return {
        cssmin: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetSrc %>css/',
                src:  [
                    '**/*.min.css',
                    '!**/*.min.backup.css',
                ],
                dest: '<%= config.assetDest %>css/',
                ext:  '.min.css'
            }]
        },

        font: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetSrc %>font/',
                src:  ['**/*'],
                dest: '<%= config.assetDest %>font/',
                filter: 'isFile'
            }]
        },

        jsmin: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetSrc %>js/',
                src:  [
                    '**/*.min.js',
                    '!**/*.min.backup.js',
                ],
                dest: '<%= config.assetDest %>js/',
                ext:  '.min.js'
            }]
        },

        image: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetSrc %>image/',
                src:  [
                    '**/*.{'+imgExt.join(',')+'}',
                    '!**/*.backup.{' + imgExt.join('|') + '}',
                ],
                dest: '<%= config.assetDest %>image/',
                filter: 'isFile'
            }]
        }
    };
};
