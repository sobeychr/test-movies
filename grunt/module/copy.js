'use strict';

module.exports = grunt => {
    return {
        jsmin: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetSrc %>js/',
                src:  [
                    '**/*.min.js',
                    '**/*.min.backup.js',
                ],
                dest: '<%= config.assetDest %>js/',
                ext:  '.min.js'
            }]
        }
    };
};
