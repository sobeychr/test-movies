'use strict';

module.exports = grunt => {
    const imgExt = ['jpeg','jpg','gif','png'];

    return {
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
